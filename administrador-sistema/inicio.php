<?php
session_start();
include '../auth.php';

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
        <title>Ínicio - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/administrador-sistema/mobile-first/mobile-first-administrador-sistema-inicio.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
        
        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">

        <!-- estilo para pagina -->
        <link href="../css/administrador-sistema/administrador-sistema-inicio.css" rel="stylesheet">

        <!-- icones -->
        <script defer src="../js/fontawesome-all.js"></script>

    </head>

    <body >
        <header>
            <!-- navibar -->
            <nav class="navbar navbar-expand-md fixed-top navbar-dark">
                <a class="navbar-brand pt-0 pb-0 animated slideInRight" href="inicio.php">
                    <img src="../img/logo.gif" class="d-inline-block img-fluid img-thubnail logo ml-3 w-6" id="logo">
                    UCM ESTOQUE
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navcollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end navcollapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="d-inline-block bg-white " id="foto-usuario">
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
                    <div class="sidebar-sticky  animated wobble">
                        <ul class="nav flex-column">

                            <li class="nav-item ">
                                <a class="nav-link active" href="inicio.php">
                                    <i class="fas fa-home"></i>
                                    <span class="hidden-sm">Inicio</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="cadUser.php">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hidden-sm ">Cadastar usúario</span>
                                </a>
                            </li>

                            

                            <li class="nav-item ">
                                <a class="nav-link" href="consulta.php">
                                    <i class="fas fa-users" ></i>
                                    <span class="hidden-sm" >Consultar usúario</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-auto col-xl-10 col-lg-10">
                    <!-- section -->
                    <section>
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="slide-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>

                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="animated flipInY">Cadastar usuários</h1>
                                        <a class="btn btn-lg btn-success animated zoomInRight" href="cadUser.php">Prosseguir</a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slide-icon">
                                        <i class="fas fa-user-times"></i>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="animated flipInY">Eliminar usuários</h1>
                                        <a class="btn btn-lg btn-success animated jackInTheBox" href="eliminarUser.php">Prosseguir</a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slide-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="animated flipInY">Consultar usuários</h1>
                                        <a class="btn btn-lg btn-success animated bounceInUp" href="consulta.php">Prosseguir</a>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                        <hr class="separador">
                        <div id="saudacao">
                            <p class="lead animated slideInUp">
                              
                
                                <span id="saudacao-periodo" onload="">Bem-Vindo</span> 
                                <span id="saudacao-usuario-online">
                                    <?php
                                if(isset($_SESSION['unome'])){
                                    echo $_SESSION['unome'];
                                }
                                        ?>
                                </span>
                            </p>
                            <p class="lead">Já podes iniciar a gestão dos usúarios do <strong>UCM-Estoque</strong></p>
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


                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                ?>


        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../dataTables/js/time.js" type="text/javascript"></script>
        <script>
            $(function () {
                var nua = navigator.userAgent;
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%')
                }
            })
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
        <script language="javascript" type="text/javascript">//
//        var timerID = null;
//        var timerRunning = false;
//        function stopclock (){
//        if(timerRunning)
//        clearTimeout(timerID);
//        timerRunning = false;
//        }
//        function showtime () {
//
//        var now = new Date();
//        var hours = now.getHours();
//        var minutes = now.getMinutes();
//        var seconds = now.getSeconds();
//        var timeValue = "" + ((hours >12) ? hours -12 :hours);
//        if (timeValue === "0") timeValue = 12;
//        timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
//        timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
//        timeValue += (hours >= 12) ? " P.M." : " A.M.";
//        document.clock.face.value = timeValue;
//        timerID = setTimeout("showtime()",1000);
//        timerRunning = true;
//        }
//        function startclock() {
//        stopclock();
//        showtime();
//
//        }
//        window.onload=startclock;   
//        
      </script>
    </body>
</html>