
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
<title>Cadastar Úsuario - UCM Estoque</title>        
<link rel="icon" href="../img/favicon.png">

<!--validacoes css-->
<link href="../css/validacoes/invalido.css" rel="stylesheet">        



<!-- mobile fast/ estilo para media query -->
<link href="../css/administrador-sistema/mobile-first/mobile-first-administrador-sistema-cadastrar-usuario.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- flexboxgrid -->
<link rel="stylesheet" href="../css/flexboxgrid.min.css">


<!-- estilo para pagina -->
<link href="../css/administrador-sistema/administrador-sistema-cadastrar-usuario.css" rel="stylesheet">


<!-- icones -->
<script defer src="../js/fontawesome-all.js"></script>
<!--validacoes js-->
<script type="text/javascript" src="../js/validacoes/validacao.js">

</script>

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
                        <a class="nav-link active" href="cadUser.php">
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
                <h1 class="h2">Cadastar usúario</h1>
            </div>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Os campos marcados com <strong class="text-danger">*</strong> são de preechimento obrigatório!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

<div id="formulario-cadastro">
    <form role="form" class="cadastro" action="php/cadastroUsuario.php" id="form-cadastro" method="post">
    <div class="form-row">
        <div class="col-md">
            <div class="form-group">
                <label for="primeiro-nome">Primeiro nome<strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control validar" name="primeiro-nome"  oninput="validaroninput(this.id,'p-primeiro-nome','l-primeiro-nome')" value="" id="primeiro-nome" placeholder="primeiro nome" autocomplete="off" maxlength="15" required pattern="[A-Za-z]*">
                <p class="invisivel text-danger invalido" id="p-primeiro-nome">
                </p>
                <label class="label-validar invisivel" id="l-primeiro-nome" >Primeiro nome</label>
            </div>

        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="apelido">Apelido<strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control validar" name="apelido" oninput="validaroninput(this.id,'p-apelido','l-apelido')" value="" id="apelido" placeholder="apelido" required autocomplete="off" maxlength="15" pattern="[A-Za-z]*">
                <p class="invisivel text-danger invalido" id="p-apelido">
                </p>
                <label class="label-validar invisivel" id="l-apelido">Apelido</label>

            </div>
        </div>

        <div class="col-md">
            <div class="form-group" style="">
                <label for="apelido">Palavra-Pass<strong class="text-danger"> *</strong></label>
                <input type="password" class="form-control validar" name="senha" oninput="validaroninput(this.id,'p-senha','l-senha')" value="" id="senha" placeholder="Palavra-Pass" required autocomplete="off" minlength="8" maxlength="32">
                <p class="invisivel text-danger invalido" id="p-senha">
                </p>
                <label class="label-validar invisivel" id="l-senha">Palavra-Pass</label>

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md">
            <div class="form-group" style="">
                <label for="numero-telefone">Número de telefone<strong class="text-danger"> *</strong></label>
                <input type="tel" class="form-control validar" name="numero-telefone" oninput="validaroninput(this.id,'p-numero-telefone','l-numero-telefone')" value=""  id="numero-telefone" placeholder="exemplo: 840000000" required autocomplete="off" pattern="^8[2-7]{1}[0-9]{7}">
                <p class="invisivel text-danger invalido" id="p-numero-telefone">
                </p>
                <label class="label-validar invisivel" id="l-numero-telefone">Número de telefone</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group" style="">
                <label for="email">Email<span class="text-muted"><strong class="text-danger">*</strong></span></label>
                <input type="email" class="form-control validar" name="email" oninput="validaroninput(this.id,'p-email','l-email')" value="" id="email" placeholder="exemplo@email.com " maxlength="50" autocomplete="off" required pattern="^[A-Za-z]([A-Za-z0-9._]*)@([A-Za-z]*)\.+([A-Za-z.])*[A-Za-z]{2,10}$">
                <p class="invisivel text-danger invalido" id="p-email">
                </p>
                <label class="label-validar invisivel" id="l-email">Email</label>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md">
            <div class="form-group" style="">
                <label for="numero-bi">Número de BI<strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control validar" name="numero-bi" oninput="validaroninput(this.id,'p-numero-bi','l-numero-bi')" value="" id="numero-bi" placeholder="número de bi" 
                       required autocomplete="off" pattern="[0-9]{12}[A-Za-z]{1}$" placeholder=" exemplo: 123456789012J">
                <p class="invisivel text-danger invalido" id="p-numero-bi">
                </p>
                <label class="label-validar invisivel" id="l-numero-bi">Número de BI</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group" style="">
                <label for="codigo-funcionario">Código do funcionário<strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control validar" name="codigo-funcionario" oninput="validaroninput(this.id,'p-codigo-funcionario','l-codigo-funcionario')" value="" id="codigo-funcionario" placeholder="código do funcionário" min="700000" required autocomplete="off">
                <p class="invisivel text-danger invalido" id="p-codigo-funcionario">
                </p>
                <label class="label-validar invisivel" id="l-codigo-funcionario">Código do funcionário</label>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md">
            <div class="form-group" style="">
                <label for="nivel-acesso">Nível de acesso<strong class="text-danger"> *</strong></label>
                <select class="form-control validar custom-select d-block" name="nivelAcesso" oninput="validaroninput(this.id,'p-nivel-acesso','l-nivel-acesso')" name="nivel-acesso" id="nivel-acesso" required>
                    <option value="departamento" id="responsavel-departamento" selected>Responsável do departamento</option>
                    <option value="admin" id="administrador">Administrador de sistema</option>
                    <option value="administradorFacul" id="administrador">Administrador da Faculdade</option>
                    <option value="gestor" id="responsavel-armazem">Responsável do armazém</option>
                </select>
                <p class="invisivel text-danger invalido" id="p-nivel-acesso">
                </p>
                <label class="label-validar invisivel" id="l-nivel-acesso">Nível de acesso</label>
            </div>
        </div>
        <div class="col-md conteiner-departamento" style="padding-right: 0px;">

            <div class="form-group" style="">
                <label for="departamento">Departamento<strong class="text-danger"> *</strong></label>
                <select class="form-control validar custom-select d-block" name="departamento" style="border-top-right-radius:0px;  border-bottom-right-radius:0px;" oninput="validaroninput(this.id,'p-departamento','l-departamento')" name="departamento" id="departamento1" required>
    
                    <option selected> --Selecione--</option>
                    <?php 
                    $select = "select * from departamentos";
                    $resultado= $conn->prepare($select);
                    $resultado->execute();
                    while($linhas=$resultado->fetch(PDO::FETCH_ASSOC)){ ?>
                    
                    <option value="<?php  echo $linhas['iddepartamento'] ;?>"><?php echo $linhas['nomeDepartamento']; ?></option>
                        <?php
                    }
                        ?>
                </select>
                
                <p class="invisivel text-danger invalido" id="p-departamento">
                </p>
                <label class="label-validar invisivel" id="l-departamento">Departamento</label>
            </div>
        </div>

        <div class="col-md conteiner-novo" style="padding-left: 0px" >
            <div class="form-group" style="" id="novoDept">
                <label for="departamento" class="invisivel">...<strong class="text-danger"></strong></label>
             <div class="input-group">
                                             
                 <button type="button" id="botao" class="btn btn-primary" style="border-top-left-radius:0;  border-bottom-left-radius: 0;" onclick=""  data-toggle="modal" data-target="#modal">
            <i class="fas fa-envelope"> </i>Criar Novo
            </button>
            </div>
        </div>
    </div>

    </div>

        <div class="form-row">
        <div class="col-md-3">
            <div class="form-group" style="padding:0px;margin: 0px;">
                <input type="submit" value="Cadastrar" name="btn-cad"  onclick="validarOnclick()" class="btn btn-success btn-block"  id="btn-cadastrar">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="padding:0px;margin: 0px;">
                <input type="reset" value="Cancelar"  class="btn btn-danger btn-block" name="btn-cancelar" id="btn-cancelar">
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

<!--Modal para Cadastrar Departamento-->
<div class="modal  fade" id="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="margin-top: 90px;margin-let: 500px;margin-right:270px;">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-muted ma" id="modaltexto">
                    <p><strong class="text-danger">*</strong>Este campo lhe permitira adicionar um novo departamento caso na lista ja existente o mesmo nao consta</p>
                </span>

        <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <span aria-hidden="true">&times;</span>
                    </span>
                </button>
            </div>

    <div class="modal-body">
      
        <form id="Cad-departamento" method="post" action="php/cadastroDepartamento.php">
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="departamento" class="col-form-label">
                            <strong>Nome do Departamento</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" name="departamento" id="departamento" required="Preencha o campo rpimeiro" autocomplete="off" class="form-control" placeholder="Informe o nome do departamento">
                            </div>
                        </div>
                    <div class="form-group">
                <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
                    </div>
                
                </div> 
             
        </form>   
      </div>       
    </div>
    </div>
</div>

<!--validacoes js-->
<script type="text/javascript" src="../js/validacoes/validacao.js"></script>


<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
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
        $(this).remove(); 
    });
}, 4000);
</script>

<script>
</script>
</body>
</html>