### File: ./admin/css/estilo.css
```
/* --- VARIABLES Y RESET --- */
:root {
    --primary-color: #ff4e00;
    --primary-gradient: linear-gradient(to right, #ff4e00, #ff7f50);
    --dark-bg: #1a1a1a;
    --light-bg: #f4f6f9;
    --sidebar-width: 260px;
    --text-color: #333;
    --white: #ffffff;
}

body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--light-bg);
    color: var(--text-color);
    box-sizing: border-box;
}

/* --- LAYOUT PRINCIPAL --- */
.admin-wrapper {
    display: flex;
    min-height: 100vh;
}

/* --- SIDEBAR --- */
.sidebar {
    width: var(--sidebar-width);
    background-color: var(--dark-bg);
    color: var(--white);
    display: flex;
    flex-direction: column;
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
    z-index: 100;
}

.sidebar-header {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-logo {
    max-width: 80%;
    height: auto;
}

.sidebar-nav {
    flex-grow: 1;
    padding: 20px 0;
    overflow-y: auto;
}

.sidebar-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-nav li {
    margin-bottom: 5px;
}

.sidebar-nav a {
    display: flex;
    align-items: center;
    padding: 15px 25px;
    color: #ccc;
    text-decoration: none;
    font-size: 1rem;
    transition: all 0.3s;
    border-left: 4px solid transparent;
}

.sidebar-nav a:hover,
.sidebar-nav a.active {
    background-color: rgba(255, 78, 0, 0.1);
    /* Naranja transparente */
    color: var(--white);
    border-left-color: var(--primary-color);
}

.sidebar-nav a i {
    width: 25px;
    margin-right: 10px;
    text-align: center;
    font-size: 1.1rem;
}

.nav-separator {
    margin: 15px 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.btn-logout:hover {
    color: #ff4e00 !important;
}

.sidebar-footer {
    padding: 15px;
    text-align: center;
    font-size: 0.8rem;
    color: #777;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* --- CONTENIDO PRINCIPAL --- */
.main-content {
    margin-left: var(--sidebar-width);
    flex-grow: 1;
    padding: 30px;
    transition: margin-left 0.3s;
}

/* --- DASHBOARD HEADER --- */
.page-header {
    margin-bottom: 30px;
}

.page-header h1 {
    margin: 0;
    font-size: 2rem;
    color: #2c3e50;
    font-weight: 700;
}

.page-header p {
    color: #7f8c8d;
    margin-top: 5px;
}

/* --- STATS CARDS --- */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border-top: 4px solid var(--primary-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.stat-info h3 {
    margin: 0;
    font-size: 2.2rem;
    font-weight: 700;
    color: #2c3e50;
}

.stat-info p {
    margin: 5px 0 0;
    color: #7f8c8d;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-icon {
    background: rgba(255, 78, 0, 0.1);
    color: var(--primary-color);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* --- CONTENIDO ADICIONAL (TABLAS/GRAFICOS) --- */
.content-section {
    background: var(--white);
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.section-header h2 {
    margin: 0;
    font-size: 1.2rem;
    color: #2c3e50;
}

/* Placeholder para la tabla/contenido */
.placeholder-content {
    height: 200px;
    background-color: #f9f9f9;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #aaa;
    border: 2px dashed #ddd;
}


/* --- RESPONSIVE --- */

@media (max-width: 768px) {

    /* ## SIDEBAR COMPACTA ## */
    .sidebar {
        width: 70px;
        overflow: hidden; /* # Evita que nada sobresalga # */
    }

    /* # Ocultamos elementos que no caben # */
    .sidebar-header,
    .sidebar-footer,
    .nav-separator,
    .sidebar-logo {
        display: none;
    }

    /* --- NAVEGACIÓN ICON-ONLY --- */
    /* # Truco: Ponemos fuente a 0 para ocultar el texto si no tiene span # */
    .sidebar-nav a {
        font-size: 0; 
        justify-content: center;
        padding: 15px 0;
    }

    /* Restauramos el tamaño solo para el icono */
    .sidebar-nav a i {
        font-size: 1.4rem;
        margin: 0; /* # Quitamos margen derecho */
    }

    /* --- CONTENIDO PRINCIPAL --- */
    .main-content {
        margin-left: 70px; /* # Coincide con el ancho del sidebar # */
        padding: 20px 15px; /* # Menos padding lateral # */
        width: calc(100% - 70px); /* # Aseguramos ancho correcto # */
    }

    /* --- REESTRUCTURACIÓN DE ELEMENTOS --- */
    /* Header: Titulo y boton apilados */
    .page-header {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .btn-primary-admin {
        float: none;
        margin-top: 0;
        width: 100%;
        text-align: center;
        display: block;
    }

    /* Stats Cards: Una debajo de otra */
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    /* Gráficas: Importante para que no se aplasten */
    .charts-row {
        flex-direction: column;
        display: flex;
        gap: 20px;
    }
    
    /* Aseguramos que el contenido de gráficas ocupe todo el ancho */
    .charts-row > div {
        width: 100%;
        margin: 0;
    }
}

/* PARA MÓVILES PEQUEÑOS (< 480px) */
@media (max-width: 480px) {
    
    .page-header h1 {
        font-size: 1.5rem;
    }

    /* Ajuste de tablas para que no rompan el layout */
    .admin-table th, 
    .admin-table td {
        padding: 10px 5px;
        font-size: 0.8rem;
    }
    
}

```

### File: ./admin/inc/cabecera.php
```
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de Administración</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
        	<img src="img/adminviews.png" class="logo-admin" alt="Logo AdminViews">
        	
        	<nav class="navegacion-header">
				<a href="index.php">Inicio</a>
				<!-- Aquí irán más opciones de admin en el futuro -->
			</nav>
        	
	        <a href="../front/index.php" class="btn-inicio"><img src="img/iconologout.png" alt="Salir al Front" title="Salir"></a> 
        </header>
        <main>

```

### File: ./admin/inc/conexion.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * ARCHIVO DE CONEXIÓN A BASE DE DATOS
 * -----------------------------------------------------------------------------
 * Este archivo establece la comunicación entre PHP y MySQL.
 * Se incluye en todos los archivos que necesiten leer o guardar datos.
 */

$host = "localhost";        // Servidor (suele ser localhost en XAMPP)
$user = "AdminViews";       // Usuario de la BD
$pass = "AdminViews123$";   // Contraseña del usuario
$db   = "AdminViews";       // Nombre exacto de la base de datos

// Paso 1: Intentar conectar
$conexion = new mysqli($host, $user, $pass, $db);

// Paso 2: Verificar si hubo error
if ($conexion->connect_error) {
    die("Error crítico de conexión: " . $conexion->connect_error);
}

// (Opcional) Forzar codificación UTF-8 para evitar problemas con tildes y ñ
$conexion->set_charset("utf8");
?>


```

### File: ./admin/inc/db.php
```
<?php
/**
 * 
 * ADMIN - CONEXIÓN A BASE DE DATOS
 * Reutilizamos la configuración del front para consistencia.
 * 
 */

$host = "localhost";
$user = "AdminViews";
$pass = "AdminViews123$";
$db   = "AdminViews";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error Admin - Conexión fallida: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>

```

### File: ./admin/inc/piedepagina.php
```
   		</main>
		<footer>
			<div class="footer-content">
				<p>&copy; 2025 | Panel de Administración</p>
			</div>
		</footer>
	</body>
</html>

```

### File: ./admin/inc/sidebar.php
```
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="img/adminviews.png" alt="Logo Admin" class="sidebar-logo">
    </div>
    
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="usuarios.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'usuarios.php' ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </li>
            <li>
                <a href="series.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'series.php' ? 'active' : ''; ?>">
                    <i class="fas fa-tv"></i> Series
                </a>
            </li>
            <li>
                <a href="peliculas.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'peliculas.php' ? 'active' : ''; ?>">
                    <i class="fas fa-film"></i> Películas
                </a>
            </li>
            <!-- Separador -->
            <li class="nav-separator"></li>
            <li>
                <a href="../front/index.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <p>&copy; 2025 AdminViews</p>
    </div>
</aside>

```

### File: ./admin/index.php
```
<?php
/**
 * PÁGINA PRINCIPAL DEL ADMIN (DASHBOARD)
 */
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../front/intruso.php");
    exit;
}
require_once "inc/db.php";

// 1. OBTENER DATOS REALES (KPIs)
// -------------------------------------------------------------------------

// Usuarios Totales
$sqlUsers = "SELECT COUNT(*) as total FROM usuario";
$resUsers = $conexion->query($sqlUsers);
$totalUsuarios = $resUsers->fetch_assoc()['total'];

// Series Totales
$sqlSeries = "SELECT COUNT(*) as total FROM contenido WHERE tipo = 'serie'";
$resSeries = $conexion->query($sqlSeries);
$totalSeries = $resSeries->fetch_assoc()['total'];

// Películas Totales
$sqlPelis = "SELECT COUNT(*) as total FROM contenido WHERE tipo = 'pelicula'";
$resPelis = $conexion->query($sqlPelis);
$totalPelis = $resPelis->fetch_assoc()['total'];

// Nuevos Hoy (Como no hay fecha_registro, mostramos 0 o simulamos para no romper el diseño, 
// lo ideal sería añadir un campo 'created_at' a la tabla usuario en el futuro)
$nuevosHoy = 0; 


// 2. DATOS PARA EL GRÁFICO (Distribución de Estados)
// -------------------------------------------------------------------------
// Queremos saber cuántos items hay 'Por_ver', 'Viendo', 'Vistas'
$sqlChart = "SELECT estado, COUNT(*) as cantidad FROM contenido GROUP BY estado";
$resChart = $conexion->query($sqlChart);

$dataChart = ['Por_ver' => 0, 'Viendo' => 0, 'Vistas' => 0];																																																																																										
while($row = $resChart->fetch_assoc()) {
    $dataChart[$row['estado']] = $row['cantidad'];
}

// 3. TOP 10 SERIES MÁS VISTAS (Ranking)
// -------------------------------------------------------------------------
$sqlTopSeries = "SELECT titulo, COUNT(*) as total FROM contenido WHERE tipo = 'serie' AND estado = 'Vistas' GROUP BY titulo ORDER BY total DESC LIMIT 10";
$resTopSeries = $conexion->query($sqlTopSeries);

