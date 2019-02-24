<?php
session_start();
include_once 'conexao.php';




$id= filter_input(INPUT_POST, 'apagar',FILTER_SANITIZE_NUMBER_INT);

$query = "delete from requisicoes where idrequisicao='$id'";
$deletar = $conn->prepare($query);

if($deletar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Apagado Com Sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../enviadas.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Nao foi Possivel apagar o usuario!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../enviadas.php");
    }    

