<?php
session_start();
include_once 'conexao.php';




$id= filter_input(INPUT_POST, 'deletar',FILTER_SANITIZE_NUMBER_INT);

$query = "delete from material where idmaterial=$id";
$deletar = $conn->prepare($query);

if($deletar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Apagado Com Sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../estoqueMateriais.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel eliminar o desejado!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../estoqueMateriais.php");
    }    

