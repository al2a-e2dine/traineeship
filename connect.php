<?php
$dbc = mysqli_connect('localhost', 'root', '', 'traineeship');


if (!$dbc) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_set_charset($dbc, 'utf8');

?>