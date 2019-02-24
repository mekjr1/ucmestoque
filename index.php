<?php
session_start();

?>
<!doctype html>
<html lang="pt-PT">
    <head>
        <title>Bem-vindo ao UCM Estoque - Sistema de Gestão de Armazem da Faculdade de Economia e Gestão</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/favicon.png">

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <!-- flexboxgrid -->
        <link rel="stylesheet" href="css/flexboxgrid.min.css">

        <!-- mobile fast/ estilo para media query -->
        <link href="css/index/mobile-index.css" rel="stylesheet">

        <!-- estilo para pagina -->
        <link href="css/index/index.css" rel="stylesheet">

        <!-- icones -->
        <script defer src="js/fontawesome-all.js"></script>
    </head>

    <body>
        <!-- navibar -->
        <nav class="navbar navbar-expand-md fixed-top navbar-dark">
            <a class="navbar-brand pt-0 pb-0" href="index.html">
                <img src="img/logo.gif" class="d-inline-block img-fluid img-thubnail logo ml-3 w-6" id="logo">
                UCM ESTOQUE
            </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navcollapse" aria-controls="navcollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end navcollapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="sobre-index.php" id="sobre">
                                <i class="fas fa-info-circle"></i> 
                                Sobre nós
                            </a> 
                        </li>
                    </ul>
                </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron bg-white" id="jumbotron-login">
                        <h1 class="display-1">Bem-Vindo ao UCM - Estoque</h1>
                        <p class="lead">Sistema de Gestão de Armazem da Faculdade de Economia e Gestão.</p>
                        <hr class="my-4">
                        <p>A melhor combinação de eficiência, segurança e disponibilidade </p>
                         <?php
            if (isset($_SESSION['msg'])) {
                             echo $_SESSION['msg'];
                             unset($_SESSION['msg']);
                         }
                         ?>
                        <p class="lead">
                            <a href="#" class="btn btn-primary btn-lg d-lg-inline-block text-white animated bounceInRight" data-toggle="modal" data-target="#modal-iniciar-sessao">Iniciar sessao</a>
                        </p>
                    </div>
                </div>
            </div>
             <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <!--Modal para Iniciar-Sessao-->
            <div class="modal  fade animated flipInY" id="modal-iniciar-sessao" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img alt="logo do sistema UCM_Estoque" id="modal-logo" src="img/login/logo.png">

                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <span aria-hidden="true">&times;</span>
                                </span>
                            </button>
                        </div>
<?php
if(isset($_POST['btn-submit'])){
    require 'auth.php';
    login($conn);
}
?>
                        <div class="modal-body">
                            <form id="iniciar-sessao" method="POST" method="auth.php">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email-telefone" class="col-form-label">Email ou telefone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <input type="text" class="form-control" name="email" id="email-telefone" placeholder="exemplo@email.com ou 8XXXXXXXX" autocomplete="off" required pattern="^8[2-7]{1}[0-9]{7}|^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Palavra-passe:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                <input type="password" name="senha" class="form-control" id="Palavra-passe" placeholder="palavra-passe" autocomplete="off" required pattern="[A-Za-z0-9_]{6,}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="btn-submit" class="btn btn-success">Iniciar-sessão</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
         window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});
                                            }, 3850);
        </script>
    </body>
</html>