// 4. TOP 10 PELÍCULAS MÁS VISTAS (Ranking)
// -------------------------------------------------------------------------
$sqlTopPelis = "SELECT titulo, COUNT(*) as total FROM contenido WHERE tipo = 'pelicula' AND estado = 'Vistas' GROUP BY titulo ORDER BY total DESC LIMIT 10";
$resTopPelis = $conexion->query($sqlTopPelis);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AdminViews</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>										

    <div class="admin-wrapper">
        
        <!-- SIDEBAR -->
        <?php include "inc/sidebar.php"; ?>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="main-content">

            <header class="page-header">
                <h1>Panel de Control</h1>
                <p>Bienvenido al sistema de administración de AdminViews.</p>
            </header>

            <!-- TARJETAS DE ESTADÍSTICAS -->
            <section class="stats-grid">
                
                <div class="stat-card">
                    <div class="stat-info">
                        <h3><?php echo $totalUsuarios; ?></h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-info">
                        <h3><?php echo $totalSeries; ?></h3>
                        <p>Series</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-info">
                        <h3><?php echo $totalPelis; ?></h3>
                        <p>Películas</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-film"></i>
                    </div>
                </div>


            </section>

            <!-- SECCIÓN DE ACTIVIDAD (GRÁFICO) -->
            <section class="content-section">
                <div class="section-header">
                    <h2>Estado del Contenido Global</h2>
                    <!-- Botón decorativo -->
                    <button style="background:none; border:none; cursor:pointer; color:#777;"><i class="fas fa-filter"></i></button>
                </div>
                
                <!-- Contenedor del gráfico -->
                <div style="height: 350px; width: 100%; position: relative;">
                    <canvas id="myChart"></canvas>
                </div>
            </section>

            <!-- NUEVA FILA DE RANKINGS (TOP SERIES Y PELIS) -->
            <div class="charts-row">
                
                <!-- TOP SERIES -->
                <section class="content-section" style="flex:1;">
                    <div class="section-header">
                        <h2>Top 10 Series Más Vistas</h2>
                    </div>
                    
                    <ol class="ranking-list">
                        <?php 
                        $pos = 1;
                        if ($resTopSeries->num_rows > 0) {
                            while($row = $resTopSeries->fetch_assoc()) {
                                $badgeClass = 'default';
                                if($pos == 1) $badgeClass = 'gold';
                                elseif($pos == 2) $badgeClass = 'silver';
                                elseif($pos == 3) $badgeClass = 'bronze';
                                
                                echo "<li class='ranking-item'>";
                                echo "<span class='ranking-pos $badgeClass'>$pos</span>";
                                echo "<div class='ranking-info'>";
                                echo "<strong>" . htmlspecialchars($row['titulo']) . "</strong>";
                                echo "<small>" . $row['total'] . " visualizaciones</small>";
                                echo "</div>";
                                echo "</li>";
                                $pos++;
                            }
                        } else {
                            echo "<p style='color:#777; padding:10px;'>No hay datos suficientes.</p>";
                        }
                        ?>
                    </ol>
                </section>

                <!-- TOP PELÍCULAS -->
                <section class="content-section" style="flex:1;">
                    <div class="section-header">
                        <h2>Top 10 Películas Más Vistas</h2>
                    </div>
                    
                    <ol class="ranking-list">
                        <?php 
                        $pos = 1;
                        if ($resTopPelis->num_rows > 0) {
                            while($row = $resTopPelis->fetch_assoc()) {
                                $badgeClass = 'default';
                                if($pos == 1) $badgeClass = 'gold';
                                elseif($pos == 2) $badgeClass = 'silver';
                                elseif($pos == 3) $badgeClass = 'bronze';
                                
                                echo "<li class='ranking-item'>";
                                echo "<span class='ranking-pos $badgeClass'>$pos</span>";
                                echo "<div class='ranking-info'>";
                                echo "<strong>" . htmlspecialchars($row['titulo']) . "</strong>";
                                echo "<small>" . $row['total'] . " visualizaciones</small>";
                                echo "</div>";
                                echo "</li>";
                                $pos++;
                            }
                        } else {
                            echo "<p style='color:#777; padding:10px;'>No hay datos suficientes.</p>";
                        }
                        ?>
                    </ol>
                </section>

            </div>

        </main>

    </div>

    <!-- Script del Gráfico -->
    <script>
        // --- GRÁFICO PRINICPAL (ESTADOS) ---
        const ctx = document.getElementById('myChart');
        const datos = {
            porVer: <?php echo $dataChart['Por_ver']; ?>,
            viendo: <?php echo $dataChart['Viendo']; ?>,
            vistas: <?php echo $dataChart['Vistas']; ?>
        };

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Por Ver', 'Viendo', 'Vistas'],
                datasets: [{
                    label: 'Contenidos',
                    data: [datos.porVer, datos.viendo, datos.vistas],
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(75, 192, 192)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
                plugins: { legend: { display: false } }
            }
        });
    </script>

        </main>

    </div>

</body>
</html>

```

### File: ./admin/peliculas.php
```
<?php
/**
 * PÁGINA DE GESTIÓN DE PELÍCULAS
 */
session_start();
require_once "inc/db.php";

// Consulta de películas
$sql = "SELECT * FROM contenido WHERE tipo = 'pelicula'";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas - AdminViews</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <?php include "inc/sidebar.php"; ?>
        
        <main class="main-content">
            <header class="page-header">
                <h1>Catálogo de Películas</h1>
                <p>Lista completa de películas disponibles</p>
                <button class="btn-primary-admin"><i class="fas fa-plus"></i> Nueva Película</button>
            </header>

            <section class="content-section">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Carátula</th>
                                <th>Título</th>
                                <th>Estado</th>
                                <th>Puntuación</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado->num_rows > 0): ?>
                                <?php while($row = $resultado->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <?php if($row['imagen_url']): ?>
                                                <img src="<?php echo htmlspecialchars($row['imagen_url']); ?>" alt="Cover" class="img-tabla-mini">
                                            <?php else: ?>
                                                <div class="no-img-mini"><i class="fas fa-image"></i></div>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong><?php echo htmlspecialchars($row['titulo']); ?></strong></td>
                                        <td><span class="badge status-<?php echo strtolower($row['estado']); ?>"><?php echo $row['estado']; ?></span></td>
                                        <td><?php echo $row['puntuacion']; ?>/5</td>
                                        <td><?php echo $row['nivel_prioridad']; ?></td>
                                        <td>
                                            <a href="#" class="btn-action edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-action delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;">No hay películas registradas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>

```

### File: ./admin/series.php
```
<?php
/**
 * PÁGINA DE GESTIÓN DE SERIES
 */
session_start();
require_once "inc/db.php";

// Consulta de series
$sql = "SELECT * FROM contenido WHERE tipo = 'serie'";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series - AdminViews</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <?php include "inc/sidebar.php"; ?>
        
        <main class="main-content">
            <header class="page-header">
                <h1>Catálogo de Series</h1>
                <p>Lista completa de series en la plataforma</p>
                <button class="btn-primary-admin"><i class="fas fa-plus"></i> Nueva Serie</button>
            </header>

            <section class="content-section">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Carátula</th>
                                <th>Título</th>
                                <th>Estado</th>
                                <th>Puntuación</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado->num_rows > 0): ?>
                                <?php while($row = $resultado->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <?php if($row['imagen_url']): ?>
                                                <img src="<?php echo htmlspecialchars($row['imagen_url']); ?>" alt="Cover" class="img-tabla-mini">
                                            <?php else: ?>
                                                <div class="no-img-mini"><i class="fas fa-image"></i></div>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong><?php echo htmlspecialchars($row['titulo']); ?></strong></td>
                                        <td><span class="badge status-<?php echo strtolower($row['estado']); ?>"><?php echo $row['estado']; ?></span></td>
                                        <td><?php echo $row['puntuacion']; ?>/5</td>
                                        <td><?php echo $row['nivel_prioridad']; ?></td>
                                        <td>
                                            <a href="#" class="btn-action edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-action delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;">No hay series registradas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>

```

### File: ./admin/usuarios.php
```
<?php
/**
 * PÁGINA DE GESTIÓN DE USUARIOS
 */
session_start();
require_once "inc/db.php";

// Consulta de usuarios
$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - AdminViews</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <?php include "inc/sidebar.php"; ?>
        
        <main class="main-content">
            <header class="page-header">
                <h1>Gestión de Usuarios</h1>
                <p>Administra los usuarios registrados en el sistema</p>
            </header>

            <section class="content-section">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado->num_rows > 0): ?>
                                <?php while($row = $resultado->fetch_assoc()): ?>
                                    <tr>
                                        <td>#<?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                                        <td><?php echo htmlspecialchars($row['correo']); ?></td>
                                        <td>
                                            <a href="#" class="btn-action edit" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-action delete" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">No hay usuarios registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>

```

### File: ./front/controladores/guardar_contenido.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * CONTROLADOR: GUARDAR CONTENIDO
 * -----------------------------------------------------------------------------
 * Recibe los datos de los formularios (película o serie) y los guarda en la BD.
 */
session_start();
require_once '../inc/db.php';

// 1. Verificar sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../intruso.php");
    exit;
}

// 2. Verificar datos mínimos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario_id = $_SESSION['id_usuario'];
    $tipo = $_POST['tipo'] ?? 'pelicula'; // 'pelicula' o 'serie'
    
    $titulo = $_POST['nombre'];
    $comentario = $_POST['comentario'] ?? '';
    // Mapeo simple: Si viene del formulario 'Por ver' se guarda como 'Por_ver' en BD
    $estado_raw = $_POST['estado'] ?? 'Por_ver';
    $estado = ($estado_raw == 'Por ver') ? 'Por_ver' : $estado_raw;
    
    $prioridad = $_POST['prioridad'] ?? 'Media';
    $img_url = $_POST['imagen_url'] ?? '';

    // 3. Insertar en BD
    $sql = "INSERT INTO contenido (usuario_id, titulo, comentario, estado, tipo, nivel_prioridad, imagen_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("issssss", $usuario_id, $titulo, $comentario, $estado, $tipo, $prioridad, $img_url);
    
    if ($stmt->execute()) {
        // Redirección según el tipo
        if ($tipo === 'serie') {
            header("Location: ../series.php");
        } else {
            header("Location: ../peliculas.php");
        }
    } else {
        echo "Error al guardar: " . $conexion->error;
    }
    
    $stmt->close();
    $conexion->close();
    
} else {
    // Si intentan entrar directo
    header("Location: ../exito.php");
}
?>

```

### File: ./front/controladores/login_procesa.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * CONTROLADOR: PROCESAR LOGIN
 * -----------------------------------------------------------------------------
 * Recibe los datos del formulario de inicio de sesión y verifica credenciales.
 * En el caso de que el usuario sea admin lo lleva al admin panel.
 * En el caso contrario lo lleva por la ruta normal.
 */

session_start();
require_once '../inc/db.php'; // Conexión a BD

// ¿El usuario envió el formulario?
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    
    $usuario = $_POST['usuario'];
    $pass_ingresada = $_POST['contrasena'];

    // 1. Buscamos SOLO por usuario (evitando inyección SQL con prepare)
    $sql = "SELECT id, usuario, contrasena FROM usuario WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario); // "s" = string
    $stmt->execute();
    
    $resultado = $stmt->get_result();

    // 2. Si el usuario existe, extraemos sus datos
    if ($fila = $resultado->fetch_assoc()) {
        
        $hash_guardado = $fila['contrasena']; // El hash encriptado de la BD

        // 3. Comparamos la pass escrita (texto plano) con el hash (encriptado)
        if (password_verify($pass_ingresada, $hash_guardado)) {
        
            // LOGIN ÉXITOSO: Guardamos datos en sesión para recordarlo
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['id_usuario'] = $fila['id'];
            
			## LOGICA DE REDIRECCION MANUAL ##
            if ($fila['usuario'] === 'Admin1') {  // SI EL USUARIO ES ADMIN
                header("Location: ../../admin/index.php"); // LO LLEVA A AL PANEL DE ADMIN
            } else {
                header("Location: ../exito.php"); // Ruta normal
            }
            
            exit;
        } else {
            // Contraseña mal
            header("Location: ../index.php?error=1");
            exit;
        }

    } else {
        // Usuario no existe
        header("Location: ../index.php?error=1");
        exit;
    }

    $stmt->close();
    $conexion->close();

} else {
    // Intento de acceso directo sin formulario
    header("Location: ../index.php");
}
?>

```

### File: ./front/controladores/registro_procesa.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * CONTROLADOR: PROCESAR REGISTRO
 * -----------------------------------------------------------------------------
 * Valida los datos del nuevo usuario y lo inserta en la base de datos si todo es correcto.
 */

session_start();
require_once '../inc/db.php'; // Conexión a BD

// Recogida de datos del formulario (POST)
$nombre = $_POST['nombrecompleto'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$correo = $_POST['email'];

$errores = []; // Array para guardar fallos encontrados

// --- 1. VALIDAR SI EL USUARIO YA EXISTE ---
// Evitamos duplicados buscando si el nick ya está en la tabla
$usuario_seguro = mysqli_real_escape_string($conexion, $usuario);
$sql_check = "SELECT * FROM usuario WHERE usuario = '$usuario_seguro'";
$res_check = mysqli_query($conexion, $sql_check);

if (mysqli_num_rows($res_check) > 0) {
    $errores['usuario'] = "Este usuario ya está ocupado. Elige otro.";
}
    
// --- 2. VALIDAR QUE EL EMAIL SEA VALIDO ---
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El correo no tiene un formato válido.";
}

// --- 3. VALIDAR QUE LA CONTRASEÑA SEA SEGURA ---
// Regla: 8-16 chars, al menos 1 Mayúscula y 1 Símbolo
if (!preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,16}$/', $contrasena)) {
    $errores['pass'] = "La contraseña debe tener 8-16 carácteres, 1 Mayúscula y 1 Símbolo";
}

// --- 4. VALIDAR QUE EL USUARIO CUMPLA CON LOS REQUISITOS ---
// Regla: 5-20 chars, al menos 1 Mayúscula y 1 número.
if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{5,20}$/', $usuario)) {
    $errores['usuario'] = "El usuario requiere 5-20 caracteres, al menos 1 mayúscula y 1 número.";
}

// --- SI HAY ERRORES ---
// Guardamos los errores y los datos previos en la sesión para mostrarlos de vuelta en index.php
if (!empty($errores)) {
    $_SESSION['errores'] = $errores;
    $_SESSION['datos_viejos'] = $_POST; // Sticky Form: Para no tener que reescribir todo
    
    header("Location: ../index.php"); 
    exit;
}

// --- SI TODO ESTÁ BIEN ---
// 1. Encriptamos la contraseña (Nunca guardar en texto plano)
$passHash = password_hash($contrasena, PASSWORD_DEFAULT);

// 2. Insertamos en la BD
$sql = "INSERT INTO usuario (usuario, contrasena, nombre, correo) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $usuario, $passHash, $nombre, $correo);

if($stmt->execute()){
    // Registro correcto: Redirigimos al login con mensaje de éxito
    header("Location: ../index.php?registro=ok"); 
} else {
    echo "Error BD: " . $conexion->error;
}
?>

```

