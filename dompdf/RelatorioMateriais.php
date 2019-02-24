
<?php

require_once 'vendor/autoload.php';
//include_once 'conexao.php';

define('Host', 'localhost');
define('User', 'root');
define('Password', '');
define('DBName', 'ucmestoque');
 $conn= new PDO('mysql:host=' . Host . ';dbname=' . DBName . ';', User, Password);

use Dompdf\Dompdf;
$document = new Dompdf;
//where material.estado='Atendida'
$query="SELECT material.idmaterial,material.nomeMaterial, material.quantidade,material.dataEntrada, material.qtdSaida, material.qtdEstoque, categorias.nomeCategoria, fornecedores.nomeEmpresa
FROM ((material INNER JOIN categorias on categorias.idcategoria=material.categoria_idcategoria) INNER JOIN fornecedores on fornecedores.idfornecedor=material.fornecedor_idfornecedor)where material.estado='aprovada' ";
                   
$resultado= $conn->prepare($query);
$resultado->execute();
$output="
<style>
	table{
		font-family: arial, sans-serif;
		border-collapse: collapse;
                margin-left:25px;
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
				$output.='<th>Categoria</th>';
				$output.='<th>Data Entrada</th>';
				$output.='<th>Quantidade Saida</th>';
				$output.='<th>Qtd. Estoque</th>';
				$output.='<th>Fornecedor</th>';
			$output.='</tr>';
		$output.='</thead>';
                
 while($linhas=$resultado->fetch(PDO::FETCH_ASSOC)){  
     
$output.='<tbody>';
	$output.='<tr>';

		$output.='<td>'.$linhas['idmaterial'].'</td>';
		$output.='<td>'.$linhas['nomeMaterial'].'</td>';
		$output.='<td>'.$linhas['nomeCategoria'].'</td>';
		$output.='<td>'.$linhas['dataEntrada'].'</td>';
		$output.='<td>'.$linhas['qtdSaida'].'</td>';
		$output.='<td>'.$linhas['qtdEstoque'].'</td>';
		$output.='<td>'.$linhas['nomeEmpresa'].'</td>';

	$output.='</tr>';		
$output.='</tbody>';
    
 }
 $output.='</table>';                          

// echo $output;
$document->loadHtml($output);

$document->setPaper("A4", "landscape");
$document->render();

$document->stream('Material.pdf',array('Attachment'=>0));


