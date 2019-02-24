<?php

include_once  'conexao.php';

function login ($conexao){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $nrCelular = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

    $result = "select * from usuarios where email='$email' OR nrCelular='$nrCelular' AND senha='$senha' limit 1";
    $inserir_result = $conexao->prepare($result);  
    $inserir_result->execute();
    $linhas=$inserir_result->rowCount();

 if($linhas>0){
       

              
       while($linhas=$inserir_result->fetch(PDO::FETCH_ASSOC)){  
           
              $_SESSION['id']=$linhas['idUsuario'];
              $_SESSION['unome']=$linhas['nome'];
              $_SESSION['usenha']=$linhas['senha'];
              $_SESSION['uemail']=$linhas['email'];
          if($linhas['nivelAcesso']== 'admin'){

              header("Location: administrador-sistema/inicio.php");
            }
            if($linhas['nivelAcesso'] == 'administradorFacul'){

              header("Location: administrador-faculdade/inicio.php");
            } 
            if($linhas['nivelAcesso'] =='departamento'){

              header("Location: responsavel-departamento/inicio.php");
            } 
           if($linhas['nivelAcesso'] =='gestor'){

              header("Location: responsavel-armazem/inicio.php");
            } 
            
       }
       }else{
           
         $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Email ou senha incorreto!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
            header("Location: index.php");  
       }
     
      
}

