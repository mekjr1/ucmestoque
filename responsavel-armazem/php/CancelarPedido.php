<?php
include_once 'conexao.php';
session_start();



$id=  filter_input(INPUT_POST,'cancelar', FILTER_SANITIZE_NUMBER_INT);


$query = "UPDATE requisicoes SET estado='Nova' where idrequisicao=$id";
$aprovar = $conn->prepare($query);


if($aprovar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Requisição foi Cancelada!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisicoesAprovadas.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel Efectuar a Operação desejada!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisicoesAprovadas.php");
    }    
