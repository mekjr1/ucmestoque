
<?php

include_once 'php/conexao.php';
session_start();
if(!isset($_SESSION['usenha'])){
header("Location: ../index.php");}
?>


<!doctype html>
<html lang="pt-PT">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Novas requisições - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/responsavel-armazem/mobile-first/mobile-first-responsavel-armazem-novas-requisicoes.css" rel="stylesheet">
        <link href="../dataTables/css/trasnform.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../dataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">


        <!-- estilo para pagina -->
        <link href="../css/responsavel-armazem/responsavel-armazem-novas-requisicoes.css" rel="stylesheet">

        <!-- icones -->
        <script defer src="../js/fontawesome-all.js"></script>

    </head>

    <body>
        <header>
            <!-- navibar -->
            <nav class="navbar navbar-expand-md fixed-top navbar-dark">
                <a class="navbar-brand pt-0 pb-0" href="inicio.php">
                    <img src="../img/logo.gif" class="d-inline-block img-fluid img-thubnail logo ml-3 w-6" id="logo">
                    UCM ESTOQUE
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navcollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end navcollapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"
                            ><div class="d-inline-block bg-white " id="foto-usuario">
                                <a class="nav-link text-primary"><i class="fas fa-user"></i></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white mr-2" href="#" id="perfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php if(isset($_SESSION['unome'])){
                                    echo $_SESSION['unome'];
                                }?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="perfil">
                                <a class="dropdown-item" href="perfil.php"><i class="fa fa-user-edit"></i> Alterar perfil</a>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Terminar sessão</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="about.php" id="sobre">
                                <i class="fas fa-info-circle"></i> 
                                Sobre nós
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>    
        </header>

        <div class="container-fluid pl-0 pr-0">
            <div class="row w-100 mr-0 ml-0">
                <nav class="col-md-2 d-md-block bg-light sidebar collapse bd-links navcollapse" id="siderbar-nav">
                    <div class="sidebar-sticky ">

                        <div id="accordion" role="tablist">

                            <div class="card active">
                                <div class="card-header active" role="tab" id="inicio">
                                    <h5 class="mb-0">
                                        <a  href="inicio.php" class="active">
                                            <i class="fas fa-home"></i>
                                            Ínicio
                                        </a>
                                    </h5>
                                </div>
                            </div>    

                            <div class="card">

                                <div class="card-header" role="tab" id="gerir-requisicoes">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapse-gerir-requisicoes" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-file-alt"></i>
                                            Gerir requisições
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse-gerir-requisicoes" class="collapse" role="tabpanel" aria-labelledby="gerir-requisicoes" data-parent="#accordion">
                                    <div class="card-body p-0">

                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="novasRequisicoes.php">
                                                    <i class="fas fa-file-medical"></i>
                                                    <span class="hidden-sm">Novas requisições</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="requisicoesAprovadas.php">
                                                    <i class="fas fa-file"></i>
                                                    <span class="hidden-sm">Requisições Aprovadas</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="requisicoesrejeitadas.php">
                                                    <i class="fas fa-file"></i>
                                                    <span class="hidden-sm">Requisições Rejeitadas</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">

                                <div class="card-header" role="tab" id="gerir-materiais">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapse-gerir-materiais" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-dolly-flatbed"></i>
                                            Gerir materiais
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse-gerir-materiais" class="collapse" role="tabpanel" aria-labelledby="gerir-requisicoes" data-parent="#accordion">
                                    <div class="card-body p-0">

                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="addMateriais.php">
                                                    <i class="fas fa-dolly"></i>
                                                    <span class="hidden-sm">Adicionar materiais</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="actualizarMateriais.php">
                                                    <i class="fas fa-dolly"></i>
                                                    <span class="hidden-sm">Actualizar materiais</span>
                                                </a>
                                            </li>

