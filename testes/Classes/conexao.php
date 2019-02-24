<?php


abstract class conexao {
   
    protected function conexaobd(){
        $user="root";
        $pass="";

        try {
            $con=new PDO("mysql:host=localhost;dbname=ucmestoque",$user,$pass);
            return $con;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
        }
}
