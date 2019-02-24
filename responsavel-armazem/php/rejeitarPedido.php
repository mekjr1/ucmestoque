<?php
include_once 'conexao.php';
session_start();



$id=  filter_input(INPUT_POST,'rejeitar', FILTER_SANITIZE_NUMBER_INT);
$comentario=  filter_input(INPUT_POST,'comentario', FILTER_SANITIZE_STRING);

$query = "UPDATE requisicoes SET estado='Rejeitada', comentarioGestor=:comentario where idrequisicao=$id";
$aprovar = $conn->prepare($query);
$aprovar->bindParam(':comentario', $comentario, PDO::PARAM_STR);

if($aprovar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Requisição foi Rejeitada!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../novasRequisicoes.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel Rejeitar!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../novasRequisicoes.php");
    }    