<!--                                            <li class="nav-item">
                                                <a class="nav-link" href="saidaMateriais.php">
                                                    <i class="fas fa-dolly"></i>
                                                    <span class="hidden-sm">Fazer saida de materiais</span>
                                                </a>
                                            </li>-->

                                            <li class="nav-item">
                                                <a class="nav-link" href="estoqueMateriais.php">
                                                    <i class="fas fa-dolly-flatbed"></i>
                                                    <span class="hidden-sm">Estoque de materiais</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="estoquePendente.php">
                                                    <i class="fas fa-dolly-flatbed"></i>
                                                    <span class="hidden-sm">Estoque Pendente</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="estoqueRejeitado.php">
                                                    <i class="fas fa-dolly-flatbed"></i>
                                                    <span class="hidden-sm">Estoque Rejeitado</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">

                                <div class="card-header" role="tab" id="relatorios">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapse-relatorios" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-file"></i>
                                            Relatórios
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse-relatorios" class="collapse" role="tabpanel" aria-labelledby="gerir-requisicoes" data-parent="#accordion">
                                    <div class="card-body p-0">

                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="relatorioMateriais.php">
                                                    <i class="fas fa-file-alt"></i>
                                                    <span class="hidden-sm">Relatório de materiais</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="relatorioRequisicoes.php">
                                                    <i class="fas fa-file-alt"></i>
                                                    <span class="hidden-sm">Relatório de requisições</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-auto col-xl-10 col-lg-10">
                    <!-- section -->
                    <section class="mx-4 pt-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Novas requisições</h1>
                        </div>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        
                        <div id="tabela">
                            <table class="table table-responsive  table-hover" id="tabela1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Nome do material</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Data da </th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Aprovar</th>
                                        <th scope="col">Rejeitar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select = "SELECT requisicoes.idrequisicao, requisicoes.quantidade, requisicoes.data, requisicoes.estado, requisicoes.comentario, requisicoes.comentarioGestor, material.nomeMaterial "
                                        . "from requisicoes INNER JOIN material on material.idmaterial=requisicoes.fk_material where requisicoes.estado='Nova'";
                                $resultado = $conn->prepare($select);
                                $resultado->execute();
                                while ($linhas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <th scope="row">00<?php echo $linhas['idrequisicao']; ?></th>
                                            <td><?php echo $linhas['nomeMaterial']; ?></td>
                                            <td><?php echo $linhas['quantidade']; ?></td>
                                            <td><?php echo $linhas['data']; ?></td>
                                            <td><?php echo $linhas['comentario']; ?></td>
                                            <td>
                                                <div class="input-group" style="padding: 0px; margin: 0px;">
                                                 <a href="id=<?php echo $linhas['idrequisicao']; ?>" data-toggle="modal" data-target="#modal" class="btn btn-primary a-btn-slide-text">
                                                        <span class="fa fa-check" aria-hidden="true"></span>
                                                        <span><strong>Aprovar</strong></span>            
                                                </a>
                                                </div>
                                                    <!--Inicio modal aprovar-->
                                                <div class="modal  fade" id="modal" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document" style="margin-top: 90px;margin-let: 500px;margin-right:270px;">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="text-muted ma" id="modaltexto">
                                                                    </span>

                                                                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body" >

                                                                    <form id="Cad-departamento" method="post" action="php/aprovarpedido.php">
                                                                        <div class="form-row">
                                                                            <div class="col-md-12">
                                                                                <input type="hidden" name="aprovar" value="<?php echo $linhas ['idrequisicao']; ?>">
                                                                                <h5 class="modal-title" style="text-align:center; margin-bottom: 25px;">
                                                                                    Deseja realmente Aprovar essa Requisição?
                                                                                </h5>    

                                                                            </div>

                                                                        </div> 
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="btn-aprovar" class="btn btn-primary">Confirmar</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        </div>
                                                                    </form>   
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--Fim modal aprovar-->
                                                
                                                </td>
                                                <td>
                                                    <div class="input-group" style="padding: 0px; margin: 0px;">
                                                    <a href="id=<?php echo $linhas['idrequisicao']; ?>" data-toggle="modal" data-target="#modal" class="btn btn-danger a-btn-slide-text">
                                                    <span class="fa fa-times" aria-hidden="true" ></span>
                                                    <span><strong>Rejeitar</strong></span>            
                                                     </a>
                                                    </div>
                                                <!--Inicio modal rejeitar-->
                                                <div class="modal  fade" id="modal1" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document" style="margin-top: 90px;margin-let: 500px;margin-right:270px;">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="text-muted ma" id="modaltexto">
                                                                    </span>

                                                                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" >

                                                                    <form id="Cad-departamento" method="post" action="php/rejeitarPedido.php">
                                                                        <div class="form-row">
                                                                            <div class="col-md-12">
                                                                                <input type="hidden" name="rejeitar" value="<?php echo $linhas ['idrequisicao']; ?>">
                                                                                <h5 class="modal-title" style="text-align:center; margin-bottom: 25px;">
                                                                                    Deseja realmente Rejeitar esse pedido?
                                                                                </h5>
                                                                            </div>

                                                                        </div> 
                                                                        <div class="form-row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="comentario"><strong>Comentário</strong></label>
                                                                                        <textarea class ="form-control " id="comentario" name="comentario" placeholder="adicione um comentário" 
                                                                                                  required="Porfavor Diz os motivos de rejeicao do pedido"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="btn-rejeitar" class="btn btn-primary">Confirmar</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        </div>
                                                                    </form>   
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--Fim modal rejeitar-->
                                            </td>    
                                        </tr>
                                    
                                    <?php
                                }
                                ?>         
                                        </tbody>
                            </table>    
                        </div>

                        <hr>
                        
                        
                        
                        <div class="row">
                            <div class="col-md-4">
                                <fieldset >
                                    <legend>Aprovar requisição</legend>
                                    <form role="form" class="needs-validation" action="responsavel-armazem-requisicoes-aprovadas-aprovar.html" id="form-aprovar-requisicao" novalidate>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon bg-secondary text-white">ID</span>
                                                <input type="number" class="form-control w-100" id="aprovar-requisicao" placeholder="ID da requisição" required>
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-check"> </i>
                                                        Aprovar
                                                    </button>
                                                </span>
                                                <div class="invalid-feedback" id="invalid-aprovar-requisicao">
                                                    ID da requisição é requirida
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset >
                                    <legend>Rejeitar requisição</legend>
                                    <form role="form" class="needs-validation" id="form-rejeitar-requisicao" novalidate>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon bg-secondary text-white">ID</span>
                                                <input type="number" class="form-control  w-100" id="rejeitar-requisicao" placeholder="ID da requisição" required>
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-times-circle"> </i>
                                                        Rejeitar
                                                    </button>
                                                </span>
                                                <div class="invalid-feedback" id="invalid-rejeitar-requisicao">
                                                    ID da requisição é requirida
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </section>

                    <footer class="footer  bg-dark pr-4 pl-5 center-sm center-lg center-md">
                        <span class="text-muted">
                            Desenvolvido por:
                            Alberto Jordane Adolfo &
                            Horacio Vilanculo Jr<br>
                            2018 © Universidade Católica de Moçambique
                        </span>
                    </footer>
                </main>


            </div>
        </div>





        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../dataTables/js/bootstrap.min.js"></script>
        <script  defer type="text/javascript" src="../dataTables/js/jquery.dataTables.min.js"></script>
        <script defer type="text/javascript" src="../dataTables/js/dataTables.bootstrap4.min.js"></script>
        <script>
		$(document).ready(function () {
		  $('#tabela1').DataTable({
                      "lengthMenu": [[5, 10, 15], [5,  10, 15]],
                     
                     "language": {
                        "lengthMenu": "Mostrar _MENU_ Linhas por Pagina",
                        "zeroRecords": "Nenhum resultado foi encontrado",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum resultado foi encontrado",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search":         "Procurar:",
                        "paginate": {
                            "first":      "Primeiro",
                            "last":       "Último",
                            "next":       "Próximo",
                            "previous":   "Anterior"
                        }
                        }
                  });
		});
                
	</script>
        <script>
            $(function () {
                var nua = navigator.userAgent
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%')
                }
            })
        </script>

        <script>
            // Select menu for Android
            $(function () {
                var nua = navigator.userAgent
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%')
                }
            })
        </script>

        <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function () {
                                'use strict';

                                window.addEventListener('load', function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');

                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (form) {
                                        form.addEventListener('submit', function (event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
        </script>
    </body>
</html>