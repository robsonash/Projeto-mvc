<?php

namespace App\Core;

class Controller {
    
    public function model($model) {
        require_once '../App/models/'.$model.'.php';
        return new $model;
      
    }
    
    public function view($view, $data = []) {
        require_once '../App/views/template.php';
    }
        
}
