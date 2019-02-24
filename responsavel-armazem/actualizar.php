
<?php
session_start();
include_once 'php/conexao.php';
if(!isset($_SESSION['usenha'])){
header("Location: ../index.php");}
$id=  filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
                    $select_edite = "select * from material where idmaterial='$id'";
                    $resultado_edite= $conn->prepare($select_edite);
                    $resultado_edite->execute();
                    $linhas=$resultado_edite->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="pt-PT">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Adicionar materiais - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/responsavel-armazem/mobile-first/mobile-first-responsavel-armazem-adicionar-materiais.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">


        <!-- estilo para pagina -->
        <link href="../css/responsavel-armazem/responsavel-armazem-adicionar-materiais.css" rel="stylesheet">

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
                            <h1 class="h2">Actualizar Materiais</h1>
                        </div>
                         <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                                }
                          ?>

                        
                        <!--Fim do formulario-->
                        <div id="formulario-adicionar-materiais">
                            <form role="form" class="needs-validation cadastro" novalidate action="php/phpActualizar1.php" method="post">
                                <div class="form-row">
                                   <input type="hidden" name="id" value="<?php echo $linhas ['idmaterial'];?>"> 
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="quantidade">Quantidade <strong class="text-danger">*</strong></label>
                                           <input type="number" class="form-control" name="quantidade" value="<?php echo $linhas ['quantidade'];?>" id="quantidade" placeholder="Quantidade" required>
                                           <div class="invalid-feedback">
                                               a quantidade é requirido
                                           </div>
                                       </div>
                                   </div>  
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="fornecedor">Fornecedor <strong class="text-danger">*</strong></label>
                                           <select  class="form-control validar custom-select"  oninput="validaroninput(this.id,'p-fornecedor','l-fornecedor')" name="fornecedor" id="fornecedor" >
                                               <option value="">--Escolha o Fornecedor--</option>
                                               <?php
                                               $select_fornecedor = "select * from fornecedores";
                                               $resultado_fornecedor = $conn->prepare($select_fornecedor);
                                               $resultado_fornecedor->execute();
                                               while ($linhas = $resultado_fornecedor->fetch(PDO::FETCH_ASSOC)) {
                                                   ?>
                                                   <option value="<?php echo $linhas['idfornecedor']; ?>"><?php echo $linhas['nomeEmpresa']; ?></option>
                                                   <?php
                                               }
                                               ?>
                                           </select>

                                       </div>
                                   </div>
                                   <div class="col-md conteiner-novo" style="padding-left: 0px" >
                                       <div class="form-group" style="" id="novoFornecedor">
                                           <label class="invisivel" for="fornecedor" >Novo Fornecedor</label>
                                           <div class="input-group">
                                               <button type="submit" id="novaCategoria" class="btn btn-primary" style="border-top-left-radius:0;  border-bottom-left-radius: 0;" onclick=""  data-toggle="modal" data-target="#modal2">
                                                   <i class="fas fa-envelope"> </i>Criar Novo
                                               </button>
                                           </div>
                                       </div>
                                   </div> 
                                   
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" value="Cadastrar" class="btn btn-success btn-block" name="btn-cadastar" id="btn-cadastrar">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="reset" value="Cancelar" class="btn btn-danger btn-block" name="btn-cancelar" id="btn-cancelar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Fim do formulario-->
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

<!--Modal para novo fornecedor-->
<div class="modal  fade" id="modal2" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="margin-top: 90px;margin-let: 500px;margin-right:270px;">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-muted ma" id="modaltexto">
                    <h5>Cadastro de Novo Fornecedor</h5>
                </span>

        <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <span aria-hidden="true">&times;</span>
                    </span>
                </button>
            </div>

            <div class="modal-body" >
      
                <form id="cadFornecedor" method="post" action="php/cadFornecedor.php">
            <div class="form-row">
                <div class="col-md-12">
                    <label for="nomeempresa" class="col-form-label invisivel">
                            <strong>Nome da empresa</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" name="nomeEmpresa" id="nomeempresa" required autocomplete="off" class="form-control" placeholder="Informe o nome da da empresa">
                            </div>
            
               </div>
                <div class="col-md-12">
                    <label for="email" class="col-form-label invisivel">
                        <strong>Correio Eletronico (Email)</strong>
                    </label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" autocomplete="off" class="form-control" placeholder="exemplo@email.com">
                    </div>

                </div>
                
                <div class="col-md-12" >
                    <div class="form-group" style="padding-bottom:0px; margin-bottom: 0px;">
                        <label for="celular"><strong>Número de Celular </strong></label>
                        <input type="tel" class="form-control validar" name="celular" value=""  id="numero-telefone" placeholder="exemplo: 840000000" autocomplete="off" pattern="^8[24567]{1}[0-9]{7}">
                    </div>

                </div>
                 <div class="col-md-12">
                    <label for="localizacao" class="col-form-label invisivel">
                        <strong>Endereço </strong>(Localizao da empresa)
                    </label>
                    <div class="input-group">
                        <input type="text" name="localizacao" id="localizacao" autocomplete="off" class="form-control" placeholder="AV./RUA xxxxxxxxxx">
                    </div>

                </div>
                
                </div> 
             <div class="modal-footer">
                <button type="submit" name="Apagar" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>      
      </div>       
    </div>
    </div>
</div> 
<!--fim modal-->



        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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
                            
     window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
        </script>
    </body>
</html>