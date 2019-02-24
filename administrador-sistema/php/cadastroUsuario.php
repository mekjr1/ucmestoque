<?php

session_start();
include_once 'conexao.php';

$btn = filter_input(INPUT_POST, 'btn-cad', FILTER_SANITIZE_STRING);
if($btn){
    

$nome = filter_input(INPUT_POST, 'primeiro-nome', FILTER_SANITIZE_STRING);
$apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
//$hash=  password_hash($senha, PASSWORD_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$nrcelular = filter_input(INPUT_POST, 'numero-telefone', FILTER_SANITIZE_STRING);
$bi = filter_input(INPUT_POST, 'numero-bi', FILTER_SANITIZE_STRING);
$nrFuncionario = filter_input(INPUT_POST, 'codigo-funcionario', FILTER_SANITIZE_STRING);
$nivelAcesso = filter_input(INPUT_POST, 'nivelAcesso', FILTER_SANITIZE_STRING);
$departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_STRING);



$result = "INSERT INTO usuarios(nome,apelido,senha,email,nrcelular,bi,nrFuncionario,nivelAcesso,departamento_iddepartamento) "
        . "values(:nome,:apelido,:senha,:email,:nrcelular,:bi,:nrFuncionario,:nivelAcesso,:departamento_iddepartamento)";
$inserir_result = $conn->prepare($result);

$inserir_result->bindParam(':nome', $nome, PDO::PARAM_STR);
$inserir_result->bindParam(':apelido', $apelido, PDO::PARAM_STR);
$inserir_result->bindParam(':senha', $senha, PDO::PARAM_STR);
$inserir_result->bindParam(':email', $email, PDO::PARAM_STR);
$inserir_result->bindParam(':nrcelular', $nrcelular, PDO::PARAM_STR);
$inserir_result->bindParam(':bi', $bi, PDO::PARAM_STR);
$inserir_result->bindParam(':nrFuncionario', $nrFuncionario, PDO::PARAM_STR);
$inserir_result->bindParam(':nivelAcesso', $nivelAcesso, PDO::PARAM_STR);
$inserir_result->bindParam(':departamento_iddepartamento', $departamento, PDO::PARAM_STR);

if ($inserir_result->execute()) {
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Usuario Foi Cadastrado Com Sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../cadUser.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erro no cadastro
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../cadUser.php");
}
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erro no cadastro
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../cadUser.php");
}