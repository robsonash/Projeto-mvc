<?php

namespace App;
class Pagination extends Core\App {
    
    
    public $dados;
    public $atual;
    public $quantidade;
    public $registrosPagina;
    public $contar;
    public $resultado;
    
    public function __construct($dados,$atual,$quantidade){
        $this->dados = $dados;
        $this->atual = $atual;
        $this->quantidade = $quantidade;
    }
    public function resultado() {
        $this->registrosPagina = array_chunk($this->dados, $this->quantidade);
        $this->contar = count($this->registrosPagina);
        if($this->contar > 0):
        $this->resultado = $this->registrosPagina[$this->atual-1]; 
        return $this->resultado;
        else:
            return [];
        endif;        
        
    }
    public function navigator(){
        echo "<ul class='pagination'>";
        for($i = 1; $i <= $this->contar; $i++):
            if($i == $this->atual):
                echo "<li class='active'><a href='".$this->currentURL()."?page=".$i."#'>".$i."</a></li>";
            else:
                echo "<li> <a href='".$this->currentURL()."?page=".$i."'>".$i."</a></li>";
            endif;
        endfor;
        echo "</ul>"; 
    }
}
