<?php
session_start();
include_once 'conexao.php';





$nome=  filter_input(INPUT_POST,'nomeMaterial',FILTER_SANITIZE_NUMBER_INT);
$usuario=  filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_NUMBER_INT);
$qtd=  filter_input(INPUT_POST,'qtd',FILTER_SANITIZE_STRING);
$comentario=  filter_input(INPUT_POST,'comentario',FILTER_SANITIZE_STRING);


$result = "INSERT INTO `requisicoes`( `quantidade`, `data`, `estado`, `comentario`, `fk_material`,`fk_us`) VALUES ($qtd,now(), 'Nova','$comentario', $nome,$usuario)";
$inserir_resultado = $conn->prepare($result);
//$inserir_resultado->bindParam(':quantidade', $qtd, PDO::PARAM_STR);
//$inserir_result->bindParam(':comentario', $comentario, PDO::PARAM_STR);
//$inserir_result->bindParam(':nome', $nome, PDO::PARAM_STR);
//$inserir_resultado->execute();


if ($inserir_resultado->execute()) {
   
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show animated hinge' role='alert'>
                 Requisicao enviada com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisitar.php");
} else {
    
  $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                 Nao foi possivel realizar a requisicao do materiall!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisitar.php");
}