### File: ./front/css/estilo.css
```
/* --- RESET GENERAL --- */

body {
	background: linear-gradient(to right, rgb(250, 235, 215), rgb(255, 250, 240));
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif; /* Tu fuente preferida */

    /* --- ESTO ES LO QUE HACE LA MAGIA --- */
    display: flex;
    flex-direction: column; /* Coloca los elementos uno debajo de otro */
    min-height: 100vh;      /* Obliga al body a medir AL MENOS el 100% de la altura de la pantalla */
}

/* //////////////////////////////////////////////////////////////////// HEADER //////////////////////////////////////////////////////////////////// */
 
/* --- ESTILOS DE LA CABECERA --- */
header {
    /* FONDO DEGRADADO (Igual que antes) */
    background: linear-gradient(to right, rgb(255, 69, 0), rgb(255, 127, 80));
 
    /* TAMAÑO Y ESPACIADO (CAMBIOS AQUÍ) */
    /* Quitamos el min-height fijo y dejamos que el contenido dicte la altura */
    width: 100%;

    /* Padding reducido: 10px arriba/abajo, 5px a los lados (casi pegado) */
    padding: 10px 10px; 
    box-sizing: border-box;
 
    /* Flexbox */
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
 
    /* Color y Decoración */
    color: #FFFFFF; 
    box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    border-bottom: 1px solid rgba(0,0,0,0.9);
}
 
/* --- ESTILOS DEL LOGO ADMINVIEWS --- */

.logo-admin {
    /* Aumentamos un poco el ancho permitido para que se lea bien */
    max-width: 150px; 
    
    /* Limitamos la altura para que no deforme la cabecera */
    max-height: 50px; 
    background-color: #FFFFFF;

    /* Reduje un poco el padding interno del logo para ganar espacio */
    padding: 5px 8px; 
    border-radius: 8px; /* Radio un poco más sutil */
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
 
/* --- ESTILOS DEL BOTÓN DE VOLVER --- */

.btn-inicio {
    display: block;

    /* Ajustado a 45px (un poco más pequeño que 50, pero aún fácil de clicar) */
    width: 45px; 
    height: 45px;
    transition: transform 0.3s ease;
    z-index: 10;
}
 
.btn-inicio img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
 
.btn-inicio:hover {
    transform: scale(1.1);
    cursor: pointer;
}

/* --- ESTILOS DEL MENÚ DE NAVEGACIÓN --- */

.navegacion-header {
    display: flex;
    gap: 25px; /* Separación entre las palabras */
    align-items: center;
}

.navegacion-header a {
    color: #FFFFFF;
    text-decoration: none; /* Quita el subrayado típico de los enlaces */
    font-size: 1.1rem;
    font-weight: 600; /* Un poco de negrita */
    text-transform: uppercase; /* Opcional: pone el texto en mayúsculas */
    letter-spacing: 1px;
    padding: 5px 0;
    position: relative;
    transition: all 0.3s ease;
}

/* Efecto Hover: Cambia ligeramente la opacidad y añade una línea abajo */
.navegacion-header a:hover {
    color: rgba(255, 255, 255, 0.8);
    border-bottom: 2px solid white; 
}

/* --- AJUSTE RESPONSIVE (PARA MÓVIL) --- */
/* Añade esto para que en pantallas pequeñas el menú baje y no se amontone */
@media (max-width: 768px) {
    header {
        flex-direction: column; /* Cambia a vertical */
        gap: 15px; /* Espacio entre logo, menú y botón */
        padding: 15px;
    }

    .navegacion-header {
        flex-direction: row; /* Mantiene los enlaces en fila */
        gap: 15px;
        font-size: 0.9rem;
    }
}
 
/* //////////////////////////////////////////////////////////////////// MAIN //////////////////////////////////////////////////////////////////// */
 
main {
    /* El 1 hace que este elemento ocupe todo el espacio libre disponible */
    flex: 1; 

    /* Tu padding o estilos opcionales */
    width: 100%;
}
 
/* Contenedor principal para centrar las tarjetas */

.cards-container {
    display: flex;
    justify-content: center; /* Centradas horizontalmente */
    gap: 50px; /* Separación entre las tarjetas */
    padding: 50px 20px;
    flex-wrap: wrap; /* Para que baje una debajo de otra en móvil */
}
 
/* Estilo base de la tarjeta */

.card {
    width: 350px; /* Ancho similar a la imagen */
    background-color: white;
    border: 1px solid #000; /* Borde negro fino como en la imagen */
    border-radius: 20px;    /* Bordes muy redondeados */
    overflow: hidden;       /* Para que el color de fondo no se salga de las esquinas */
    display: flex;
    flex-direction: column;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
 
/* --- PARTE SUPERIOR (NARANJA) --- */

.card-header {
    /* Mismo degradado que tu cabecera */
    background: linear-gradient(to right, rgb(255, 69, 0), rgb(255, 127, 80));
    padding: 30px 20px;
    text-align: center;
    color: white;

    /* Flex para centrar icono y texto */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
}
 
.card-icon {
    width: 200px;  /* Tamaño del icono grande (TV/Cine) */
    height: auto;
    object-fit: contain;
    filter: brightness(0) invert(1); /* Vuelve el icono blanco si tu imagen es negra */
}
 
.card-header h3 {
    margin: 0;
    font-size: 1.6rem;
    font-weight: bold;
}
 
/* --- PARTE INFERIOR (BLANCA) --- */

.card-body {
    padding: 25px;
    text-align: center;
    flex-grow: 1; /* Hace que ocupen el mismo alto si el texto varía */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}
 
.card-body p {
    font-size: 1rem;
    line-height: 1.5;
    color: #333;
    margin-bottom: 25px;
}
 
/* --- BOTÓN FLECHA --- */

.btn-flecha {
    background: linear-gradient(to right, rgb(255, 69, 0), rgb(255, 127, 80));
    padding: 10px 40px; /* Botón ancho */
    border-radius: 10px;
    display: inline-block;

    /* Para alinear el botón a la derecha como en la imagen: */
    align-self: flex-end; 
    transition: transform 0.2s ease;
}
 
.btn-flecha img {
    width: 30px; /* Tamaño de la flecha */
    height: auto;
    display: block;
    filter: brightness(0) invert(1); /* Asegura que la flecha se vea blanca */
}
 
.btn-flecha:hover {
    transform: scale(1.05);
    cursor: pointer;
}
 
/* //////////////////////////////////////////////////////////////////// FOOTER //////////////////////////////////////////////////////////////////// */
 
footer {
    background-color: #1a1a1a;       /* Fondo oscuro */
    color: #ffffff;                  /* Texto blanco */
    border-top: 4px solid rgb(255, 69, 0); /* Línea naranja superior */
    text-align: center;              /* Texto centrado */
    padding: 20px 0;                 /* Espacio arriba y abajo */
    width: 100%;
}
 
footer p {
    margin: 0;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

/* //////////////////////////////////////////////////////////////////// SERIES / PELICULAS //////////////////////////////////////////////////////////////////// */

/* --- ESTRUCTURA PRINCIPAL (TABLERO) --- */
.tablero-visual {
    display: flex;
    justify-content: center;
    gap: 40px; /* Separación amplia entre columnas */
    padding: 40px 20px;
    align-items: flex-start; /* Alinea al top */
    flex-wrap: wrap;
}

.columna-separada {
    width: 320px;
    display: flex;
    flex-direction: column;
    gap: 15px; /* Espacio entre el título naranja y la caja blanca */
}

/* El título estilo "Botón" o "Píldora" */
.titulo-pill {
    background: linear-gradient(to right, #ff4e00, #ff7f50);
    color: white;
    text-align: center;
    padding: 12px;
    border-radius: 10px; /* Bordes redondeados */
    border: 1px solid #000; /* Borde negro fino como en el diseño */
    font-weight: bold;
    font-size: 1.2rem;
    box-shadow: 0 3px 6px rgba(0,0,0,0.15);
}

/* La caja blanca grande donde caen las series */
.caja-lista {
    background-color: white;
    border: 1px solid #000; /* Borde negro */
    border-radius: 10px;
    min-height: 500px; /* Altura fija alta */
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

/* --- TARJETA DE SERIE INDIVIDUAL --- */
.tarjeta-serie {
    display: flex;
    background: white;
    border: 1px solid #000; /* Borde negro en cada tarjeta */
    border-radius: 10px; /* Bordes redondeados */
    padding: 10px;
    align-items: center;
    gap: 10px;
    position: relative;
}

.img-serie {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.info-serie {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.info-serie h4 {
    margin: 0;
    font-size: 1rem;
    color: #000;
}

.info-serie p {
    margin: 3px 0 0 0;
    font-size: 0.8rem;
    color: #666;
}

/* Acciones (Iconos a la derecha) */
.acciones-serie {
    display: flex;
    flex-direction: column; /* Iconos uno encima de otro o en fila segun prefieras */
    align-items: flex-end;
    gap: 5px;
    min-width: 60px;
}

.btns-left, .btns-right {
    display: flex;
    gap: 8px;
}

.btn-icon {
    cursor: pointer;
    font-size: 1.1rem;
    transition: transform 0.2s;
}
.btn-icon:hover { transform: scale(1.2); }
.check { color: #2ecc71; }
.borrar { color: #e74c3c; }


/* --- BOTÓN AGREGAR (HEADER) --- */
.btn-agregar-diseno {
    background: linear-gradient(to right, #ff4e00, #ff7f50);
    color: white;
    border: none;
    border-radius: 20px; /* Muy redondeado */
    padding: 10px 25px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.plus-icon {
    border: 2px solid white;
    border-radius: 50%;
    width: 20px; /* Un pelín más grande */
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    line-height: 1; /* Reset del line-height */
    margin-right: 2px;
}


/* --- MODAL (Diseño exacto foto 2) --- */
.modal-overlay {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(255,255,255,0.8); /* Fondo blanco semitransparente como en diseño moderno? O oscuro? */
    /* Si prefieres oscuro como suele ser: */
    background-color: rgba(0,0,0,0.5); 
    
    align-items: center;
    justify-content: center;
}

.modal-card-diseno {
    /* Fondo Naranja Degradado */
    background: linear-gradient(to bottom, #ff4e00, #ff8c00);
    width: 350px;
    padding: 30px;
    border-radius: 15px;
    border: 1px solid #000;
    text-align: center;
    color: white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.modal-card-diseno h2 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 1.4rem;
}

.form-diseno {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Los inputs blancos con borde negro */
.input-diseno {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #000; /* Borde negro visible */
    background-color: white;
    font-size: 0.95rem;
    box-sizing: border-box;
    font-family: sans-serif;
}

.textarea-diseno {
    resize: none;
    height: 100px;
}

/* Select personalizado */
.select-wrapper-diseno {
    position: relative;
}
.select-diseno {
    appearance: none;
    -webkit-appearance: none;
    color: #333;
}
.flecha-abajo {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
    pointer-events: none;
}

/* Botón agregar dentro del modal */
.btn-agregar-modal {
    margin-top: 10px;
    background: transparent;
    border: 2px solid white;
    color: white;
    padding: 10px 30px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
}
.btn-agregar-modal:hover {
    background: rgba(255,255,255,0.2);
}
.btn-cancelar {
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    text-decoration: underline;
    margin-right: 10px;
}

/* --- CARROUSEL NETFLIX STYLE --- */
.netflix-section {
    padding: 20px 40px;
    margin-bottom: 20px;
}

.netflix-section h2 {
    color: #333;
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-left: 5px solid #FF4500;
    padding-left: 15px;
}

.carousel-container {
    position: relative;
    width: 100%;
}

.carousel {
    display: flex;
    overflow-x: auto;
    gap: 15px;
    padding: 20px 5px; /* Padding vertical para el efecto hover */
    scroll-behavior: smooth;
}

/* Ocultar barra de scroll pero mantener funcionalidad */
.carousel::-webkit-scrollbar {
    height: 8px;
}
.carousel::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}
.carousel::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
}
.carousel::-webkit-scrollbar-thumb:hover {
    background: #FF4500;
}

.poster-card {
    flex: 0 0 auto; /* No encoger, no crecer */
    width: 160px;
    position: relative;
    border-radius: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    background: #000; /* Fondo negro si no carga img */
}

.poster-card img {
    width: 100%;
    height: 240px; /* Altura fija tipo poster */
    object-fit: cover;
    border-radius: 8px;
    display: block;
}

.poster-card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    z-index: 10;
}

.poster-overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    padding: 15px 10px 10px;
    border-radius: 0 0 8px 8px;
    opacity: 0;
    transition: opacity 0.3s;
}

.poster-card:hover .poster-overlay {
    opacity: 1;
}

.poster-title {
    color: white;
    font-size: 0.9rem;
    font-weight: bold;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

```

