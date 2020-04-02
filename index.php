<?php
include_once 'connect.php';
session_start();
echo "<h1>welcome</h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <br>
    <a href="gestion_admin.php">Gestion des administrateurs</a>
    <br>
    <a href="register_admin.php">register admin</a>
    <br>
    <a href="login_admin.php">login admin</a>
    <hr>
    <a href="gestion_client.php">Gestion des clients</a>
    <br>
    <a href="register_client.php">register client</a>
    <br>
    <a href="login_client.php">login client</a>
    <hr>
    <a href="gestion_entreprise.php">Gestion des entreprises</a>
    <br>
    <a href="register_entreprise.php">register entreprise</a>
    <br>
    <a href="login_entreprise.php">login entreprise</a>
    <hr>
    <a href="logout.php">logout</a>
</body>
</html>