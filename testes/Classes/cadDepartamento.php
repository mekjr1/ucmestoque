<?php

include("ClassCrud.php");
include("vardepartamento.php");

$crud = new ClassCrud();


$crud->insert("departamentos", "?,?",array($id,$departamento));
echo "Cadastro realizado com sucesso";
header("Location: ../administrador-sistema/cadUser.php");