### File: ./front/exito.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * DASHBOARD PRINCIPAL (HOME)
 * -----------------------------------------------------------------------------
 * Página de bienvenida tras loguearse.
 */
session_start();
 
// --- SEGURIDAD DE SESIÓN ---
// Verificamos si la variable de sesión existe.
// Si NO existe (!isset), significa que el usuario no se ha logueado.
// Lo expulsamos inmediatamente a "intruso.php".
if (!isset($_SESSION['usuario'])) {
    header("Location: intruso.php");
    exit;
}
?>
 
<!doctype html>
<html lang="es">
	<head>
		<title>AdminViews</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="img/adminviews_favicon.png">
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body>
		<header>
			<img src="img/adminviews.png" class="logo-admin" alt="Logo AdminViews">
			<a href="index.php" class="btn-inicio"><img src="img/iconologout.png" alt="Volver al Inicio" title='Salir'></a> 
		</header>
		<main>
			<section class="cards-container">
				<article class="card">
					<div class="card-header">
						<img src="img/iconoseries.png" alt="Icono Series" class="card-icon">
						<h3>Lista de Series</h3>
					</div>
					<div class="card-body">
						<p>Accede a todas las series que tienes añadidas a tu lista de series pendientes, viendo o vistas.</p>
						<a href="series.php" class="btn-flecha">
						<img src="img/flechaderecha.png" alt="Ir">
						</a>
					</div>
				</article>
				<article class="card">
					<div class="card-header">
						<img src="img/iconopelicula.png" alt="Icono Películas" class="card-icon">
						<h3>Lista de Películas</h3>
					</div>
					<div class="card-body">
						<p>Accede a todas las películas que tienes añadidas a tu lista de películas pendientes o vistas.</p>
						<a href="peliculas.php" class="btn-flecha">
						<img src="img/flechaderecha.png" alt="Ir">
					</a>
					</div>
				</article>
			</section>
<?php include "inc/piedepagina.php" ?>

```

### File: ./front/formulario_pelicula.php
```
<?php
	/**
	 * -------------------------------------------------------------------------
	 * FORMULARIO: AÑADIR PELÍCULA
	 * -------------------------------------------------------------------------
	 */
	session_start(); 
	if (!isset($_SESSION['usuario'])) {
		header("Location: intruso.php");
		exit;
	}
?>
<?php include "inc/cabecera.php" ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	<style>
		.container {
			padding: 40px 20px;
			display: flex;
			justify-content: center;
			align-items: flex-start;
		}
		
		/* Reutilizamos estilo similar al modal pero en página completa */
		.form-card {
			background-color: white;
			padding: 30px;
			border-radius: 10px;
			border: 1px solid #000;
			box-shadow: 0 10px 25px rgba(0,0,0,0.1);
			width: 100%;
			max-width: 500px;
		}

		.form-title {
			text-align: center;
			color: #FF4500; /* Naranja corporativo */
			margin-bottom: 25px;
			font-size: 1.8rem;
			font-weight: bold;
		}

		.input-group {
			position: relative;
			margin-bottom: 20px;
		}

		.input-group input, .input-group select {
			width: 100%;
			padding: 12px 15px 12px 40px; /* Espacio para icono */
			border: 1px solid #ccc;
			border-radius: 5px;
			font-family: inherit;
			box-sizing: border-box;
		}
		
		.input-group i {
			position: absolute;
			left: 15px;
			top: 50%;
			transform: translateY(-50%);
			color: #aaa;
		}

		button[type="submit"] {
			width: 100%;
			padding: 12px;
			border: none;
			border-radius: 25px;
			background: linear-gradient(to right, #ff4e00, #ff7f50);
			color: white;
			font-weight: bold;
			font-size: 1rem;
			cursor: pointer;
			transition: transform 0.2s;
			margin-top: 10px;
		}

		button[type="submit"]:hover {
			transform: scale(1.02);
		}

		/* Sugerencias API */
		.suggestions-box {
			position: absolute; top: 100%; left: 0; width: 100%;
			background: #fff; border: 1px solid #ddd; border-top: none;
			z-index: 1001; max-height: 200px; overflow-y: auto;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 0 0 8px 8px; 
			display: none;
		}
		.sugg-item { padding: 10px; display: flex; align-items: center; cursor: pointer; border-bottom: 1px solid #eee; }
		.sugg-item:hover { background-color: #f9f9f9; }
		.sugg-item img { width: 40px; margin-right: 10px; border-radius: 4px; }
	</style>

	<div class="container">
		<div class="form-card">
			<form action="controladores/guardar_contenido.php" method="POST">
				<input type="hidden" name="tipo" value="pelicula">
				
				<h1 class="form-title">Nueva Película</h1>
				
				<!-- Preview de la imagen seleccionada -->
				<div id="preview_container" style="text-align:center; display:none; margin-bottom:20px;">
					<img id="preview_img" src="" style="width:120px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
				</div>
				<input type="hidden" name="imagen_url" id="imagen_input">

				<div class="input-group">
					<input type="text" name="nombre" id="titulo_input" placeholder="Buscar título..." autocomplete="off" required />
					<i class="fa-solid fa-magnifying-glass"></i>
					<div id="suggestions" class="suggestions-box"></div>
				</div>

				<div class="input-group">
					<input type="text" name="comentario" placeholder="Comentario o reseña breve" />
					<i class="fa-solid fa-comment"></i>
				</div>

				<div class="input-group">
					<select name="prioridad" required>
						<option value="" disabled>Selecciona Prioridad</option>
						<option value="Alta">Alta</option>
						<option value="Media" selected>Media</option>
						<option value="Baja">Baja</option>
					</select>
					<i class="fa-solid fa-layer-group"></i>
				</div>

				<div class="input-group">
					<select name="estado" required>
						<option value="Por_ver" selected>Por ver</option>
						<option value="Vistas">Vista</option>
					</select>
					<i class="fa-solid fa-eye"></i>
				</div>

				<button type="submit">Guardar Película</button>
				
				<div style="text-align:center; margin-top:15px;">
					<a href="peliculas.php" style="color: #666; text-decoration:none; font-size:0.9rem;">
						Cancelar
					</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		// API TMDB - Lógica de búsqueda
		const API_KEY = '3fd2be6f0c70a2a598f084ddfb75487c'; 
		const tituloInput = document.getElementById('titulo_input');
		const suggestionsBox = document.getElementById('suggestions');
		const imagenInput = document.getElementById('imagen_input');
		const previewContainer = document.getElementById('preview_container');
		const previewImg = document.getElementById('preview_img');

		if (tituloInput) {
			tituloInput.addEventListener('input', async function() {
				const query = this.value.trim();
				if (query.length < 3) { suggestionsBox.style.display = 'none'; return; }

				try {
					const res = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${API_KEY}&language=es-ES&query=${query}`);
					const data = await res.json();
					suggestionsBox.innerHTML = '';

					if (data.results && data.results.length > 0) {
						suggestionsBox.style.display = 'block';
						data.results.slice(0, 5).forEach(movie => {
							const div = document.createElement('div');
							div.className = 'sugg-item';
							
							const title = movie.title;
							const year = movie.release_date ? movie.release_date.split('-')[0] : '';
							const poster = movie.poster_path ? `https://image.tmdb.org/t/p/w92${movie.poster_path}` : '';
							const fullPoster = movie.poster_path ? `https://image.tmdb.org/t/p/w500${movie.poster_path}` : '';

							div.innerHTML = `<img src="${poster}" alt="img"><div><strong>${title}</strong> <small>(${year})</small></div>`;

							div.addEventListener('click', () => {
								tituloInput.value = title;
								imagenInput.value = fullPoster; 
								if(fullPoster) {
									previewImg.src = fullPoster;
									previewContainer.style.display = 'block';
								}
								suggestionsBox.style.display = 'none';
							});
							suggestionsBox.appendChild(div);
						});
					} else { suggestionsBox.style.display = 'none'; }
				} catch (e) { console.error(e); }
			});
		}
	</script>

<?php include "inc/piedepagina.php" ?>

```

### File: ./front/formulario_serie.php
```
<?php
	/**
	 * -------------------------------------------------------------------------
	 * FORMULARIO: AÑADIR SERIE
	 * -------------------------------------------------------------------------
	 */
	session_start(); 
	if (!isset($_SESSION['usuario'])) {
		header("Location: intruso.php");
		exit;
	}
