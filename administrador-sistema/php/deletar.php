<?php
session_start();
include_once 'conexao.php';




$id= filter_input(INPUT_POST, 'deletar',FILTER_SANITIZE_NUMBER_INT);

$query = "delete from usuarios where idUsuario=$id";
$deletar = $conn->prepare($query);

if($deletar->execute()){
$_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Usuario Foi Apagado!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../consulta.php");
    }else{
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel apagar o usuario!
                Verifique se os campos Estão devidamente preenchidos!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../consulta.php");
    }    

