<?php

session_start();
include_once 'conexao.php';



$departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_STRING);

$result = "INSERT INTO departamentos(nomeDepartamento) values(:departamento)";
$inserir_result = $conn->prepare($result);
$inserir_result->bindParam(':departamento', $departamento, PDO::PARAM_STR);

if ($inserir_result->execute()) {
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                O departamento Foi cadastrado Com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../cadUser.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi possivel cadastrar novo departamento!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../cadUser.php");
}
