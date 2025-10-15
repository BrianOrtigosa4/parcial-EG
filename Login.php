<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "parcial_eg") or die(mysqli_error);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usaurio = trim($_POST['usuario']);
    $usaurio = trim($_POST['contrasena']);

$sql = "SELECT COUNT(*) AS existe FROM resgistros
        WHERE usuario = "$usuario" AND contrasena = "$contrasena""
$confirmacion = mysqli_querry($link,$sql) or die(mysqli_error);
$dato = mysqli_fetch_assoc($confirmacion);

if ($dato[existe] = 0){
    echo "el usuario no existe";
} else {
    echo "bienvenido";

    if (!isset($_SESSION['registros'])) {
        $_SESSION['registros'] = [];
    }

    $_SESSION['registros'] = [
        'usuario' => $usuario,
        'contrasena' => $contrasena
    ];

    $ultimo = [
        'usuario' => $usuario,
        'contrasena' => $contrasena
    ];
    setcookie("ultimo", json_encode($ultimo), time() + (3600*24*7));
}
}  
?>

<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <forms>
        UserName: <input type="text" name="user" required><br>
        Contrasena: <input type="pasword" name="contrasena" required><br>
        <input type="submit" value="Entrar" onclick="href='Productos.php'">   
    </forms>
</body>