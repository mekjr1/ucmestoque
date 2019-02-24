 <?php

include ("conexao.php");

class ClassCrud extends conexao{
    
    private $crud;
    private $contador;
    
    private function prepareStatement($query, $parametros){
        $this->countParameter($parametros);
        $this->crud=$this->conexaobd()-> prepare($query);
        
        if($this->contador>0){
           for ($i=1; $i <= $this->contador;$i++){
            $this->crud->bindValue($i, $parametros[$i-1]);
            }  
        }

        $this->crud->execute();
    }
    
    private function countParameter($parametros){
        $this->contador= count($parametros);
         
    }
    
    public function insert($tabela, $condicao, $parametros) {
        $this->prepareStatement("insert into {$tabela} values({$condicao})", $parametros);
        return $this->crud;
    }

        public function select($campos,$tabela, $condicao, $parametros) {
        $this->prepareStatement("select {$campos} from {$tabela} {$condicao}", $parametros);
        return $this->crud;
    }
}