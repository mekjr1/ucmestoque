<?php
session_start();
include_once 'conexao.php';

$id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome= filter_input(INPUT_POST, 'nomeMaterial', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$fornecedor = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_STRING);

$result = "UPDATE material SET nomeMaterial=:nomeMaterial, quantidade=:quantidade, categoria_idcategoria=:categoria, fornecedor_idfornecedor=:fornecedor where idmaterial=$id";

$update_result = $conn->prepare($result);
$update_result->bindParam(':nomeMaterial', $nome, PDO::PARAM_STR);
$update_result->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
$update_result->bindParam(':categoria', $categoria, PDO::PARAM_STR);
$update_result->bindParam(':fornecedor', $fornecedor, PDO::PARAM_STR);

if ($update_result->execute()) {
    

    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Material Actualizado com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../estoqueMateriais.php");
} else {
  
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel adicionar actualizar !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../estoqueMateriais.php");
}