<?php

if(isset($_POST['id'])){
    $id= filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $id=0;
}
if(isset($_POST['primeiro-nome'])){
    $nome= filter_input(INPUT_POST,'primeiro-nome',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $nome="";
}



if(isset($_POST['apelido'])){
    $apelido= filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $apelido="";
}

if(isset($_POST['senha'])){
    $senha= filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
    $hash= password_hash($senha, PASSWORD_DEFAULT);
}  else {
    $senha="";
}


if(isset($_POST['numero-telefone'])){
    $telefone= filter_input(INPUT_POST,'numero-telefone',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $telefone="";
}


if(isset($_POST['email'])){
    $email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $email="";
}

if(isset($_POST['numero-bi'])){
    $bi= filter_input(INPUT_POST,'numero-bi',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $bi="";
}


if(isset($_POST['codigo-funcionario'])){
    $cdg= filter_input(INPUT_POST,'codigo-funcionario',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $cdg="";
}

if(isset($_POST['nivel-acesso'])){
    $acesso= filter_input(INPUT_POST,'nivel-acesso',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $acesso="";
}

if(isset($_POST['departamento'])){
    $departamento= filter_input(INPUT_POST,'departamento',FILTER_SANITIZE_SPECIAL_CHARS);
}  else {
    $departamento="";
}