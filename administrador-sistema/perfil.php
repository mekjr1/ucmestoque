<?php
session_start();
include_once 'php/conexao.php';

if(!isset($_SESSION['usenha'])){
   
    header("Location: ../index.php");  
}
// $idLogado=$_SESSION['usenha'];
$select_edite = "select * from usuarios where idUsuario='".$_SESSION['id']."'";
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
        <title>Alteral Perfil - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">
        
        <!--validacoes css-->
        <link href="../css/validacoes/invalido.css" rel="stylesheet">    

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/administrador-sistema/mobile-first/mobile-first-administrador-sistema-alterar-perfil.css" rel="stylesheet">
        
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">


        <!-- estilo para pagina -->
        <link href="../css/administrador-sistema/administrador-sistema-alterar-perfil.css" rel="stylesheet">

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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navcollapse" aria-controls="navcollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end navcollapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item  active">
                            <div class="d-inline-block bg-white " id="foto-usuario">
                                <a class="nav-link text-primary"><i class="fas fa-user"></i></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white mr-2 active" href="#" id="perfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <?php if(isset($_SESSION['unome'])){
                                    echo $_SESSION['unome'];
                                }?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="perfil">
                                <a class="dropdown-item active" href="perfil.php"><i class="fa fa-user-edit"></i> Alterar perfil</a>
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

                            <h1 class="h2">Alterar perfil</h1>
                        </div>
                        
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Todos os campos são de preechimento obrigatório!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
     
                        <div id="formulario-alterar-perfil">
                            <form role="form" class="needs-validation cadastro" novalidate action="php/editarPerfil.php" method="post">
                                <div class="form-row">
                                    <div class="col-md">
                                        <input type="hidden" value="<?php echo $linhas['idUsuario']; ?>" name="id">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control validar" name="email" 
                                                   oninput="validaroninput(this.id,'p-email','l-email')" value="<?php echo $linhas['email']; ?>"
                                                   id="email" placeholder="exemplo@email.com " maxlength="50" autocomplete="off" pattern="^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$">
                                            <p class="invisivel text-danger invalido" id="p-email">
                                            </p>
                                            <label class="label-validar invisivel" id="l-email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="numero-telefone">Número de telefone<strong class="text-danger"> *</strong></label>
                                            <input type="tel" class="form-control validar" name="numero-telefone" oninput="validaroninput(this.id,'p-numero-telefone','l-numero-telefone')" value="<?php echo $linhas['nrcelular'];?>"  id="numero-telefone" placeholder="número de telefone" autocomplete="off" pattern="^8[2-7]{1}[0-9]{7}">
                                            <p class="invisivel text-danger invalido" id="p-numero-telefone">
                                            </p>
                                            <label class="label-validar invisivel" id="l-numero-telefone">Número de telefone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="palavra-passe">Palavra-passe</label>
                                            <input type="password" class="form-control validar" name="palavra-passe" id="palavra-passe" oninput="validaroninput(this.id,'p-palavra-passe','l-palavra-passe')" placeholder="palavra-passe"  autocomplete="off" pattern="[A-Za-z0-9_]{6,}" >
                                            <p class="invisivel text-danger invalido" id="p-palavra-passe">
                                            </p>
                                            <label class="label-validar invisivel" id="l-palavra-passe">Palavra-passe</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="confirmar-palavra-passe">Confirmar a palavra-passe</label>
                                            <input type="password" class="form-control validar" name="confirmar-palavra-passe" oninput="validaroninput(this.id,'p-confirmar-palavra-passe','l-confirmar-palavra-passe')" value="" id="confirmar-palavra-passe" placeholder="confirmar palavra-passe" autocomplete="off" pattern="[A-Za-z0-9_]{6,}">
                                            <p class="invisivel text-danger invalido" id="p-confirmar-palavra-passe">
                                            </p>
                                            <label class="label-validar invisivel" id="l-confirmar-palavra-passe">Confirmar a palavra-passe</label>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" value="Alteral perfil" class="btn btn-success btn-block" name="btn-cadastar" id="btn-alterar-perfil"  onclick="validarOnclick()" >
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



        <!--validacoes js-->
        <script type="text/javascript" src="../js/validacoes/validacao.js"></script>
        
        

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