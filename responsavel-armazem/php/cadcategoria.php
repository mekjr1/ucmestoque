<?php

session_start();
include_once 'conexao.php';



$Cadcategoria = filter_input(INPUT_POST, 'Cadcategoria', FILTER_SANITIZE_STRING);

$result = "INSERT INTO categorias(nomeCategoria) values(:Cadcategoria)";
$inserir_result = $conn->prepare($result);
$inserir_result->bindParam(':Cadcategoria', $Cadcategoria, PDO::PARAM_STR);

if ($inserir_result->execute()) {
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Categoria  Foi cadastrada Com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../addMateriais.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Possivel cadastrar categoria!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../addMateriais.php");
}
