<?php
class Contato {

    public function index() {
        echo "estou na index do contato";
    }

    public function email($nome = '' , $email = '') {
        echo $nome."<br>".$email;
    }
    public function telefone() {
        echo "119753";
    }
}