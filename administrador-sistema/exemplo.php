
<?php
include_once 'php/conexao.php';
session_start();
//if(!isset($_SESSION['nome'])){
//    header("Location: ../index.php");  
//}
?>

<!doctype html>
<html lang="pt-PT">
    <head>

        <title>Consultar Úsuario - UCM Estoque</title>        
        <link rel="icon" href="../img/favicon.png">
        
<!--         <link href="../dataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">-->
         <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--         <script  defer type="text/javascript" src="../dataTables/js/jquery.dataTables.min.js"></script>-->
         <script  defer type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
       
    </head>

    <body>
        
                        
                           
                               
            
                          
                        
                        
                            <table class="display" id="teste">
                                <thead >
                                    <tr>
                                        <th >id</th>
                                        <th >Nome</th>
                                        <th >Apelido</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                <?php
                    $select = "SELECT usuarios.idUsuario,usuarios.nome, usuarios.apelido, usuarios.email, usuarios.nrcelular, usuarios.bi, usuarios.nrFuncionario, usuarios.nivelAcesso, departamentos.nomeDepartamento from usuarios INNER JOIN departamentos on departamentos.iddepartamento=usuarios.departamento_iddepartamento";
                    $resultado= $conn->prepare($select);
                    $resultado->execute();
                    while($linhas=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>
                        <td>".$linhas['idUsuario']."</td>
                        <td>".$linhas['nome']."</td>
                        <td>".$linhas['apelido']."</td>

                        </tr>";
                        
                    }
                    
                                ?>
                               
                                    
                                </tbody>
                                </table>
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../dataTables/js/bootstrap.min.js"></script>
       
        <script defer type="text/javascript" src="../dataTables/js/dataTables.bootstrap4.min.js"></script>
        <script>
		$(document).ready(function () {
		  $('#teste').DataTable({
                
                  });
		});
                
	</script>
    </body>
</html>