<?php
include_once 'conexao.php';

session_start();
session_unset();
session_destroy();
header("Location: index.php");