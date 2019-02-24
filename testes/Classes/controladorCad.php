<?php

include("../Classes/ClassCrud.php");
include("variaveisAdmin.php");

$crud->insert("usuario", "?,?,?,?,?,?,?,?,?,?",
    array($id,$nome,$apelido,$hash,$telefone,$email,$bi,$cdg,$acesso,$departamento));
echo "Cadastro realizado com sucesso";