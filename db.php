<?php
$mysqli = new mysqli('localhost', 'root', '', 'academia');

if ($mysqli->connect_error) {
    die('Erro de conexão: ' . $mysqli->connect_error);
}
?>
