<?php
$link = mysqli_connect("localhost", "root", "", "parcial_eg") or die(mysqli_error);

$sql = "SELECT * FROM productos";
$resultado = sqli_querry($link,$sql) or die (mysql_error);
$productos = [];
while ($dato = mysqli_fetch_assoc($resultado)){
    $productos[] = $dato;
}
?>

<html>
<head>
    <title>Productos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>  
<body> 
    <h1>Productos</h1>
    <ul>
        <?php foreach ($productos as $p): ?>
            <li><?php echo $p['nombre'] . " - $" . $p['precio']; ?></li>
        <?php endforeach; ?>
    </ul>
    <input type="submit" value="Salir de la sesión" onclick="href='Logout.php'">    
</body>  
</html