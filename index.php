<?php
/*
    APP STREAMING FINAL v4 
    - Modal de Calificación al completar
    - Ordenación
    - Edición simplificada (Solo Nombre y Prioridad)
*/
session_start();

// 1. CONEXIÓN BBDD
$servidor_db = "localhost";
$usuario_db  = "u908766211_adminviews"; 
$password_db = "Adminviews2526$";     
$nombre_db   = "u908766211_adminviews";

$conexion = new mysqli($servidor_db, $usuario_db, $password_db, $nombre_db);
if ($conexion->connect_error) die("Error Conexión: " . $conexion->connect_error);
$conexion->set_charset("utf8");

// 2. ENRUTADOR
$page = isset($_GET['page']) ? $_GET['page'] : 'seleccion';
if (!isset($_SESSION['usuario_id']) && $page !== 'login' && $page !== 'auth') {
    header("Location: index.php?page=login"); exit();
}

// 3. LÓGICA (CONTROLADORES)
$mensaje_error = "";

// LOGIN
if ($page === 'auth' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $pass   = $_POST['password'];
    $res = $conexion->query("SELECT * FROM usuarios WHERE correo = '$correo'");
    if ($res && $res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if ($pass === $user['password']) {
            $_SESSION['usuario_id'] = $user['id'];
            header("Location: index.php?page=seleccion"); exit();
        }
    }
    $mensaje_error = "Datos incorrectos."; $page = 'login';
}

// GUARDAR NUEVO (Inicia con prioridad Media por defecto)
if ($page === 'guardar' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['usuario_id'];
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $tipo = $_POST['tipo_contenido'];
    $estado = $_POST['estado'];
    $img = $_POST['imagen_url'] ?: "https://via.placeholder.com/150";
    
    // Por defecto prioridad Media al crear
    $conexion->query("INSERT INTO contenidos (usuario_id, titulo, tipo, estado, imagen_url, prioridad) VALUES ('$uid', '$titulo', '$tipo', '$estado', '$img', 'Media')");
    header("Location: index.php?page=" . ($tipo == 'pelicula' ? 'peliculas' : 'series')); exit();
}

// ACTUALIZAR SIMPLE (Solo Título y Prioridad)
if ($page === 'actualizar_simple' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $prioridad = $_POST['prioridad'];

    $sql = "UPDATE contenidos SET titulo='$titulo', prioridad='$prioridad' WHERE id='$id'";
    $conexion->query($sql);
    
    header("Location: index.php?page=" . ($_POST['tipo_origen'] == 'pelicula' ? 'peliculas' : 'series')); exit();
}

// MARCAR COMO VISTO (Recibe datos del Modal)
if ($page === 'marcar_visto' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $puntuacion = intval($_POST['puntuacion']);
    $comentario = $conexion->real_escape_string($_POST['comentario']);
    $fecha = $_POST['fecha_visualizacion'] ?: date('Y-m-d');
    $tipo_origen = $_POST['tipo_origen'];

    $sql = "UPDATE contenidos SET estado='vistas', puntuacion='$puntuacion', comentario='$comentario', fecha_visualizacion='$fecha' WHERE id='$id'";
    $conexion->query($sql);

    header("Location: index.php?page=" . ($tipo_origen == 'pelicula' ? 'peliculas' : 'series')); exit();
}

// ACCIONES (Solo Borrar o Mover a Viendo)
if ($page === 'acciones') {
    $id = intval($_GET['id']);
    $accion = $_GET['accion'];
    $from = $_GET['from'];

    if ($accion == 'borrar') {
        $conexion->query("DELETE FROM contenidos WHERE id='$id'");
    } 
    elseif ($accion == 'mover_viendo') {
        // Solo para series que pasan a "Viendo" (sin calificar aún)
        $conexion->query("UPDATE contenidos SET estado='viendo' WHERE id='$id'");
    }
    header("Location: index.php?page=" . $from); exit();
}

