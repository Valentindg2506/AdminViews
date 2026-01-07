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
