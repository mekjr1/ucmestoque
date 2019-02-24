<?php
session_start();
include_once 'conexao.php';

$id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
$senha =md5( filter_input(INPUT_POST,'palavra-passe', FILTER_SANITIZE_STRING));
$email= filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
$cell= filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_STRING);

$result = "UPDATE usuarios SET email=:email,senha=:senha, nrcelular=:nrcelular where idUsuario='$id'";
$inserir_result = $conn->prepare($result);
$inserir_result->bindParam(':email', $email, PDO::PARAM_STR);
$inserir_result->bindParam(':senha', $senha, PDO::PARAM_STR);
$inserir_result->bindParam(':nrcelular', $cell, PDO::PARAM_STR);


if ($inserir_result->execute()) {
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Os seus dados de perfil foram alterados com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../inicio.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel Alterar os seus dados!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../inicio.php");
}