// LOGOUT
if ($page === 'logout') { session_destroy(); header("Location: index.php?page=login"); exit(); }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App Streaming Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ESTILOS GENERALES (Tu diseño original) */
        body { font-family: Arial, sans-serif; background-color: #40c4ff; margin: 0; min-height: 100vh; display: flex; justify-content: center; align-items: center; }
        
        /* Contenedores */
        .dashboard-container { width: 95%; max-width: 1400px; padding: 20px; box-sizing: border-box; }
        .contenedor_login { display: flex; align-items: center; justify-content: center; gap: 50px; flex-wrap: wrap; }
        .formulario_caja { background: white; padding: 30px; border-radius: 20px; width: 350px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        
        /* Inputs y Botones */
        .input-std { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; }
        .btn { background-color: #ffa000; border: none; padding: 12px; border-radius: 20px; cursor: pointer; font-weight: bold; width: 100%; transition: 0.2s; font-size:1rem;}
        .btn:hover { background-color: #ffb300; transform: scale(1.02); }
        
        /* Cabecera y Filtros */
        .cabecera { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap:15px; }
        .boton_volver { width: 50px; height: 50px; background: #ff7043; border-radius: 50%; display: flex; justify-content: center; align-items: center; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); }
        .icono_play_volver { width: 0; height: 0; border-top: 12px solid transparent; border-bottom: 12px solid transparent; border-right: 20px solid #cfd8dc; margin-right: 5px; }

        /* Columnas */
        .contenedor_columnas { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; align-items: flex-start; }
        .columna { background: white; border-radius: 20px; width: 350px; min-height: 300px; padding: 15px; display: flex; flex-direction: column; align-items: center; }
        .titulo_columna { font-size: 1.4rem; font-weight: bold; margin-bottom: 15px; text-align: center; }

        /* Items */
        .item { background-color: #afb42b; width: 95%; border-radius: 15px; margin-bottom: 10px; padding: 10px; color: black; display: flex; flex-direction: column; position: relative; }
        .item-top { display: flex; align-items: center; width: 100%; }
        .item img { width: 45px; height: 45px; border-radius: 50%; margin-right: 10px; object-fit: cover; background:#ddd; }
        .item-info { flex-grow: 1; }
        .item-title { font-weight: bold; font-size: 0.95rem; }
        
        /* Etiquetas de Prioridad */
        .badge { font-size: 0.7rem; padding: 2px 6px; border-radius: 4px; color: white; margin-top:2px; display:inline-block; }
        .badge-Alta { background: #d32f2f; }
        .badge-Media { background: #1976d2; }
        .badge-Baja { background: #757575; }

        /* Acciones */
        .acciones a, .acciones button { background:none; border:none; cursor:pointer; font-size: 1.1rem; margin-left: 5px; text-decoration: none; }
        
        /* Modal (Ventana Emergente) */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: none; justify-content: center; align-items: center; z-index: 1000; }
        .modal-content { background: white; padding: 30px; border-radius: 15px; width: 90%; max-width: 400px; text-align: center; position: relative; }
        .close-modal { position: absolute; top: 10px; right: 15px; font-size: 1.5rem; cursor: pointer; color: #666; }

        /* Autocomplete */
        #suggestions { position: absolute; background: white; width: 100%; max-height: 200px; overflow-y: auto; border: 1px solid #ccc; z-index: 999; margin-top: -8px; border-radius: 0 0 8px 8px; display: none; }
        .sugg-item { padding: 8px; border-bottom: 1px solid #eee; display: flex; align-items: center; cursor: pointer; }
        .sugg-item:hover { background: #f0f0f0; }
    </style>
</head>
<body>

<?php if ($page === 'login'): ?>
    <div class="contenedor_login">
        <div style="width: 250px; height: 250px; background: #ff7043; border-radius: 50%; display: flex; justify-content: center; align-items: center; box-shadow: -10px 10px 0 rgba(0,0,0,0.1);">
            <div style="width:0; height:0; border-top: 50px solid transparent; border-bottom: 50px solid transparent; border-left: 80px solid #cfd8dc; margin-left: 15px;"></div>
        </div>
        <div class="formulario_caja">
            <h2 style="text-align:center; margin-top:0;">Iniciar Sesión</h2>
            <?php if($mensaje_error) echo "<p style='color:red; font-size:0.9rem'>$mensaje_error</p>"; ?>
            <form action="index.php?page=auth" method="POST">
                <input type="email" name="correo" class="input-std" placeholder="correo@correo.com" required>
                <input type="password" name="password" class="input-std" placeholder="contraseña" required>
                <button class="btn">ENTRAR</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php if ($page === 'seleccion'): ?>
    <div style="text-align:center">
        <h1 style="color:white; margin-bottom:40px;">¿Qué quieres ver?</h1>
        <div style="display:flex; gap:30px; justify-content:center; flex-wrap:wrap;">
            <a href="index.php?page=peliculas" style="text-decoration:none; color:black;">
                <div style="background:white; padding:20px; border-radius:20px; width:200px; height:250px; display:flex; flex-direction:column; align-items:center; justify-content:center; transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="background:#afb42b; width:100%; height:100%; border-radius:15px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                        <h2>Películas</h2>
                        <i class="fa-solid fa-clapperboard" style="font-size:4rem;"></i>
                    </div>
                </div>
            </a>
            <a href="index.php?page=series" style="text-decoration:none; color:black;">
                <div style="background:white; padding:20px; border-radius:20px; width:200px; height:250px; display:flex; flex-direction:column; align-items:center; justify-content:center; transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="background:#afb42b; width:100%; height:100%; border-radius:15px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                        <h2>Series</h2>
                        <i class="fa-solid fa-tv" style="font-size:4rem;"></i>
                    </div>
                </div>
            </a>
        </div>
        <br><br><a href="index.php?page=logout" style="color:white; font-weight:bold;">Cerrar Sesión</a>
    </div>
<?php endif; ?>

<?php if ($page === 'peliculas' || $page === 'series'): 
    $tipo = ($page === 'peliculas') ? 'pelicula' : 'serie';
    $uid = $_SESSION['usuario_id'];
    
    // ORDENACIÓN
    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'reciente';
    $sql_order = "ORDER BY id DESC"; // Por defecto: más reciente arriba
    if ($orden == 'antigua') $sql_order = "ORDER BY id ASC";
    if ($orden == 'az') $sql_order = "ORDER BY titulo ASC";

    $sql = "SELECT * FROM contenidos WHERE usuario_id = '$uid' AND tipo = '$tipo' $sql_order";
    $res = $conexion->query($sql);
    
    $vistas=[]; $pend=[]; $viendo=[];
    while($fila = $res->fetch_assoc()){
        if($fila['estado']=='vistas') $vistas[]=$fila;
        elseif($fila['estado']=='por_ver') $pend[]=$fila;
        elseif($fila['estado']=='viendo') $viendo[]=$fila;
    }
?>
    <div class="dashboard-container">
        <div class="cabecera">
            <div style="display:flex; align-items:center; gap:15px;">
                <a href="index.php?page=seleccion" class="boton_volver"><div class="icono_play_volver"></div></a>
                
                <form action="index.php" method="GET">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <select name="orden" onchange="this.form.submit()" style="padding:10px; border-radius:20px; border:none; cursor:pointer; font-weight:bold;">
                        <option value="reciente" <?php if($orden=='reciente') echo 'selected'; ?>>Más recientes</option>
                        <option value="antigua" <?php if($orden=='antigua') echo 'selected'; ?>>Más antiguas</option>
                        <option value="az" <?php if($orden=='az') echo 'selected'; ?>>Alfabetico (A-Z)</option>
                    </select>
                </form>
            </div>
            
            <a href="index.php?page=agregar&tipo=<?php echo $tipo; ?>" class="btn" style="width:auto; padding:10px 20px;">+ Agregar <?php echo ucfirst($tipo); ?></a>
        </div>

        <div class="contenedor_columnas">
            <div class="columna">
                <div class="titulo_columna">Vistas</div>
                <?php foreach($vistas as $item): ?>
                    <div class="item">
                        <div class="item-top">
                            <img src="<?php echo $item['imagen_url']; ?>">
                            <div class="item-info">
                                <div class="item-title"><?php echo $item['titulo']; ?></div>
                                <div style="color:#ffd700; font-size:0.8rem;">
                                    <?php for($i=1;$i<=5;$i++) echo ($i<=$item['puntuacion'])?'★':'☆'; ?>
                                </div>
                                <?php if($item['comentario']): ?>
                                    <div style="font-size:0.75rem; font-style:italic; opacity:0.8;">"<?php echo $item['comentario']; ?>"</div>
                                <?php endif; ?>
                            </div>
                            <div class="acciones">
                                <a href="index.php?page=acciones&id=<?php echo $item['id']; ?>&accion=borrar&from=<?php echo $page; ?>" style="color:#b71c1c;" onclick="return confirm('¿Borrar?')"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($tipo === 'serie'): ?>
            <div class="columna">
                <div class="titulo_columna">Viendo</div>
                <?php foreach($viendo as $item): ?>
                    <div class="item">
                        <div class="item-top">
                            <img src="<?php echo $item['imagen_url']; ?>">
                            <div class="item-info">
                                <div class="item-title"><?php echo $item['titulo']; ?></div>
                                <span class="badge badge-<?php echo $item['prioridad']; ?>"><?php echo $item['prioridad']; ?></span>
                            </div>
                            <div class="acciones">
                                <button onclick='abrirModal(<?php echo $item["id"]; ?>, "<?php echo $item["titulo"]; ?>")' style="color:green;"><i class="fa-solid fa-check"></i></button>
                                <a href="index.php?page=editar&id=<?php echo $item['id']; ?>&tipo=<?php echo $tipo; ?>" style="color:white;"><i class="fa-solid fa-pen"></i></a>
                                <a href="index.php?page=acciones&id=<?php echo $item['id']; ?>&accion=borrar&from=<?php echo $page; ?>" style="color:#b71c1c;" onclick="return confirm('¿Borrar?')"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="columna">
                <div class="titulo_columna">Por ver</div>
                <?php foreach($pend as $item): ?>
                    <div class="item">
                        <div class="item-top">
                            <img src="<?php echo $item['imagen_url']; ?>">
                            <div class="item-info">
                                <div class="item-title"><?php echo $item['titulo']; ?></div>
                                <span class="badge badge-<?php echo $item['prioridad']; ?>"><?php echo $item['prioridad']; ?></span>
                            </div>
                            <div class="acciones">
                                <button onclick='abrirModal(<?php echo $item["id"]; ?>, "<?php echo $item["titulo"]; ?>")' style="color:green;"><i class="fa-solid fa-check"></i></button>
                                
                                <?php if($tipo=='serie'): ?>
                                    <a href="index.php?page=acciones&id=<?php echo $item['id']; ?>&accion=mover_viendo&from=<?php echo $page; ?>" style="color:blue;"><i class="fa-solid fa-eye"></i></a>
                                <?php endif; ?>
                                
                                <a href="index.php?page=editar&id=<?php echo $item['id']; ?>&tipo=<?php echo $tipo; ?>" style="color:white;"><i class="fa-solid fa-pen"></i></a>
                                <a href="index.php?page=acciones&id=<?php echo $item['id']; ?>&accion=borrar&from=<?php echo $page; ?>" style="color:#b71c1c;" onclick="return confirm('¿Borrar?')"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div id="modalRating" class="modal-overlay">
        <div class="modal-content">
            <span class="close-modal" onclick="cerrarModal()">&times;</span>
            <h3 id="modalTitulo">¡Completada!</h3>
            <p>¿Qué te pareció?</p>
            
            <form action="index.php?page=marcar_visto" method="POST">
                <input type="hidden" name="id" id="modalId">
                <input type="hidden" name="tipo_origen" value="<?php echo $tipo; ?>">

                <label style="display:block; text-align:left; font-weight:bold;">Nota:</label>
                <select name="puntuacion" class="input-std">
                    <option value="5">★★★★★ (5)</option>
                    <option value="4">★★★★ (4)</option>
                    <option value="3">★★★ (3)</option>
                    <option value="2">★★ (2)</option>
                    <option value="1">★ (1)</option>
                </select>

                <label style="display:block; text-align:left; font-weight:bold;">Fecha:</label>
                <input type="date" name="fecha_visualizacion" class="input-std" value="<?php echo date('Y-m-d'); ?>">

                <label style="display:block; text-align:left; font-weight:bold;">Comentario:</label>
                <textarea name="comentario" class="input-std" rows="3" placeholder="Escribe tu opinión..."></textarea>

                <button class="btn" style="margin-top:10px;">Guardar en Vistas</button>
            </form>
        </div>
    </div>

    <script>
        // Funciones del Modal
        function abrirModal(id, titulo) {
            document.getElementById('modalRating').style.display = 'flex';
            document.getElementById('modalId').value = id;
            document.getElementById('modalTitulo').innerText = '¡Has visto ' + titulo + '!';
        }
        function cerrarModal() {
            document.getElementById('modalRating').style.display = 'none';
        }
    </script>
<?php endif; ?>

<?php if ($page === 'agregar'): $tipo = $_GET['tipo']; ?>
    <div class="contenedor_login">
        <div class="formulario_caja">
            <h2>Agregar <?php echo ucfirst($tipo); ?></h2>
            <form action="index.php?page=guardar" method="POST" autocomplete="off">
                <input type="hidden" name="tipo_contenido" id="tipo_contenido" value="<?php echo $tipo; ?>">
                <input type="hidden" name="estado" value="por_ver"> <label>Título (Empieza a escribir...)</label>
                <div style="position:relative">
                    <input type="text" name="titulo" id="titulo_input" class="input-std" required placeholder="Buscar...">
                    <div id="suggestions"></div>
                </div>

                <label>Imagen URL (Automática)</label>
                <input type="text" name="imagen_url" id="imagen_input" class="input-std" readonly style="background:#eee">

                <button class="btn" style="margin-top:15px;">Guardar</button>
                <a href="index.php?page=<?php echo ($tipo=='pelicula'?'peliculas':'series'); ?>" style="display:block; text-align:center; margin-top:10px; color:#555;">Cancelar</a>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php if ($page === 'editar'): 
    $id = intval($_GET['id']);
    $item = $conexion->query("SELECT * FROM contenidos WHERE id='$id'")->fetch_assoc();
?>
    <div class="contenedor_login">
        <div class="formulario_caja">
            <h2>Editar Datos</h2>
            <form action="index.php?page=actualizar_simple" method="POST">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="tipo_origen" value="<?php echo $_GET['tipo']; ?>">
                
                <label style="font-weight:bold;">Nombre:</label>
                <input type="text" name="titulo" class="input-std" value="<?php echo $item['titulo']; ?>" required>
                
                <label style="font-weight:bold;">Nivel de Prioridad:</label>
                <select name="prioridad" class="input-std">
                    <option value="Alta" <?php if($item['prioridad']=='Alta') echo 'selected'; ?>>🔴 Alta</option>
                    <option value="Media" <?php if($item['prioridad']=='Media') echo 'selected'; ?>>🔵 Media</option>
                    <option value="Baja" <?php if($item['prioridad']=='Baja') echo 'selected'; ?>>⚪ Baja</option>
                </select>

                <button class="btn" style="margin-top:15px;">Guardar Cambios</button>
                <a href="index.php?page=<?php echo ($_GET['tipo']=='pelicula'?'peliculas':'series'); ?>" style="display:block; text-align:center; margin-top:10px; color:#555;">Cancelar</a>
            </form>
        </div>
    </div>
<?php endif; ?>

<script>
    const API_KEY = 'b666a70a823c02390f77259663456345'; // Clave publica
    const tituloInput = document.getElementById('titulo_input');
    const suggestionsBox = document.getElementById('suggestions');
    const imagenInput = document.getElementById('imagen_input');
    const tipoContenido = document.getElementById('tipo_contenido');

    if(tituloInput){
        tituloInput.addEventListener('input', async function() {
            const query = this.value;
            if (query.length < 3) { suggestionsBox.style.display = 'none'; return; }
            const type = (tipoContenido.value === 'pelicula') ? 'movie' : 'tv';
            
            try {
                const res = await fetch(`https://api.themoviedb.org/3/search/${type}?api_key=3fd2be6f0c70a2a598f084ddfb75487c&language=es-ES&query=${query}`);
                const data = await res.json();
                suggestionsBox.innerHTML = '';
                if (data.results && data.results.length > 0) {
                    suggestionsBox.style.display = 'block';
                    data.results.slice(0, 5).forEach(item => {
                        const div = document.createElement('div');
                        div.className = 'sugg-item';
                        const title = item.title || item.name;
                        const year = (item.release_date || item.first_air_date || '').split('-')[0];
                        const img = item.poster_path ? `https://image.tmdb.org/t/p/w92${item.poster_path}` : '';
                        
                        div.innerHTML = `<img src="${img}" style="width:30px; margin-right:10px;"><span>${title} (${year})</span>`;
                        div.addEventListener('click', () => {
                            tituloInput.value = title;
                            if(item.poster_path) imagenInput.value = `https://image.tmdb.org/t/p/w500${item.poster_path}`;
                            suggestionsBox.style.display = 'none';
                        });
                        suggestionsBox.appendChild(div);
                    });
                }
            } catch (e) { console.log(e); }
        });
        document.addEventListener('click', (e) => { if(e.target !== tituloInput) suggestionsBox.style.display='none'; });
    }
</script>

</body>
</html>
