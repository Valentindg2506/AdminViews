<?php
$errores = [];
$nombre = $usuario = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombrecompleto'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['email'];

    // Validaciones
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errores[] = "Email inválido.";
    if (!preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,16}$/', $contrasena)) 
        $errores[] = "Password: 8-16 chars, 1 mayúscula, 1 símbolo.";

    if (empty($errores)) {
        // IMPORTAMOS LA CONEXIÓN AQUÍ
        require_once 'db.php'; 

        $passHash = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuario (usuario, contrasena, nombre, correo) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $usuario, $passHash, $nombre, $correo);
        
        if($stmt->execute()){
            header("Location: index.php");
            exit;
        } else {
            $errores[] = "Error BD: " . $conexion->error;
        }
        $stmt->close();
        $conexion->close();
    }
}
?>
