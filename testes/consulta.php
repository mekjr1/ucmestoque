
<?php
session_start();
include_once 'conexao.php';

?>
<!doctype html>
<html lang="pt-PT">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Consultar Úsuario - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">

        <!-- mobile fast/ estilo para media query -->
        <link href="../css/administrador-sistema/mobile-first/mobile-first-administrador-sistema-consultar-usuario.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
         <link href="../dataTables/css/trasnform.css" rel="stylesheet">
         <link href="../dataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- flexboxgrid -->
        <link rel="stylesheet" href="../css/flexboxgrid.min.css">

        <!-- estilo para pagina -->
        <link href="../css/administrador-sistema/administrador-sistema-consultar-usuario.css" rel="stylesheet">

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
                                <a class="nav-link active" href="consulta.php">
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
                            <h1 class="h2">Consultar usúarios</h1>
                        </div>
                        
                        <div id="formulario-filtrar">
                            <form role="form" class="filtrar-usuarios" action="consulta.php" method="POST">
                               
                                 <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
                            </form>
                        </div>
                        <div id="tabela">
                            <table class="table table-responsive  table-hover" id="tabela1">
                                <thead class="thead-light">
                                    <tr>
                                       
                                        <th scope="col">ID</th>
                                        <th scope="col">nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Assunto</th>
                                        <th scope="col">Messagem</th>
                                        <th scope="col">Accoes</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                    $select = "SELECT * from mensagens_contatos";
                    $resultado= $conn->prepare($select);
                    $resultado->execute();
                    while($linhas=$resultado->fetch(PDO::FETCH_ASSOC)){
                        ?>  <tr>
                        <td><?=$linhas['id']?></td>
                        <td><?=$linhas['nome']?></td>
                        <td><?=$linhas['email']?></td>
                        <td><?=$linhas['assunto']?></td>
                        <td><?=$linhas['mensagem']?></td>
                        
                        <td>
                            <input type="checkbox" name="checkbox[]" class="delete" value="<?php=$linhas['id']?>">
                        </td>
                        </tr> 
                    <?php    
                    }
                    ?>
                              </tbody>
                            </table>    
      <div class="form-row">
        <div class="col-md-3">
            <div class="form-group" style="padding:0px;margin: 0px;">
                <input type="submit" value="Cadastrar" name="btn-cad"   class="btn btn-success btn-block"  id="btn-cadastrar">
            </div>
        </div>
        </div>
                        </div>
        </div>
                    </section>

                    <footer class="footer  bg-dark pr-4 pl-5 center-sm center-lg center-md">
                        <span class="text-muted">
                            Desenvolvido por:
                            <a class="nav-link d-inline perfil-desenvolvedores" target="blank" href="../perfil/perfil-alberto.html">Alberto Jordane Adolfo</a> &
                            <a class="nav-link d-inline perfil-desenvolvedores" target="blank" href="../perfil/perfil-horacio.html">Horacio Vilanculo Jr</a><br>
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
                var nua = navigator.userAgent;
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1);
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%');
                }
            });
        </script>

        <script>
            // Select menu for Android
            $(function () {
                var nua = navigator.userAgent;
                var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1);
                if (isAndroid) {
                    $('select.form-control').removeClass('form-control').css('width', '100%');
                }
            });
            
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});
                                            }, 4000);
        </script>
        
        <script>
            $(document).ready(function (){
              $("#btn-cadastrar").click(function(){
                  if(confirm("Tens a certeza que deseja deletar?")){
                      var id=[];
                      $(":checkbox:checked").each(function (i){
                         id[i]=$(this).val(); 
                      });
                      
                      if(id.length===0){
                          alert("Porfavor Selecione primeiro");
                      }else{
                          $.ajax({
                              url: "deletar.php",
                              method: "POST",
                              data:{id:id},
                               success: function () {
                                   for(var i=0; i<id.length; i++){
                                    $("tr#"+id[i]+"").css("background-color", "#ccc");
                                    $("tr#"+id[i]+"").fadeOut("slow");
                                    }
                               }
                          });
                      }
                  }
                  else{
                      return false; 
                  }
              });  
            });
        </script>    
</body>
</html>