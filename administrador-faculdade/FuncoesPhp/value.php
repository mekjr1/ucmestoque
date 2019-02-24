<?php

include_once 'FuncoesPhp/conexao.php';

$valor=  filter_input(INPUT_POST,'relatorio',FILTER_SANITIZE_NUMBER_INT);

if($valor==1){
    header("Location: ../../dompdf/RelatorioMateriais.php");
}
 else {
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Nao foi Gerar Relatorio escolhido! Profavor escolha uma opccao valida!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    header("Location: ../RelatorioMateriais.php");
}


