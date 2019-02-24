<?php
session_start();
include_once 'conexao.php';


$idR= filter_input(INPUT_POST,'saida' ,FILTER_SANITIZE_NUMBER_INT);
$fk_material= filter_input(INPUT_POST,'material' ,FILTER_SANITIZE_NUMBER_INT);


$query = "UPDATE material set qtdEstoque= quantidade-(SELECT quantidade FROM requisicoes where idrequisicao='$idR'), "
        . "qtdSaida=qtdSaida+(SELECT quantidade FROM requisicoes where idrequisicao='$idR'), dataSaida=NOW(),estado='Atendida' WHERE idmaterial='$fk_material'";

$query_result=$conn->prepare($query);
if($query_result->execute()){
//    echo 'entrei';
    $query = "UPDATE requisicoes SET estado='Atendida' where idrequisicao=$idR";
    $query_result = $conn->prepare($query);
    $query_result->execute();
    
    $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Saida feita com sucesso!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisicoesAprovadas.php");
}
else{
//    echo 'fora';
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Nao foi Possivel realizar essa Operacao!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
               </button>
            </div>";
    header("Location:../requisicoesAprovadas.php");
}
