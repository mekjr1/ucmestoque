<?php

session_start();
include_once 'conexao.php';

$btn= filter_input(INPUT_POST, 'btn', FILTER_SANITIZE_STRING);

if(isset($btn)){
    

$nome= filter_input(INPUT_POST, 'nomeMaterial', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$fornecedor = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_STRING);

$result = "INSERT INTO material(nomeMaterial,quantidade,qtdestoque,novaqtd,dataEntrada,categoria_idcategoria, fornecedor_idfornecedor,estado) values(:nomeMaterial, :quantidade,quantidade=quantidade+$quantidade,$quantidade,NOW(), :categoria, :fornecedor,'novo')";

$inserir_result = $conn->prepare($result);
$inserir_result->bindParam(':nomeMaterial', $nome, PDO::PARAM_STR);
$inserir_result->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
$inserir_result->bindParam(':categoria', $categoria, PDO::PARAM_STR);
$inserir_result->bindParam(':fornecedor', $fornecedor, PDO::PARAM_STR);

if ($inserir_result->execute()) {
   

    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Foi Adicionado Com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../addMateriais.php");
} else {
  
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel adicionar material !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../addMateriais.php");
}
}
else{
     $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel adicionar material !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../addMateriais.php");
}
//$dataentrada = date('Y-m-d H:i:s');
//$inserir_result->bindParam(':dataentrada', $dataentrada, PDO::PARAM_STR);
