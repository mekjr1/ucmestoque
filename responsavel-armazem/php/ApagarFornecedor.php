<?php
session_start();
include_once 'conexao.php';




$id= filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);

$query = "delete from fornecedores where idfornecedor='$id'";
$deletar = $conn->prepare($query);

if($deletar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Os dados de Fornecedor foram Eliminados com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../estoqueMateriais.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel efectuar a operacao desejada!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../estoqueMateriais.php");
    }    