?>
<?php include "inc/cabecera.php" ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	<style>
		.container {
			padding: 40px 20px;
			display: flex;
			justify-content: center;
			align-items: flex-start;
		}
		
		.form-card {
			background-color: white;
			padding: 30px;
			border-radius: 10px;
			border: 1px solid #000;
			box-shadow: 0 10px 25px rgba(0,0,0,0.1);
			width: 100%;
			max-width: 500px;
		}

		.form-title {
			text-align: center;
			color: #FF4500; 
			margin-bottom: 25px;
			font-size: 1.8rem;
			font-weight: bold;
		}

		.input-group {
			position: relative;
			margin-bottom: 20px;
		}

		.input-group input, .input-group select {
			width: 100%;
			padding: 12px 15px 12px 40px; 
			border: 1px solid #ccc;
			border-radius: 5px;
			font-family: inherit;
			box-sizing: border-box;
		}
		
		.input-group i {
			position: absolute;
			left: 15px;
			top: 50%;
			transform: translateY(-50%);
			color: #aaa;
		}

		button[type="submit"] {
			width: 100%;
			padding: 12px;
			border: none;
			border-radius: 25px;
			background: linear-gradient(to right, #ff4e00, #ff7f50);
			color: white;
			font-weight: bold;
			font-size: 1rem;
			cursor: pointer;
			transition: transform 0.2s;
			margin-top: 10px;
		}

		button[type="submit"]:hover {
			transform: scale(1.02);
		}

		.suggestions-box {
			position: absolute; top: 100%; left: 0; width: 100%;
			background: #fff; border: 1px solid #ddd; border-top: none;
			z-index: 1001; max-height: 200px; overflow-y: auto;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 0 0 8px 8px; 
			display: none;
		}
		.sugg-item { padding: 10px; display: flex; align-items: center; cursor: pointer; border-bottom: 1px solid #eee; }
		.sugg-item:hover { background-color: #f9f9f9; }
		.sugg-item img { width: 40px; margin-right: 10px; border-radius: 4px; }
	</style>

	<div class="container">
		<div class="form-card">
			<form action="controladores/guardar_contenido.php" method="POST">
				<input type="hidden" name="tipo" value="serie">
				
				<h1 class="form-title">Nueva Serie</h1>
				
				<div id="preview_container" style="text-align:center; display:none; margin-bottom:20px;">
					<img id="preview_img" src="" style="width:120px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
				</div>
				<input type="hidden" name="imagen_url" id="imagen_input">

				<div class="input-group">
					<input type="text" name="nombre" id="titulo_input" placeholder="Buscar serie TV..." autocomplete="off" required />
					<i class="fa-solid fa-tv"></i>
					<div id="suggestions" class="suggestions-box"></div>
				</div>

				<div class="input-group">
					<input type="text" name="comentario" placeholder="Comentario o reseña breve" />
					<i class="fa-solid fa-comment"></i>
				</div>

				<div class="input-group">
					<select name="prioridad" required>
						<option value="" disabled>Selecciona Prioridad</option>
						<option value="Alta">Alta</option>
						<option value="Media" selected>Media</option>
						<option value="Baja">Baja</option>
					</select>
					<i class="fa-solid fa-layer-group"></i>
				</div>

				<div class="input-group">
					<select name="estado" required>
						<option value="Por_ver" selected>Por ver</option>
						<option value="Viendo">Viendo</option>
						<option value="Vistas">Vista</option>
					</select>
					<i class="fa-solid fa-eye"></i>
				</div>

				<button type="submit">Guardar Serie</button>
				
				<div style="text-align:center; margin-top:15px;">
					<a href="series.php" style="color: #666; text-decoration:none; font-size:0.9rem;">
						Cancelar
					</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		// API TMDB - Lógica de búsqueda (SERIES)
		const API_KEY = '3fd2be6f0c70a2a598f084ddfb75487c'; 
		const tituloInput = document.getElementById('titulo_input');
		const suggestionsBox = document.getElementById('suggestions');
		const imagenInput = document.getElementById('imagen_input');
		const previewContainer = document.getElementById('preview_container');
		const previewImg = document.getElementById('preview_img');

		if (tituloInput) {
			tituloInput.addEventListener('input', async function() {
				const query = this.value.trim();
				if (query.length < 3) { suggestionsBox.style.display = 'none'; return; }

				try {
					// endpoint: search/tv
					const res = await fetch(`https://api.themoviedb.org/3/search/tv?api_key=${API_KEY}&language=es-ES&query=${query}`);
					const data = await res.json();
					suggestionsBox.innerHTML = '';

					if (data.results && data.results.length > 0) {
						suggestionsBox.style.display = 'block';
						data.results.slice(0, 5).forEach(serie => {
							const div = document.createElement('div');
							div.className = 'sugg-item';
							
							// Para series es 'name' y 'first_air_date'
							const title = serie.name;
							const year = serie.first_air_date ? serie.first_air_date.split('-')[0] : '';
							const poster = serie.poster_path ? `https://image.tmdb.org/t/p/w92${serie.poster_path}` : '';
							const fullPoster = serie.poster_path ? `https://image.tmdb.org/t/p/w500${serie.poster_path}` : '';

							div.innerHTML = `<img src="${poster}" alt="img"><div><strong>${title}</strong> <small>(${year})</small></div>`;

							div.addEventListener('click', () => {
								tituloInput.value = title;
								imagenInput.value = fullPoster; 
								if(fullPoster) {
									previewImg.src = fullPoster;
									previewContainer.style.display = 'block';
								}
								suggestionsBox.style.display = 'none';
							});
							suggestionsBox.appendChild(div);
						});
					} else { suggestionsBox.style.display = 'none'; }
				} catch (e) { console.error(e); }
			});
		}
	</script>

<?php include "inc/piedepagina.php" ?>

```

### File: ./front/inc/cabecera.php
```
<!doctype html>
<html lang="es">
    <head>
        <title>AdminViews</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="img/adminviews_favicon.png">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
        	<img src="img/adminviews.png" class="logo-admin" alt="Logo AdminViews">
        	
        	<nav class="navegacion-header">
				<a href="exito.php">Inicio</a>
				<a href="series.php">Series</a>
				<a href="peliculas.php">Películas</a>
			</nav>
        	
	        <a href="exito.php" class="btn-inicio"><img src="img/iconovuelta.png" alt="Volver al Inicio" title="Inicio"></a> 
        </header>
        <main>

```

### File: ./front/inc/db.php
```
<?php
/**
 * -----------------------------------------------------------------------------
 * ARCHIVO DE CONEXIÓN A BASE DE DATOS
 * -----------------------------------------------------------------------------
 * Este archivo establece la comunicación entre PHP y MySQL.
 * Se incluye en todos los archivos que necesiten leer o guardar datos.
 */

$host = "localhost";        // Servidor (suele ser localhost en XAMPP)
$user = "AdminViews";       // Usuario de la BD
$pass = "AdminViews123$";   // Contraseña del usuario
$db   = "AdminViews";       // Nombre exacto de la base de datos

// Paso 1: Intentar conectar
$conexion = new mysqli($host, $user, $pass, $db);

// Paso 2: Verificar si hubo error
if ($conexion->connect_error) {
    die("Error crítico de conexión: " . $conexion->connect_error);
}

// (Opcional) Forzar codificación UTF-8 para evitar problemas con tildes y ñ
$conexion->set_charset("utf8");
?>

```

### File: ./front/inc/piedepagina.php
```
   		</main>
		<footer>
			<div class="footer-content">
				<p>&copy; 2025 | Valentín De Gennaro - Daniel Oliveira Vidal</p>
			</div>
		</footer>
	</body>
</html>

```

### File: ./front/index.php
```
<?php
/**
 * 
 * PÁGINA DE ATERRIZAJE (LOGIN / REGISTRO)
 * 
 * Propósito: 
 * 1. Mostrar formuarios de acceso y creación de cuenta.
 * 2. Gestionar la persistencia de datos (Sticky Form) si falla el registro.
 */
session_start(); 

// Recuperamos errores y datos previos si existen en la sesión (vienen de registro_procesa.php)
// Esto permite que si te equivocas, no tengas que volver a escribir todo el formulario.
$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
$datos = isset($_SESSION['datos_viejos']) ? $_SESSION['datos_viejos'] : [];

// Limpiamos la sesión: Si recargas la página (F5), los errores desaparecen.
unset($_SESSION['errores']);
unset($_SESSION['datos_viejos']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="AdminViews - Tracker de series y peliculas">
	<meta name="keywords" content="Peliculas, Series, Seguimiento, Tracker, series y peliculas">
	<meta name="author" content="Valentin de Gennaro, Daniel Oliveira Vidal">
	<meta property="og:title" content="AdminViews - Tracker de series y peliculas">
	<meta property="og:description" content="AdminViews - Tracker de series y peliculas">
	<link rel="icon" type="image/png" href="img/adminviews_favicon.png">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	<title>AdminViews - Acceso</title>
</head>

<body class="login-page">
	
	<div class="container" id="container">
		
		<div class="form-container sign-up-container">
			<form action="controladores/registro_procesa.php" method="POST">
				<h1>Crear Cuenta</h1>
				
				<div class="input-group">
					<input type="text" name="nombrecompleto" placeholder="Nombre Completo" 
						value="<?php echo isset($datos['nombrecompleto']) ? htmlspecialchars($datos['nombrecompleto']) : ''; ?>" 
						required />
					<i class="fa-solid fa-user"></i>
				</div>

				<div class="input-group">
					<input type="email" name="email" placeholder="Email" required
						value="<?php echo isset($datos['email']) ? htmlspecialchars($datos['email']) : ''; ?>"
						/* Feedback visual: Borde rojo si hay error específico en email */
						style="<?php echo isset($errores['email']) ? 'border: 2px solid red;' : ''; ?>"
					/>
					<i class="fa-solid fa-envelope"></i>
				</div>
				<?php if(isset($errores['email'])): ?>
					<small style="color:red; font-size: 0.7em;"><?php echo $errores['email']; ?></small>
				<?php endif; ?>

				<div class="input-group">
					<input type="text" name="usuario" placeholder="Usuario" 
						value="<?php echo isset($datos['usuario']) ? htmlspecialchars($datos['usuario']) : ''; ?>"
						style="<?php echo isset($errores['usuario']) ? 'border: 2px solid red;' : ''; ?>"
						required />
					<i class="fa-solid fa-user-tag"></i>
				</div>
				<?php if(isset($errores['usuario'])): ?>
					<small style="color:red; font-size: 0.7em;"><?php echo $errores['usuario']; ?></small>
				<?php endif; ?>

				<div class="input-group">
					<input type="password" name="contrasena" placeholder="Contraseña" required
						style="<?php echo isset($errores['pass']) ? 'border: 2px solid red;' : ''; ?>"
					/>
					<i class="fa-solid fa-lock"></i>
				</div>
				<?php if(isset($errores['pass'])): ?>
					<small style="color:red; font-size: 0.7em;"><?php echo $errores['pass']; ?></small>
				<?php endif; ?>

				<button type="submit">Registrarse</button>
			</form>
		</div>

		<div class="form-container sign-in-container">
			<form action="controladores/login_procesa.php" method="POST">
				<h1>Iniciar Sesión</h1>
				
				<div class="input-group">
					<input type="text" name="usuario" placeholder="Usuario" required />
					<i class="fa-solid fa-user"></i>
				</div>

				<div class="input-group">
					<input type="password" name="contrasena" placeholder="Contraseña" required
						<?php if(isset($_GET['error'])) echo 'style="border: 2px solid red;"'; ?>
					/>
					<i class="fa-solid fa-lock"></i>
				</div>
				
				<?php
					if (isset($_GET['error'])) {
						echo "<p style='color: red; font-size: 0.8em; margin-top:5px;'>Usuario o contraseña incorrectos</p>";
					}
				?>
				<button type="submit">Iniciar Sesión</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>¡Hola, Bienvenido!</h1>
					<p>Introduce tus datos personales y comienza tu experiencia con nosotros.</p>
					<button class="ghost" id="signIn">Iniciar Sesión</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>¡Bienvenido de nuevo!</h1>
					<p>Para mantenerte conectado con nosotros, por favor inicia sesión con tus datos.</p>
					<button class="ghost" id="signUp">Registrarse</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		// Referencias al DOM
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		// 1. Evento para mostrar panel de Registro
		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		// 2. Evento para mostrar panel de Login
		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});

		/**
		 * LÓGICA MIXTA PHP/JS:
		 * Si PHP detecta que hubo errores en el registro ($errores no está vacío),
		 * inyectamos JS para activar el panel de registro automáticamente.
		 * Esto evita que el usuario tenga que volver a hacer clic en "Registrarse"
		 * para ver sus errores.
		 */
		<?php if (!empty($errores)): ?>
			container.classList.add("right-panel-active");
		<?php endif; ?>
	</script>
</body>
</html>

```

### File: ./front/intruso.php
```
<?php
// Capturamos la dirección IP del cliente
$ip_intruso = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESO DENEGADO</title>
    <style>
        body {
            background-color: #000;
            color: #ff0000;
            font-family: 'Courier New', Courier, monospace;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }

        .alerta {
            font-size: 5rem;
            font-weight: bold;
            text-transform: uppercase;
            animation: parpadeo 0.2s infinite alternate; /* Más rápido para más estrés */
        }

        .mensaje {
            font-size: 1.5rem;
            margin-top: 20px;
        }

        .ip-display {
            font-size: 2.5rem;
            color: #fff;
            background-color: #ff0000;
            padding: 10px 20px;
            margin-top: 20px;
            border: 2px solid white;
        }

        .icono {
            font-size: 8rem;
            margin-bottom: 20px;
        }

        @keyframes parpadeo {
            from { opacity: 1; text-shadow: 0 0 10px red; }
            to { opacity: 0.5; text-shadow: 0 0 30px darkred; transform: scale(1.02); }
        }
    </style>
</head>
<body>

    <div class="icono">🚫</div>
    <div class="alerta">¡SOS UN INTRUSO!</div>
    
    <div class="mensaje">HEMOS RASTREADO TU UBICACIÓN</div>
    
    <div class="ip-display">IP: <?php echo $ip_intruso; ?></div>

</body>
</html>

```

### File: ./front/peliculas.php
```
<?php
	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: SESIÓN Y CONFIGURACIÓN
	 * -------------------------------------------------------------------------
	 */
	session_start();

	// Seguridad: Si no hay usuario, fuera.
	if (!isset($_SESSION['usuario'])) {
		header("Location: intruso.php");
		exit;
	}

	require_once 'inc/db.php'; 

	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: LÓGICA DE BACKEND (POST)
	 * -------------------------------------------------------------------------
	 */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$accion = $_POST['accion'] ?? ''; // Leer acción del formulario
		$id = (int)($_POST['id'] ?? 0);
		$usuario_id = $_SESSION['id_usuario'] ?? 1; 

		// 1. MOVER A VISTAS
		if ($accion === 'mover') {
			$fecha = $_POST['fecha'];
			$rating = $_POST['rating']; 
			$stmt = $conexion->prepare("UPDATE contenido SET estado='Vistas', fecha_visualizacion=?, puntuacion=? WHERE id=?");
			$stmt->bind_param("ssi", $fecha, $rating, $id);
			$stmt->execute(); $stmt->close();

		// 2. BORRAR
		} elseif ($accion === 'borrar') {
			$stmt = $conexion->prepare("DELETE FROM contenido WHERE id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute(); $stmt->close();

		// 3. AGREGAR PELÍCULA
		} elseif ($accion === 'agregar') {
			$titulo = $_POST['nombre'];
			$comentario = $_POST['comentario'] ?? '';
			$prioridad = $_POST['prioridad'] ?? 'Media';
			$estado = $_POST['estado'] ?? 'Por_ver';
			$img_url = $_POST['imagen_url'] ?? ''; 
			$tipo = 'pelicula'; // CLAVE: Diferenciamos de 'serie'

			$sql = "INSERT INTO contenido (usuario_id, titulo, comentario, estado, tipo, nivel_prioridad, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conexion->prepare($sql);
			$stmt->bind_param("issssss", $usuario_id, $titulo, $comentario, $estado, $tipo, $prioridad, $img_url);
			$stmt->execute(); $stmt->close();
		}
		
		// Evitar reenvío de formulario
		header("Location: peliculas.php");
		exit;
	}

	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: LÓGICA DE ORDENAMIENTO (GET)
	 * -------------------------------------------------------------------------
	 */
	// Capturamos la opción de orden del desplegable (por defecto fecha)
	$orden = $_GET['orden'] ?? 'fecha';
	$sql_order = "ORDER BY id DESC"; // Default: Más recientes primero

	if ($orden === 'alfa') {
		$sql_order = "ORDER BY titulo ASC";
	} elseif ($orden === 'prioridad') {
		// Orden personalizado: Alta -> Media -> Baja
		$sql_order = "ORDER BY FIELD(nivel_prioridad, 'Alta', 'Media', 'Baja')";
	}

	// Consulta final con el orden aplicado Y FILTRO DE USUARIO
	$usuario_id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM contenido WHERE tipo = 'pelicula' AND usuario_id = ? $sql_order";
	
	$stmt = $conexion->prepare($sql);
	$stmt->bind_param("i", $usuario_id);
	$stmt->execute();
	$result = $stmt->get_result();

	$peliculas = [];
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$peliculas[] = $row;
		}
	}
