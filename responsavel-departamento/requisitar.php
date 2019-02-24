
<?php
session_start();
include_once 'php/conexao.php';
if(!isset($_SESSION['usenha'])){
    header("Location: ../index.php");  
}
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
        <title>Requisitar materiais - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/responsavel-departamento/mobile-first/mobile-first-responsavel-departamento-requisitar-materiais.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">

        <!-- estilo para pagina -->
        <link href="../css/responsavel-departamento/responsavel-departamento-requisitar-materiais.css" rel="stylesheet">

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
                            <a class="nav-link active text-white" href="about.php" id="sobre">
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
                                <a class="nav-link" href="requisitar.php">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="hidden-sm ">Requisitar materiais</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="enviadas.php">
                                    <i class="fas fa-file-alt"></i>
                                    <span class="hidden-sm">Requisições enviadas</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="aprovadas.php">
                                    <i class="fas fa-file-alt" ></i>
                                    <span class="hidden-sm" >Requisições aprovadas</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="rejeitadas.php">
                                    <i class="fas fa-file-alt" ></i>
                                    <span class="hidden-sm" >Requisições rejeitadas</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="atendidas.php">
                                    <i class="fas fa-dolly" ></i>
                                    <span class="hidden-sm" >Requisições atendidas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-auto col-xl-10 col-lg-10">
                    <!-- section -->
                    <section class="mx-4 pt-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Requisitar materiais</h1>
                        </div>
                        
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Os campos marcados com <strong class="text-danger">*</strong> são de preechimento obrigatório!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <?php
                             if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>

                        <div id="formulario-requisitar-materiais">
                            <form role="form" class="needs-validation cadastro" novalidate method="POST" action="php/requisitarPHP.php" >
                                <input type="hidden" value="<?php echo $linhas['idUsuario'];?>" name="usuario">
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome-material-list">Nome do Material <strong class="text-danger">*</strong> </label>
                                            <select class="form-control validar custom-select d-block" name="nomeMaterial"  oninput="validaroninput(this.id,'p-departamento','l-departamento')" name="departamento" id="departamento" required>
                                            <option >--Selecione o nome do material---</option>
                                                <?php
                                                    $select = "select * from material";
                                                    $resultado = $conn->prepare($select);
                                                    $resultado->execute();
                                                    while ($linhas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                
                                                    <option value="<?php echo $linhas['idmaterial']; ?>"><?php echo $linhas['nomeMaterial']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            
                                            <div class="invalid-feedback">
                                                nome do material é requirido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apelido">Quantidade <strong class="text-danger">*</strong> </label>
                                            <input type="text" class ="form-control" name="qtd" value=""  min="1"  id="quantidade" placeholder="quantidade" required autocomplete="off">
                                            <div class="invalid-feedback">
                                                quantidade é requirido
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="comentario">Comentário</label>
                                            <textarea class ="form-control " id="comentario" value="" name="comentario" placeholder="adicione um comentário"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-requisitar" value="Requisitar" name="requisitar" id="btn-requisitar">
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
            });
            window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
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