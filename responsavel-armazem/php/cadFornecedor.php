<?php
session_start();
include_once 'conexao.php';

$nome= filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$celular= filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$endereco= filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);

$result = "INSERT INTO fornecedores(nomeEmpresa,email,celular,endereco) values(:nome,:email,:celular,:endereco)";
$inserir_result = $conn->prepare($result);
$inserir_result->bindParam(':nome', $nome, PDO::PARAM_STR);
$inserir_result->bindParam(':email', $email, PDO::PARAM_STR);
$inserir_result->bindParam(':celular', $celular, PDO::PARAM_STR);
$inserir_result->bindParam(':endereco', $endereco, PDO::PARAM_STR);

if ($inserir_result->execute()) {
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Fornecedor  Foi cadastrado Com sucesso! Continue Porfavor.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../addMateriais.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel cadastrar Fornecedor! Tente novamente.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../addMateriais.php");
}

