<?php
session_start();
include_once 'conexao.php';



$id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'primeiro-nome', FILTER_SANITIZE_STRING);
$apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
$senha = md5(md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
//$hash=  password_hash($senha, PASSWORD_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$nrcelular = filter_input(INPUT_POST, 'numero-telefone', FILTER_SANITIZE_STRING);
$bi = filter_input(INPUT_POST, 'numero-bi', FILTER_SANITIZE_STRING);
$nrFuncionario = filter_input(INPUT_POST, 'codigo-funcionario', FILTER_SANITIZE_STRING);
$nivelAcesso = filter_input(INPUT_POST, 'nivelAcesso', FILTER_SANITIZE_STRING);
$departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_STRING);



//$result = "UPDATE usuarios SET nome=:nome,apelido=:apelido,senha=:senha,"
//        . "email=:email,nrceluar=:nrcelular, bi=:bi, "
//        . "nrFuncionario=:nrFuncionario,nivelAcesso=:nivelAcesso,"
//        . "departamento_iddepartamento=:departamento_iddepartamento WHERE idUsuario=$id";

$result = "UPDATE usuarios SET nome=:nome, apelido=:apelido, senha=:senha,email=:email,nrcelular=:nrcelular,bi=:bi, nrFuncionario=:nrFuncionario, nivelAcesso=:nivelAcesso, departamento_iddepartamento=:departamento_iddepartamento WHERE idUsuario=$id";

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


if($inserir_result->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Dados do Usuario Alterados Com Sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../consulta.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Falha na alteracao dos dados de Usuarios!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../consulta.php");
    }    

 


