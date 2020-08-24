<?php

use App\Core\Controller;
use App\Auth;

class Notes extends Controller {

    public function index() {
        $this->view('notes/index');
    }

    public function ver($id = '') {

        $note = $this->model('Note');
        $dados = $note->findId($id);
        $this->view('notes/ver', $dados);
    }

    public function criar() {

        Auth::checkLogin();

        $mensagem = array();
        if (isset($_POST['cadastrar'])):

            if (empty($_POST['titulo'])):
                $mensagem[] = "O campo titulo não pode estar vazio";
            elseif (empty($_POST['texto'])):
                $mensagem[] = "O campo texto nao pode estar vazio";
            else:

                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

// Opcionalmente, você pode renomear o arquivo no upload 
                $new_filename = uniqid();
                $file->setName($new_filename);

// Validar o upload do arquivo 
// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml 
                $file->addValidations(array(
                    // Certifique-se de que o arquivo seja do tipo "imagem / png " 
                    new \Upload\Validation\Mimetype('image/png'),
                    // Você também pode adicionar validação de multi-tipo 
                    // novo \ Upload \ Validation \ Mimetype (array ('imagem / png', 'imagem / gif'))
                    // Certifique-se de que o arquivo não seja maior que 5M (use "B", "K", M "ou" G ") 
                    new \Upload\Validation\Size('5M')
                ));

// Acesse os dados sobre o arquivo que foi enviado 
                $data = array(
                    'name' => $file->getNameWithExtension(),
                    'extension' => $file->getExtension(),
                    'mime' => $file->getMimetype(),
                    'size' => $file->getSize(),
                    'md5' => $file->getMd5(),
                    'dimensions ' => $file->getDimensions()
                );

// Tente fazer upload do arquivo, 
                try {
                    // Sucesso! 
                    $file->upload();
                    $mensagem[] = "upload feito com sucesso";
                    $note = $this->model('Note');
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $note->imagem = $data['name'];
                    $mensagem[] = $note->save();
                } catch (\Exception $e) {
                    // Falha! 
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>", $errors);
                }





            endif;

        endif;

        $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
    }

    public function editar($id) {

        Auth::checkLogin();

        $mensagem = array();

        $note = $this->model('Note');

        if (isset($_POST['atualizar'])):
            $note->titulo = $_POST['titulo'];
            $note->texto = $_POST['texto'];        
            $mensagem[] = $note->update($id);
        endif;
         if (isset($_POST['atualizarimagem'])):
           $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

// Opcionalmente, você pode renomear o arquivo no upload 
                $new_filename = uniqid();
                $file->setName($new_filename);

// Validar o upload do arquivo 
// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml 
                $file->addValidations(array(
                    // Certifique-se de que o arquivo seja do tipo "imagem / png " 
                    new \Upload\Validation\Mimetype('image/png'),
                    // Você também pode adicionar validação de multi-tipo 
                    // novo \ Upload \ Validation \ Mimetype (array ('imagem / png', 'imagem / gif'))
                    // Certifique-se de que o arquivo não seja maior que 5M (use "B", "K", M "ou" G ") 
                    new \Upload\Validation\Size('5M')
                ));

// Acesse os dados sobre o arquivo que foi enviado 
                $data = array(
                    'name' => $file->getNameWithExtension(),
                    'extension' => $file->getExtension(),
                    'mime' => $file->getMimetype(),
                    'size' => $file->getSize(),
                    'md5' => $file->getMd5(),
                    'dimensions ' => $file->getDimensions()
                );

// Tente fazer upload do arquivo, 
                try {
                    // Sucesso! 
                    $file->upload();
                    $mensagem[] = "upload feito com sucesso";
                    $note = $this->model('Note');
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $note->imagem = $data['name'];
                    $mensagem[] = $note->updateImage($id);
                } catch (\Exception $e) {
                    // Falha! 
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>", $errors);
                }
        endif;


        if(isset($_POST['deletarimagem'])):         
            $imagem = $note->findId($id);
            unlink("uploads/".$imagem['imagem']);
            $mensagem[] = $note->deleteImage($id);
        endif;
        $dados = $note->findId($id);
        $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
    }

    public function excluir($id = '',$page = '') {

        Auth::checkLogin();

        $mensagem = array();

        $note = $this->model('Note');

        $mensagem [] = $note->delete($id);

        $dados = $note->getAll();

        $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
    }

}
