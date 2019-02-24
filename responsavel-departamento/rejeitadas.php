
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
        <title>Requisições rejeitadas - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/responsavel-departamento/mobile-first/mobile-first-responsavel-departamento-requisicoes-rejeitadas.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../dataTables/css/trasnform.css" rel="stylesheet">
         <link href="../dataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">

        <!-- estilo para pagina -->
        <link href="../css/responsavel-departamento/responsavel-departamento-requisicoes-rejeitadas.css" rel="stylesheet">

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
                            <h1 class="h2">Requisições rejeitadas</h1>
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
                                        <th scope="col">Data de requisição</th>
                                        <th scope="col">Quantidade requisitada</th>
                                        <th scope="col">Comentario do Gestor</th>
                                        <th scope="col">Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select = "SELECT requisicoes.idrequisicao, requisicoes.quantidade, requisicoes.data, requisicoes.estado, requisicoes.comentario, requisicoes.comentarioGestor, material.nomeMaterial "
                                        . "from requisicoes INNER JOIN material on material.idmaterial=requisicoes.fk_material where requisicoes.estado='Rejeitada' AND requisicoes.fk_us='".$_SESSION['id']."'";
                               $resultado = $conn->prepare($select);
                                $resultado->execute();
                                while ($linhas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    
                                        <tr>
                                            <th scope="row">00<?php echo $linhas['idrequisicao']; ?></th>
                                            <td><?php echo $linhas['nomeMaterial']; ?></td>
                                            <td><?php echo $linhas['data']; ?></td>
                                            <td><?php echo $linhas['quantidade']; ?></td>
                                            <td><?php echo $linhas['comentarioGestor']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                 <a href="id=<?php echo $linhas['idrequisicao']; ?>" data-toggle="modal" data-target="#modal" class="btn btn-danger a-btn-slide-text">
                                                        <span class="fa fa-trash-alt" aria-hidden="true"></span>
                                                        <span><strong>Aprovar</strong></span>            
                                                </a>
                                            </div>
                                                    <div class="modal  fade" id="modal" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document" style="margin-top: 90px;margin-let: 500px;margin-right:270px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <span class="text-muted ma" id="modaltexto">
                                                                    <h5>Sistema de Gestao de Estoque</h5>
                                                                </span>

                                                                <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body" >

                                                                <form id="Cad-departamento" method="post" action="php/deletar.php">
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="apagar" value="<?php echo $linhas ['idrequisicao']; ?>">
                                                                            <h5 class="modal-title" style="text-align:center; margin-bottom: 25px;">
                                                                                Deseja realmente Apagar?<?php echo $linhas ['idrequisicao']; ?>
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
                                                
                                            </td>
                                                
                                        </tr>
                                  
                                    <?php
                                }
                                ?> 
                                </tbody>
                            </table>    
                        </div>

                        <hr>
                        

                        
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
                      "lengthMenu": [[3,5, 10, 15], [3,5,  10, 15]],
                     
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
                var nua = navigator.userAgent;
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
            // Select menu for Android
            $(function () {
                var nua = navigator.userAgent;
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%');
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