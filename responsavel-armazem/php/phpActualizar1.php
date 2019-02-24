<?php

include_once'conexao.php';
session_start();
include_once 'conexao.php';

$id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$fornecedor = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_STRING);

$result = "UPDATE material SET novaqtd=:quantidade, fornecedor_idfornecedor=:fornecedor, estado='novo' where idmaterial=$id";


$update_result = $conn->prepare($result);
$update_result->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
$update_result->bindParam(':fornecedor', $fornecedor, PDO::PARAM_STR);

if ($update_result->execute()) {
    
//    $query = "update material set qtdEstoque=quantidade-1 where idmaterial=$id";
//    
//    $resultado=$conn->prepare($query);
//    $resultado->execute();

    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Material Actualizado com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../actualizarMateriais.php");
} else {
  
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel adicionar actualizar !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../actualizarMateriais.php");
}