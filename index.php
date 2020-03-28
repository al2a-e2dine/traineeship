<?php
include_once 'connect.php';
session_start();
echo "welcome";
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
    <a href="login_admin.php">login admin.php</a>
    <hr>
    <a href="#">Gestion des clients</a>
    <br>
    <a href="#">register client</a>
    <br>
    <a href="#">login client</a>
    <hr>
    <a href="#">Gestion des entreprises</a>
    <br>
    <a href="#">register entreprise</a>
    <br>
    <a href="#">login entreprise</a>
    <hr>
    <a href="logout.php">logout</a>
</body>
</html>