<?php

session_start();
include_once 'conexao.php';




$pesquisar= filter_input(INPUT_POST, 'pesquisar',FILTER_SANITIZE_STRING);

$query = "select idUsuario from usuarios where idUsuario=$id";
$pesquisar_result = $conn->prepare($query);


