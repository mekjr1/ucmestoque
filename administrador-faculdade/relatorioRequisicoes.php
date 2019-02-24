<?php
session_start();
include_once 'FuncoesPhp/conexao.php';
if(!isset($_SESSION['usenha'])){
header("Location: ../index.php");}
?>
<!doctype html>
<html lang="pt-PT">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Relatório requisições - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/administrador-faculdade/mobile-first/mobile-first-administrador-faculdade-relatorio-requisicoes.css" rel="stylesheet">
        
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">


        <!-- estilo para pagina -->
        <link href="../css/administrador-faculdade/administrador-faculdade-relatorio-requisicoes.css" rel="stylesheet">

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
                        <ul class="nav flex-column">

                            <li class="nav-item ">
                                <a class="nav-link" href="inicio.php">
                                    <i class="fas fa-home"></i>
                                    <span class="hidden-sm">Inicio</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                 <a class="nav-link" href="novasEntradas.php">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    <span class="hidden-sm ">Materiais Novos</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="estoqueMateriais.php">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    <span class="hidden-sm ">Estoque de materiais</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="relatorioMateriais.php">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="hidden-sm">Relatório de materiais</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="relatorioRequisicoes.php">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="hidden-sm">Relatório de requisições</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-auto col-xl-10 col-lg-10">
                    <!-- section -->
                    <section class="mx-4 pt-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Relatório de requisições</h1>
                        </div>
                        
                        <div id="formulario-tipo-relatorio-requisicoes">
                            <form role="form" class="form-tipo-relatorio-requisicoes" action="" method="post">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-filtrar" for="tipo-relatorio-requisicoes">Tipo de relatório</label>
                                            <select class="form-control custom-select d-block" name="tipo-relatorio-requisicoes" id="tipo-relatorio-requisicoes">
                                                <option value="Reitória" selected>Todas requisições</option>
                                                <option value="Secretária">Requisições aprovadas</option>
                                                <option value="Registro académico">Requisições rejeitadas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-filtrar" for="filtar-por-mes">Filtrar por mês</label>
                                            <input type="month" class="form-control" name="filtrar-por-mes" id="filtrar-por-mes">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" value="Gerar relatório" class="form-control gerar-relatorio-requisicoes btn btn-success w-100" name="gerar-relatorio-requisicoes" id="gerar-relatorio-requisicoes">
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