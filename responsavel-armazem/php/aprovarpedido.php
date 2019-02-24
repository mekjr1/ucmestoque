<?php
include_once 'conexao.php';
session_start();



$idAprovar=  filter_input(INPUT_POST,'aprovar', FILTER_SANITIZE_NUMBER_INT);


$query = "UPDATE requisicoes SET estado='Aprovada' where idrequisicao=$idAprovar";
$aprovar = $conn->prepare($query);

if($aprovar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Requisição foi aprovado Com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../novasRequisicoes.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel aprovar a Requisicao Tente denovo!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../novasRequisicoes.php");
    }    