?>
<?php include "inc/cabecera.php" ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<style>
		/* --- LAYOUT GENERAL --- */
		.dashboard-container {
			display: grid; 
			grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
			gap: 30px; 
			padding: 20px; 
			max-width: 1600px; 
			margin: 0 auto;
		}


		/* --- ENCABEZADOS DE COLUMNA (Ahora ambos naranjas) --- */
		.columna-header {
			padding: 15px; 
			border-radius: 10px 10px 0 0; 
			color: white;
			font-weight: 800; 
			text-align: center; 
			text-transform: uppercase;
			letter-spacing: 1px;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1);
			/* Mismo degradado naranja para ambos */
			background: linear-gradient(to right, #FF7F50, #FF6347); 
		}

		/* Cuerpo blanco de las columnas */
		.columna-body {
			background: #fff; 
			border: 1px solid #eee; 
			border-top: none;
			border-radius: 0 0 10px 10px; 
			padding: 20px; 
			min-height: 450px; /* Altura mínima para que se vea bien */
			box-shadow: 0 10px 30px rgba(0,0,0,0.05);
			
						
			/* SCROLL: */
			height: 50vh;       /* Ocupa el 70% del alto de la pantalla */
			overflow-y: auto;   /* Activa el scroll vertical si hay muchas series */
			
		}


		/* --- TARJETA DE PELÍCULA --- */
		.card-peli {
			display: flex; 
			align-items: center;
			background: #fff; 
			border-radius: 12px; 
			padding: 10px;
			margin-bottom: 15px; 
			box-shadow: 0 4px 15px rgba(0,0,0,0.05);
			border: 1px solid #f0f0f0;
			border-left: 5px solid var(--primary); /* Borde lateral naranja */
			transition: transform 0.2s, box-shadow 0.2s;
		}
		.card-peli:hover { 
			transform: translateY(-3px); 
			box-shadow: 0 8px 25px rgba(0,0,0,0.1); 
		}

		.card-img {
			width: 60px; height: 90px; 
			object-fit: cover; 
			border-radius: 6px;
			background-color: #eee; 
			flex-shrink: 0;
			box-shadow: 0 2px 5px rgba(0,0,0,0.2);
		}

		.card-info { 
			flex-grow: 1; 
			padding-left: 20px; 
			display: flex; 
			flex-direction: column; 
			justify-content: center; 
		}
		
		.card-info h4 { margin: 0 0 5px; font-size: 1.1rem; color: #333; font-weight: 700; }
		.card-info small { color: #888; font-size: 0.85rem; margin-bottom: 5px; display: block; }
		
		.badge-prioridad {
			font-size: 0.75rem; 
			padding: 4px 10px; 
			border-radius: 20px;
			background: #f3f3f3; 
			color: #666; 
			font-weight: 600;
			width: fit-content;
		}

		/* --- BOTONES DE ACCIÓN (Estilo imagen) --- */
		.card-actions { 
			display: flex; 
			gap: 10px; 
			padding-left: 15px; 
		}

		/* Clase base para botones cuadrados */
		.btn-cuadrado {
			width: 40px; 
			height: 40px; 
			border-radius: 8px;
			border: none;
			display: flex; 
			align-items: center; 
			justify-content: center;
			color: white; 
			font-size: 1.1rem;
			cursor: pointer;
			transition: filter 0.2s, transform 0.1s;
			margin: 0; /* Override del global button */
			box-shadow: 0 4px 6px rgba(0,0,0,0.1);
		}
		.btn-cuadrado:hover { filter: brightness(1.1); }
		.btn-cuadrado:active { transform: scale(0.95); }

		/* Colores específicos */
		.btn-check { 
			background: #2ecc71; /* Verde */
			background: linear-gradient(to bottom right, #2ecc71, #27ae60);
		}
		.btn-trash { 
			background: #e74c3c; /* Rojo */
			background: linear-gradient(to bottom right, #e74c3c, #c0392b);
		}

		/* Estrellas amarillas */
		.estrellas { color: #FFD700; font-size: 0.9rem; margin-top: 5px;}

		/* --- BARRA SUPERIOR Y ORDENAR --- */
		.top-bar {
			display: flex; 
			justify-content: space-between; 
			align-items: center;
			padding: 20px 40px; 
			background: #fff; 
			box-shadow: 0 2px 10px rgba(0,0,0,0.05);
			margin-bottom: 20px;
		}

		.controles-derecha {
			display: flex;
			gap: 15px;
			align-items: center;
		}

		/* Select de ordenar personalizado */
		.select-orden {
			padding: 10px 15px;
			border-radius: 20px;
			border: 1px solid #ddd;
			background: #fff;
			font-family: 'Inter', sans-serif;
			color: #555;
			cursor: pointer;
			outline: none;
		}

		/* --- SUGERENCIAS API y MODALES (Igual que antes) --- */
		.suggestions-box {
			position: absolute; top: 100%; left: 0; width: 100%;
			background: #fff; border: 1px solid #ddd; border-top: none;
			z-index: 1001; max-height: 200px; overflow-y: auto;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 0 0 8px 8px; display: none;
		}
		.sugg-item { padding: 10px; display: flex; align-items: center; cursor: pointer; border-bottom: 1px solid #eee; }
		.sugg-item:hover { background-color: #f9f9f9; }
		.sugg-item img { width: 40px; margin-right: 10px; border-radius: 4px; }
		
		.modal-fondo {
			display: none; position: fixed; z-index: 2000; left: 0; top: 0;
			width: 100%; height: 100%; overflow: auto;
			background-color: rgba(0,0,0,0.6); backdrop-filter: blur(3px);
			align-items: center; justify-content: center;
		}
		.modal-contenido {
			background-color: #fff; border-radius: 10px; padding: 30px;
			width: 90%; max-width: 500px; position: relative;
			box-shadow: 0 10px 25px rgba(0,0,0,0.2); animation: bajar 0.3s ease;
		}
		@keyframes bajar { from {transform: translateY(-20px); opacity: 0;} to {transform: translateY(0); opacity: 1;} }
		
		.rating-group { display: flex; flex-direction: row-reverse; justify-content: center; margin: 15px 0; }
		.rating-group input { display: none; }
		.rating-group label { font-size: 30px; color: #ddd; cursor: pointer; transition: 0.2s; }
		.rating-group input:checked ~ label, .rating-group label:hover, .rating-group label:hover ~ label { color: #FFD700; }
	</style>

	<div class="top-bar">
		<div style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">
			<i class="fa-solid fa-clapperboard"></i> Mis Películas
		</div>
		<!-- ORDEN DE PELICULAS -->
		<div class="controles-derecha">
			<form method="GET" style="background:none; padding:0; height:auto; display:block;">
				<select name="orden" class="select-orden" onchange="this.form.submit()">
					<option value="fecha" <?= $orden == 'fecha' ? 'selected' : '' ?>>📅 Fecha (Nuevo)</option>
					<option value="alfa" <?= $orden == 'alfa' ? 'selected' : '' ?>>🔤 Alfabético (A-Z)</option>
					<option value="prioridad" <?= $orden == 'prioridad' ? 'selected' : '' ?>>🔥 Prioridad</option>
				</select>
			</form>
		<!-- AÑADIR PELICULAS -->
			<a href="formulario_pelicula.php" class="btn-agregar-diseno" style="margin: 0; text-decoration:none;">
				<span class="plus-icon"><i class="fa-solid fa-plus"></i></span> Nueva Película
			</a>
		</div>
	</div>

	<div class="dashboard-container">
		<!-- TARJETA POR VER -->
		<div>
			<div class="columna-header">Por Ver</div>
			<div class="columna-body">
				<?php foreach ($peliculas as $p): ?>
					<?php if ($p['estado'] == 'Por_ver'): ?>
					
					<div class="card-peli">
						<img src="<?= !empty($p['imagen_url']) ? htmlspecialchars($p['imagen_url']) : 'https://via.placeholder.com/60x90?text=Cine' ?>" 
							 class="card-img" alt="cover">
						
						<div class="card-info">
							<h4><?= htmlspecialchars($p['titulo']) ?></h4>
							<small><?= htmlspecialchars($p['comentario']) ?></small>
							<span class="badge-prioridad">Prioridad: <?= htmlspecialchars($p['nivel_prioridad'] ?? 'Media') ?></span>
						</div>
						
						<div class="card-actions">
							<button class="btn-cuadrado btn-check" onclick="abrirModalCalificar(<?= $p['id'] ?>)">
								<i class="fa-solid fa-check"></i>
							</button>
							
							<form method="POST" onsubmit="return confirm('¿Seguro que quieres borrarla?');" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="borrar">
								<input type="hidden" name="id" value="<?= $p['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-trash">
									<i class="fa-solid fa-trash"></i>
								</button>
							</form>
						</div>
					</div>

					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- TARJETA VISTAS -->
		<div>
			<div class="columna-header">Vistas</div>
			<div class="columna-body">
				<?php foreach ($peliculas as $p): ?>
					<?php if ($p['estado'] == 'Vistas'): ?>
					
					<div class="card-peli" style="opacity: 0.9;">
						<img src="<?= !empty($p['imagen_url']) ? htmlspecialchars($p['imagen_url']) : 'https://via.placeholder.com/60x90?text=Cine' ?>" 
							 class="card-img" alt="cover">
						
						<div class="card-info">
							<h4><?= htmlspecialchars($p['titulo']) ?></h4>
							<small>Visto: <?= htmlspecialchars($p['fecha_visualizacion']) ?></small>
							
							<?php $pts = (int)($p['puntuacion'] ?? 0); ?>
							<div class="estrellas">
								<?= str_repeat('<i class="fa-solid fa-star"></i>', $pts) ?>
								<?= str_repeat('<i class="fa-regular fa-star"></i>', 5 - $pts) ?>
							</div>
						</div>
						
						<div class="card-actions">
							<form method="POST" onsubmit="return confirm('¿Eliminar del historial?');" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="borrar">
								<input type="hidden" name="id" value="<?= $p['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-trash">
									<i class="fa-solid fa-trash"></i>
								</button>
							</form>
						</div>
					</div>

					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

	</div>

	<div id="modalAgregar" class="modal-fondo">
		<div class="modal-contenido">
			<span class="cerrar-modal" onclick="document.getElementById('modalAgregar').style.display='none'" 
				  style="position:absolute; right:20px; top:15px; cursor:pointer; font-size:1.5rem;">&times;</span>
			
			<form action="" method="POST">
				<input type="hidden" name="accion" value="agregar">
				<h2 style="text-align:center; color:var(--primary); margin-bottom:20px;">Nueva Película</h2>

				<div id="preview_container" style="text-align:center; display:none; margin-bottom:15px;">
					<img id="preview_img" src="" style="width:100px; border-radius:5px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
				</div>
				<input type="hidden" name="imagen_url" id="imagen_input">

				<div class="input-group">
					<input type="text" name="nombre" id="titulo_input" placeholder="Buscar título..." autocomplete="off" required />
					<i class="fa-solid fa-magnifying-glass"></i>
					<div id="suggestions" class="suggestions-box"></div>
				</div>

				<div class="input-group">
					<input type="text" name="comentario" placeholder="Comentario breve" />
					<i class="fa-solid fa-comment"></i>
				</div>

				<div class="input-group">
					<select name="prioridad">
						<option value="Alta">Prioridad Alta</option>
						<option value="Media" selected>Prioridad Media</option>
						<option value="Baja">Prioridad Baja</option>
					</select>
					<i class="fa-solid fa-layer-group"></i>
				</div>

				<button type="submit" style="width:100%; margin-top:10px;">Guardar</button>
			</form>
		</div>
	</div>

	<div id="modalCalificar" class="modal-fondo">
		<div class="modal-contenido" style="text-align: center; border-radius: 15px; padding: 40px; border-top: 6px solid #FF4500;">
			<h2 style="color: #FF4500; font-weight: 800; margin-top: 0; margin-bottom: 5px; font-size: 1.8rem;">
				<i class="fa-solid fa-award"></i> ¿Ya la viste?
			</h2>
			<p style="color: #666; margin-bottom: 25px; font-size: 0.95rem;">
				¡Genial! Regístralo en tu historial.
			</p>
			
			<form method="POST">
				<input type="hidden" name="accion" value="mover">
				<input type="hidden" name="id" id="idPeliCalificar">

				<div class="input-group" style="text-align: left;">
					<label style="display:block; font-size:0.8rem; font-weight:bold; color:#333; margin-bottom:5px;">Fecha de visualización:</label>
					<input type="date" name="fecha" required value="<?php echo date('Y-m-d'); ?>" 
						   style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-family: inherit;">
				</div>

				<div style="margin: 20px 0;">
					<label style="display:block; font-size:0.8rem; font-weight:bold; color:#333; margin-bottom:5px;">Tu Valoración:</label>
					<div class="rating-group" style="margin: 0; justify-content: center; gap: 5px;">
						<input type="radio" name="rating" value="5" id="r5"><label for="r5" title="¡Obra maestra!">★</label>
						<input type="radio" name="rating" value="4" id="r4"><label for="r4" title="Muy buena">★</label>
						<input type="radio" name="rating" value="3" id="r3"><label for="r3" title="Buena">★</label>
						<input type="radio" name="rating" value="2" id="r2"><label for="r2" title="Regular">★</label>
						<input type="radio" name="rating" value="1" id="r1"><label for="r1" title="Mala">★</label>
					</div>
				</div>

				<div style="display:flex; gap:15px; justify-content:center; margin-top: 10px;">
					<button type="submit" style="flex: 1; border-radius: 50px; background: linear-gradient(to right, #ff4e00, #ff7f50); box-shadow: 0 4px 6px rgba(255, 69, 0, 0.2);">
						Guardar
					</button>
					<button type="button" onclick="document.getElementById('modalCalificar').style.display='none'" 
							style="flex: 1; background: #f0f0f0; color: #555; border: 1px solid #ccc; border-radius: 50px; padding: 12px; font-weight: bold; cursor: pointer;">
						Cancelar
					</button>
				</div>
			</form>
		</div>
	</div>

	<script>
		// MODAL CALIFICAR
		const modalCalificar = document.getElementById('modalCalificar');
		
		function abrirModalCalificar(id) {
			document.getElementById('idPeliCalificar').value = id;
			modalCalificar.style.display = 'flex';
		}

		window.onclick = function(event) {
			if (event.target == modalCalificar) modalCalificar.style.display = "none";
		}
	</script>

<?php include "inc/piedepagina.php" ?>




```

### File: ./front/series.php
```

<?php
	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: SESIÓN Y CONFIGURACIÓN
	 * -------------------------------------------------------------------------
	 */
	session_start();

	// --- 1. SEGURIDAD: CONTROL DE SESIÓN ---
	if (!isset($_SESSION['usuario'])) {
		header("Location: intruso.php"); // Si no es usuario, fuera.
		exit;
	}

	require_once 'inc/db.php'; 

	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: BACKEND (ACCIONES)
	 * -------------------------------------------------------------------------
	 */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$accion = $_POST['accion'] ?? ''; // Qué botón pulsó el usuario
		$id = (int)($_POST['id'] ?? 0);   // ID de la serie afectada
		$usuario_id = $_SESSION['id_usuario'] ?? 1; 

		// 1. EMPEZAR A VER (Mover de 'Por_ver' -> 'Viendo')
		if ($accion === 'empezar') {
			// Simplemente cambiamos el estado, sin pedir nota ni fecha aún
			$stmt = $conexion->prepare("UPDATE contenido SET estado='Viendo' WHERE id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute(); $stmt->close();

		// 2. TERMINAR SERIE (Mover de 'Viendo' -> 'Vistas')
		} elseif ($accion === 'terminar') {
			$fecha = $_POST['fecha'];
			$rating = $_POST['rating']; 
			// Aquí guardamos la fecha en que la terminaste y tu nota final
			$stmt = $conexion->prepare("UPDATE contenido SET estado='Vistas', fecha_visualizacion=?, puntuacion=? WHERE id=?");
			$stmt->bind_param("ssi", $fecha, $rating, $id);
			$stmt->execute(); $stmt->close();

		// 3. BORRAR
		} elseif ($accion === 'borrar') {
			$stmt = $conexion->prepare("DELETE FROM contenido WHERE id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute(); $stmt->close();

		// 4. AGREGAR NUEVA SERIE
		} elseif ($accion === 'agregar') {
			$titulo = $_POST['nombre'];
			$comentario = $_POST['comentario'] ?? '';
			$prioridad = $_POST['prioridad'] ?? 'Media';
			$estado = $_POST['estado'] ?? 'Por_ver';
			$img_url = $_POST['imagen_url'] ?? ''; 
			
			// Forzamos "tipo = serie" para diferenciarlo en la tabla única
			$tipo = 'serie';

			$sql = "INSERT INTO contenido (usuario_id, titulo, comentario, estado, tipo, nivel_prioridad, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conexion->prepare($sql);
			$stmt->bind_param("issssss", $usuario_id, $titulo, $comentario, $estado, $tipo, $prioridad, $img_url);
			$stmt->execute(); $stmt->close();
		}
		
		header("Location: series.php");
		exit;
	}

	/**
	 * -------------------------------------------------------------------------
	 * BLOQUE PHP: ORDENAMIENTO Y CONSULTA
	 * -------------------------------------------------------------------------
	 */
	$orden = $_GET['orden'] ?? 'fecha';
	$sql_order = "ORDER BY id DESC"; // Default

	if ($orden === 'alfa') {
		$sql_order = "ORDER BY titulo ASC";
	} elseif ($orden === 'prioridad') {
		$sql_order = "ORDER BY FIELD(nivel_prioridad, 'Alta', 'Media', 'Baja')";
	}

	// FILTRAR SOLO SERIES (tipo = 'serie') DEL USUARIO ACTUAL
	$usuario_id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM contenido WHERE tipo = 'serie' AND usuario_id = ? $sql_order";
	
	$stmt = $conexion->prepare($sql);
	$stmt->bind_param("i", $usuario_id);
	$stmt->execute();
	$result = $stmt->get_result();

	$series = [];
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$series[] = $row;
		}
	}
?>

<?php include "inc/cabecera.php" ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<style>
		/* Estilos base (reutilizados de peliculas) */
		.dashboard-container {
			display: grid; 
			/* Ajuste para 3 columnas responsivas */
			grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
			gap: 20px; 
			padding: 20px; 
			max-width: 1600px; 
			margin: 0 auto;
		}

		.columna-header {
			padding: 15px; border-radius: 10px 10px 0 0; color: white;
			font-weight: 800; text-align: center; text-transform: uppercase;
			letter-spacing: 1px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);
		}

		/* COLORES DE COLUMNAS (Gradiente progresivo) */
		.header-por-ver { background: linear-gradient(to right, #FF7F50, #FF6347); }
		.header-viendo { background: linear-gradient(to right, #FF7F50, #FF6347); }
		.header-vistas { background: linear-gradient(to right, #FF7F50, #FF6347); } 

		.columna-body {
			background: #fff; 
			border: 1px solid #eee; 
			border-top: none;
			border-radius: 0 0 10px 10px; 
			padding: 15px; 
			
			/* SCROLL: */
			height: 50vh;       /* Ocupa el 70% del alto de la pantalla */
			overflow-y: auto;   /* Activa el scroll vertical si hay muchas series */
			
			box-shadow: 0 10px 30px rgba(0,0,0,0.05);
		}

		.card-peli {
			display: flex; align-items: center; background: #fff; border-radius: 12px; 
			padding: 10px; margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
			border: 1px solid #f0f0f0; border-left: 5px solid var(--primary);
			transition: transform 0.2s, box-shadow 0.2s;
		}
		.card-peli:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }

		.card-img { width: 50px; height: 75px; object-fit: cover; border-radius: 6px; background-color: #eee; flex-shrink: 0; }
		.card-info { flex-grow: 1; padding-left: 15px; display: flex; flex-direction: column; justify-content: center; }
		.card-info h4 { margin: 0 0 3px; font-size: 1rem; color: #333; font-weight: 700; }
		.card-info small { color: #888; font-size: 0.8rem; margin-bottom: 3px; display: block; }
		
		.badge-prioridad { font-size: 0.7rem; padding: 2px 8px; border-radius: 20px; background: #f3f3f3; color: #666; font-weight: 600; width: fit-content; }

		.card-actions { display: flex; gap: 8px; padding-left: 10px; }
		
		.btn-cuadrado {
			width: 35px; height: 35px; border-radius: 8px; border: none;
			display: flex; align-items: center; justify-content: center;
			color: white; font-size: 1rem; cursor: pointer;
			transition: filter 0.2s, transform 0.1s; margin: 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1);
		}
		.btn-cuadrado:hover { filter: brightness(1.1); }
		.btn-cuadrado:active { transform: scale(0.95); }
		
		.btn-check { background: linear-gradient(to bottom right, #2ecc71, #27ae60); }
		.btn-play { background: linear-gradient(to bottom right, #f39c12, #d35400); } /* Icono Play para empezar */
		.btn-trash { background: linear-gradient(to bottom right, #e74c3c, #c0392b); }

		.estrellas { color: #FFD700; font-size: 0.8rem; margin-top: 3px;}

		.top-bar { display: flex; justify-content: space-between; align-items: center; padding: 20px 40px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px; }
		.controles-derecha { display: flex; gap: 15px; align-items: center; }
		.select-orden { padding: 10px 15px; border-radius: 20px; border: 1px solid #ddd; background: #fff; font-family: 'Inter', sans-serif; color: #555; cursor: pointer; outline: none; }

		/* Sugerencias y Modales */
		.suggestions-box { position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ddd; border-top: none; z-index: 1001; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 0 0 8px 8px; display: none; }
		.sugg-item { padding: 10px; display: flex; align-items: center; cursor: pointer; border-bottom: 1px solid #eee; }
		.sugg-item:hover { background-color: #f9f9f9; }
		.sugg-item img { width: 40px; margin-right: 10px; border-radius: 4px; }
		
		.modal-fondo { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.6); backdrop-filter: blur(3px); align-items: center; justify-content: center; }
		.modal-contenido { background-color: #fff; border-radius: 10px; padding: 30px; width: 90%; max-width: 500px; position: relative; box-shadow: 0 10px 25px rgba(0,0,0,0.2); animation: bajar 0.3s ease; }
		@keyframes bajar { from {transform: translateY(-20px); opacity: 0;} to {transform: translateY(0); opacity: 1;} }
		
		.rating-group { display: flex; flex-direction: row-reverse; justify-content: center; margin: 15px 0; }
		.rating-group input { display: none; }
		.rating-group label { font-size: 30px; color: #ddd; cursor: pointer; transition: 0.2s; }
		.rating-group input:checked ~ label, .rating-group label:hover, .rating-group label:hover ~ label { color: #FFD700; }
		.rating-group label { font-size: 30px; color: #ddd; cursor: pointer; transition: 0.2s; }
		.rating-group input:checked ~ label, .rating-group label:hover, .rating-group label:hover ~ label { color: #FFD700; }
	</style>

	<div class="top-bar">
		<div style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">
			<i class="fa-solid fa-tv"></i> Mis Series
		</div>
		
		<div class="controles-derecha">
			<form method="GET" style="background:none; padding:0; height:auto; display:block;">
				<select name="orden" class="select-orden" onchange="this.form.submit()">
					<option value="fecha" <?= $orden == 'fecha' ? 'selected' : '' ?>>📅 Fecha</option>
					<option value="alfa" <?= $orden == 'alfa' ? 'selected' : '' ?>>🔤 A-Z</option>
					<option value="prioridad" <?= $orden == 'prioridad' ? 'selected' : '' ?>>🔥 Prioridad</option>
				</select>
			</form>
			<a href="formulario_serie.php" class="btn-agregar-diseno" style="margin: 0; text-decoration:none;">
				<span class="plus-icon"><i class="fa-solid fa-plus"></i></span> Nueva Serie
			</a>
		</div>
	</div>

	<div class="dashboard-container">
		
		<div>
			<div class="columna-header header-por-ver">Por Ver</div>
			<div class="columna-body">
				<?php foreach ($series as $s): ?>
					<?php if ($s['estado'] == 'Por_ver'): ?>
					<div class="card-peli">
						<img src="<?= !empty($s['imagen_url']) ? htmlspecialchars($s['imagen_url']) : 'https://via.placeholder.com/60x90?text=TV' ?>" class="card-img">
						<div class="card-info">
							<h4><?= htmlspecialchars($s['titulo']) ?></h4>
							<small><?= htmlspecialchars($s['comentario']) ?></small>
							<span class="badge-prioridad">Prioridad: <?= htmlspecialchars($s['nivel_prioridad'] ?? 'Media') ?></span>
						</div>
						<div class="card-actions">
							<form method="POST" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="empezar">
								<input type="hidden" name="id" value="<?= $s['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-play" title="Empezar a ver">
									<i class="fa-solid fa-play"></i>
								</button>
							</form>
							<form method="POST" onsubmit="return confirm('¿Borrar serie?');" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="borrar">
								<input type="hidden" name="id" value="<?= $s['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-trash"><i class="fa-solid fa-trash"></i></button>
							</form>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

		<div>
			<div class="columna-header header-viendo">Viendo</div>
			<div class="columna-body">
				<?php foreach ($series as $s): ?>
					<?php if ($s['estado'] == 'Viendo'): ?>
					<div class="card-peli" style="border-left-color: #F09819;">
						<img src="<?= !empty($s['imagen_url']) ? htmlspecialchars($s['imagen_url']) : 'https://via.placeholder.com/60x90?text=TV' ?>" class="card-img">
						<div class="card-info">
							<h4><?= htmlspecialchars($s['titulo']) ?></h4>
							<small><?= htmlspecialchars($s['comentario']) ?></small>
							<span class="badge-prioridad" style="background:#fff3cd; color:#856404;">En progreso</span>
						</div>
						<div class="card-actions">
							<button class="btn-cuadrado btn-check" onclick="abrirModalCalificar(<?= $s['id'] ?>)" title="Terminar serie">
								<i class="fa-solid fa-check"></i>
							</button>
							<form method="POST" onsubmit="return confirm('¿Borrar?');" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="borrar">
								<input type="hidden" name="id" value="<?= $s['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-trash"><i class="fa-solid fa-trash"></i></button>
							</form>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

		<div>
			<div class="columna-header header-vistas">Vistas</div>
			<div class="columna-body">
				<?php foreach ($series as $s): ?>
					<?php if ($s['estado'] == 'Vistas'): ?>
					<div class="card-peli" style="opacity: 0.9; border-left-color: #20B2AA;">
						<img src="<?= !empty($s['imagen_url']) ? htmlspecialchars($s['imagen_url']) : 'https://via.placeholder.com/60x90?text=TV' ?>" class="card-img">
						<div class="card-info">
							<h4><?= htmlspecialchars($s['titulo']) ?></h4>
							<small>Terminada: <?= htmlspecialchars($s['fecha_visualizacion']) ?></small>
							<?php $pts = (int)($s['puntuacion'] ?? 0); ?>
							<div class="estrellas">
								<?= str_repeat('<i class="fa-solid fa-star"></i>', $pts) ?>
								<?= str_repeat('<i class="fa-regular fa-star"></i>', 5 - $pts) ?>
							</div>
						</div>
						<div class="card-actions">
							<form method="POST" onsubmit="return confirm('¿Borrar historial?');" style="background:none; padding:0; height:auto;">
								<input type="hidden" name="accion" value="borrar">
								<input type="hidden" name="id" value="<?= $s['id'] ?>">
								<button type="submit" class="btn-cuadrado btn-trash"><i class="fa-solid fa-trash"></i></button>
							</form>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

	</div>



	<div id="modalCalificar" class="modal-fondo">
		<div class="modal-contenido" style="text-align: center; border-radius: 15px; padding: 40px; border-top: 6px solid #FF4500;">
			<h2 style="color: #FF4500; font-weight: 800; margin-top: 0; margin-bottom: 5px; font-size: 1.8rem;">
				<i class="fa-solid fa-flag-checkered"></i> ¡Serie Terminada!
			</h2>
			<p style="color: #666; margin-bottom: 25px; font-size: 0.95rem;">
				Felicidades, otra más a la lista.
			</p>
			
			<form method="POST">
				<input type="hidden" name="accion" value="terminar">
				<input type="hidden" name="id" id="idPeliCalificar">

				<div class="input-group" style="text-align: left;">
					<label style="display:block; font-size:0.8rem; font-weight:bold; color:#333; margin-bottom:5px;">Fecha de finalización:</label>
					<input type="date" name="fecha" required value="<?php echo date('Y-m-d'); ?>" 
						   style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-family: inherit;">
				</div>

				<div style="margin: 20px 0;">
					<label style="display:block; font-size:0.8rem; font-weight:bold; color:#333; margin-bottom:5px;">Nota Final:</label>
					<div class="rating-group" style="margin: 0; justify-content: center; gap: 5px;">
						<input type="radio" name="rating" value="5" id="r5"><label for="r5" title="¡Obra maestra!">★</label>
						<input type="radio" name="rating" value="4" id="r4"><label for="r4" title="Muy buena">★</label>
						<input type="radio" name="rating" value="3" id="r3"><label for="r3" title="Buena">★</label>
						<input type="radio" name="rating" value="2" id="r2"><label for="r2" title="Regular">★</label>
						<input type="radio" name="rating" value="1" id="r1"><label for="r1" title="Mala">★</label>
					</div>
				</div>

				<div style="display:flex; gap:15px; justify-content:center; margin-top: 10px;">
					<button type="submit" style="flex: 1; border-radius: 50px; background: linear-gradient(to right, #ff4e00, #ff7f50); box-shadow: 0 4px 6px rgba(255, 69, 0, 0.2);">
						Guardar
					</button>
					<button type="button" onclick="document.getElementById('modalCalificar').style.display='none'" 
							style="flex: 1; background: #f0f0f0; color: #555; border: 1px solid #ccc; border-radius: 50px; padding: 12px; font-weight: bold; cursor: pointer;">
						Cancelar
					</button>
				</div>
			</form>
		</div>
	</div>

	<script>
		// MODAL CALIFICAR
		const modalCalificar = document.getElementById('modalCalificar');
		
		function abrirModalCalificar(id) {
			document.getElementById('idPeliCalificar').value = id;
			modalCalificar.style.display = 'flex';
		}

		window.onclick = function(event) {
			if (event.target == modalCalificar) modalCalificar.style.display = "none";
		}
	</script>
<?php include "inc/piedepagina.php" ?>

```

### File: ./front/style/style.css
```
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');

/* =========================================
   1. RESETEO Y VARIABLES
   ========================================= */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

:root {
    --primary: #FF7F50;
    --gradiente: linear-gradient(to right, rgb(255, 69, 0), rgb(255, 127, 80));
}

body {
    background-image: linear-gradient(to right, rgb(250, 235, 215), rgb(255, 250, 240));
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Inter', sans-serif;
    height: 100vh;
}

/* =========================================
   2. TIPOGRAFÍA Y ELEMENTOS GENERALES
   ========================================= */
h1 {
    font-weight: 800;
    margin: 0 0 1rem 0;
    color: var(--primary);
}

h2 { text-align: center; }

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
}

span {
    font-size: 12px;
    margin-bottom: 15px;
    display: block;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

/* =========================================
   3. BOTONES
   ========================================= */
button {
    border-radius: 20px;
    border: 1px solid var(--primary);
    background: var(--gradiente);
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in, box-shadow 0.3s ease;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(235, 125, 36, 0.3);
    margin-top: 1rem;
}

button:active { transform: scale(0.95); }
button:focus { outline: none; }
button:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
    background: var(--gradiente);
}

/* Botón transparente (Ghost) para el panel de color */
button.ghost {
    background: transparent;
    border-color: #FFFFFF;
    box-shadow: none;
}

button.ghost:hover {
    background: #FFFFFF;
    color: var(--primary);
}

/* =========================================
   4. FORMULARIOS (ESTILOS VISUALES)
   ========================================= */
form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
}

/* Inputs personalizados */
.input-group {
    position: relative;
    width: 100%;
    margin: 8px 0;
}

.input-group input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    padding-left: 40px;
    width: 100%;
    font-family: 'Inter', sans-serif;
    outline: none;
}

.input-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

/* =========================================
   5. CONTENEDOR PRINCIPAL Y ANIMACIONES
   ========================================= */
.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 900px;
    max-width: 100%;
    min-height: 550px;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

/* --- A. LOGIN (Visible por defecto a la izquierda) --- */
.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

/* Al activar el panel derecho, el login se mueve a la derecha (detrás del registro) */
.container.right-panel-active .sign-in-container {
    transform: translateX(100%);
}

/* --- B. REGISTRO (Oculto por defecto a la izquierda) --- */
.sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

/* Al activar panel, el registro se mueve a la derecha y aparece */
.container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

@keyframes show {
    0%, 49.99% { opacity: 0; z-index: 1; }
    50%, 100% { opacity: 1; z-index: 5; }
}

/* =========================================
   6. OVERLAY (PANEL DESLIZANTE DE COLOR)
   ========================================= */
.overlay-container {
    position: absolute;
    top: 0;
    left: 50%; /* Empieza a la DERECHA */
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

/* Al activar, el contenedor del overlay se mueve a la IZQUIERDA */
.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}

/* Fondo degradado naranja */
.overlay {
    background: var(--gradiente);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

/* Contenido de texto dentro del panel naranja */
.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay-panel h1 { color: #FFFFFF; }

/* Panel Izquierdo (Aparece cuando estamos en Registro) -> Botón "Iniciar Sesión" */
.overlay-left {
    transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
    transform: translateX(0);
}

/* Panel Derecho (Aparece cuando estamos en Login) -> Botón "Registrarse" */
.overlay-right {
    right: 0;
    transform: translateX(0);
}

.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}

/* =========================================
   7. FOOTER
   ========================================= */
footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

/* =========================================
   8. RESPONSIVE (MÓVIL)
   ========================================= */
@media (max-width: 768px) {
    
    /* Contenedor fluido */
    .container {
        width: 100%;
        min-height: 100vh;
        height: auto;
        border-radius: 0;
        box-shadow: none;
        overflow-x: hidden;
        position: relative;
    }

    .form-container {
        width: 100%;
        height: 70%; /* Formularios arriba */
        top: 0;
        left: 0;
        padding: 0 20px;
    }

    /* Reseteo de posiciones de escritorio */
    .sign-in-container, 
    .sign-up-container {
        width: 100%;
        left: 0;
        transform: none; 
        position: absolute;
    }

    /* Visibilidad */
    .sign-in-container {
        z-index: 2;
        opacity: 1;
        pointer-events: all;
    }
    
    .sign-up-container {
        z-index: 1;
        opacity: 0;
        pointer-events: none;
    }

    /* Estados Activos Móvil */
    .container.right-panel-active .sign-in-container {
        opacity: 0;
        z-index: 1;
        pointer-events: none;
        transform: translateY(-20px);
    }

    .container.right-panel-active .sign-up-container {
        opacity: 1;
        z-index: 5;
        pointer-events: all;
        transform: translateY(0);
        animation: show 0.6s;
    }

    /* Overlay abajo en móvil */
    .overlay-container {
        width: 100%;
        height: 30%; /* Botones abajo */
        top: auto;
        bottom: 0;
        left: 0;
        right: 0;
        transform: none !important;
        border-radius: 30px 30px 0 0;
    }

    .overlay {
        width: 200%;
        left: -100%;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        width: 50%;
        padding: 0 15px;
        top: 0;
        right: auto;
    }

    /* Corrección de textos en móvil */
    .overlay-left { transform: translateX(0); }
    .overlay-right { right: 0; transform: translateX(0); }
    
    .overlay-panel h1 { font-size: 1.2rem; }
    .overlay-panel p { font-size: 0.85rem; margin: 10px 0 15px; }
}

```

