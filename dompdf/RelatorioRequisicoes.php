
<?php

require_once 'vendor/autoload.php';

define('Host', 'localhost');
define('User', 'root');
define('Password', '');
define('DBName', 'ucmestoque');

 $conn= new PDO('mysql:host=' . Host . ';dbname=' . DBName . ';', User, Password);

use Dompdf\Dompdf;
$document = new Dompdf;
//where material.estado='Atendida'
$query="SELECT requisicoes.idrequisicao, requisicoes.quantidade, requisicoes.data, requisicoes.estado,requisicoes.fk_us, requisicoes.comentario, requisicoes.comentarioGestor, material.nomeMaterial, usuarios.nome FROM"
        . "(( requisicoes INNER JOIN material on material.idmaterial=requisicoes.fk_material )"
        . "INNER JOIN usuarios ON usuarios.nome=requisicoes.fk_us) where requisicoes.idrequisicao=2";                     
                   
$resultado= $conn->prepare($query);
$resultado->execute();
$output="
<style>
	table{
		font-family: arial, sans-serif;
		border-collapse: collapse;
                margin-left:30px;
		width:90%;
               
	}
        h1,h2,h3{
        font-family: arial, sans-serif;
        text-align: center;
        }
	td,th{
		border: 1px solid #dddddd;
		text-align: center;
		padding: 8px;
	}
	th{
		background-color:#dddddd;
	}
        a{
                margin-top:30px;
               height:150px;
               width:150px;
            }
            #titulo{
                margin-top:50px;
            }
</style>

";

$output.="<h1 id='titulo'>Sistema de Gestao de Estoque- UCMESTOQUE</h1></br>";
$output.="<h3>Relatorio de Material em estoque</h3>";

	$output.='<table border=1>';
		$output.='<thead>';
			$output.='<tr>';
				$output.='<th>#Codigo</th>';
				$output.='<th>Nome Material</th>';
				$output.='<th>Data requisicao</th>';
				$output.='<th>Quantidade requisitada</th>';
				$output.='<th>Data de Atendida</th>';
				$output.='<th>Nomde de Requisitante</th>';
				
			$output.='</tr>';
		$output.='</thead>';
                
 while($linhas=$resultado->fetch(PDO::FETCH_ASSOC)){  
     
$output.='<tbody>';
	$output.='<tr>';

		$output.='<td>'.$linhas['idrequisicao'].'</td>';
		$output.='<td>'.$linhas['nomeMaterial'].'</td>';
		$output.='<td>'.$linhas['data'].'</td>';
		$output.='<td>'.$linhas['quantidade'].'</td>';
		$output.='<td>'.$linhas['qtdSaida'].'</td>';
		$output.='<td>'.$linhas['nome'].'</td>';
		

	$output.='</tr>';		
$output.='</tbody>';
    
 }
 $output.='</table>';                          

 echo $output;
//$document->loadHtml($output);
//
//$document->setPaper("A4", "landscape");
//$document->render();
//
//$document->stream("Material.pdf",array("Attachment"=>1));


