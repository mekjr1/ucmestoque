<?php
session_start();
include_once 'php/conexao.php';

if(!isset($_SESSION['usenha'])){
    header("Location: ../index.php");  
}
?>
<!doctype html>
<html lang="pt-PT">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Eliminar Úsuario - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">
        
        <!--validacoes css-->
        <link href="../css/validacoes/invalido.css" rel="stylesheet">
        
        <!-- mobile fast/ estilo para media query -->
        <link href="../css/administrador-sistema/mobile-first/mobile-first-administrador-sistema-eliminar-usuario.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">

        <!-- estilo para pagina -->
        <link href="../css/administrador-sistema/administrador-sistema-eliminar-usuario.css" rel="stylesheet">

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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navcollapse">
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
                            <a class="nav-link text-white" href="sobre.php" id="sobre">
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
                                <a class="nav-link" href="cadUser.php">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hidden-sm ">Cadastar Usúario</span>
                                </a>
                            </li>

                            

                            <li class="nav-item ">
                                <a class="nav-link" href="consulta.php">
                                    <i class="fas fa-users" ></i>
                                    <span class="hidden-sm" >Consultar Usúario</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-auto col-xl-10 col-lg-10">
                    <!-- section -->
                    <section class="mx-4 pt-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Eliminar usúarios</h1>
                        </div>
                        
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Para eliminar usúario, por favor informe o <strong>Email</strong> ou <strong> telefone</strong> do usúario no campo <strong>Email ou telefone do usúario</strong>!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div id="formulario-filtrar">
                            <form role="form" class="filtrar-usuarios" id="filtrar-usuarios" action="" method="post">
                                <div class="form-row">
                                    <div class="col-6">
                                        <label for="email-telefone">Email ou telefone do usúario</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-group mb-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control validar" name="email-telefone" oninput="validaroninput(this.id,'p-email-telefone','l-email-telefone')" value="" placeholder="email ou telefone" id="email-telefone" autocomplete="off" required pattern="^8[2-7]{1}[0-9]{7}|^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-secondary" onclick="validarOnclick()">
                                                        <i class="fas fa-eye"> </i>
                                                        Mostrar dados
                                                    </button>
                                                </span>
                                                <label class="label-validar invisivel" id="l-email-telefone" >Email ou telefone do usúario</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="invisivel text-danger invalido" id="p-email-telefone">
                                </p>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="tabela">
                                    <table class="table table-hover">
                                        <tr>
                                            <th class="thead-dark" scope="row">Código: </th>
                                            <td><label id="codigo"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nome: </th>
                                            <td><label id="Nome"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Apelido: </th>
                                            <td><label id="apelido"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email: </th>
                                            <td><label id="email"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telefone: </th>
                                            <td><label id="telefone"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Departamento: </th>
                                            <td><label id="departamento"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nível de acesso: </th>
                                            <td><label id="nivel-acesso"></label></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">BI: </th>
                                            <td><label id="bi"></label></td>
                                        </tr>
                                    </table>    
                                </div>
                            </div>
                        </div>

                        <form role="form" class="form-eliminar-usuarios" id="form-eliminar-usuarios" action="" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control validar" name="invisivel-email-telefone" oninput="validaroninput(this.id,'p-invisivel-email-telefone','l-invisivel-email-telefone')" value="aa" id="invisivel-email-telefone" autocomplete="off" required>
                                        <label class="label-validar invisivel" id="l-invisivel-email-telefone">Email ou telefone do usúario</label>
                                    </div>
                                </div>
                            </div>
                            <p class="invisivel text-danger invalido" id="p-invisivel-email-telefone">
                            </p>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-success w-100" onclick="validarOnclick()">
                                                Eliminar usúario
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="reset" class="btn btn-danger w-100">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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




        
        <!--validacoes js-->
        <script type="text/javascript" src="../js/validacoes/validacao.js"></script>
        
        
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(function () {
                var nua = navigator.userAgent
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%');
                }
            });
        </script>

        <script>
            // Select menu for Android
            $(function () {
                var nua = navigator.userAgent;
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%');
                }
            });
            window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
        </script>

    </body>
</html>