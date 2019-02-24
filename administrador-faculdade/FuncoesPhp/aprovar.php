<?php
session_start();
include_once "conexao.php";

//    $btn = filter_input(INPUT_POST, 'btn-aprovar',FILTER_SANITIZE_STRING);

    $id = filter_input(INPUT_POST, 'aprovar',FILTER_SANITIZE_NUMBER_INT);
    
    $query= "UPDATE material SET  quantidade=quantidade+novaqtd, qtdEstoque=(quantidade-qtdSaida), novaqtd=0, estado='aprovada' where idmaterial=$id";
    $result = $conn->prepare($query); 
    if ($result->execute()) {
       
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
               Material Aprovado com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../novasEntradas.php");
} else {
    
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi possivel Aprovar!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../novasEntradas.php");
}
