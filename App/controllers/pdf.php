<?php

use App\Core\Controller;
use Dompdf\Dompdf;

class Pdf extends Controller {

    public function index() {

        $dompdf = new Dompdf ();
        
        ob_start();
        require 'teste.php';
        $dompdf->loadHtml(ob_get_clean());

// (Opcional) Configure o tamanho e a orientação do papel 
        $dompdf->setPaper('A4', 'landscape');

// Renderiza o HTML como PDF 
        $dompdf->render();

// Envie o PDF gerado para o navegador
 $dompdf -> stream ("arquivo pdf", ["Attachment" => false]);

        $this->view('pdf/index');
    }

}
