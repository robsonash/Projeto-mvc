<?php

use App\Core\Model;

class Note extends Model {

    public $titulo;
    public $texto;
    public $imagem;

    public function getAll() {

        $sql = "select * from notes";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }

    public function findId($id) {

        $sql = "select * from notes where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }

    public function save() {

        $sql = "insert into notes (titulo, texto,imagem) values (?, ?, ?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);
        if ($stmt->execute()):
            return "Cadastrado com sucesso";
        else:
            return "Erro ao cadastrar";
        endif;
    }

    public function update($id) {

        $sql = "update notes set titulo = ?, texto = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $id);
        if ($stmt->execute()):
            return "Atualizado com sucesso";
        else:
            return "Erro ao atualizar";
        endif;
    }

    public function updateImage($id) {

        $sql = "update notes set titulo = ?, texto = ?, imagem = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);
        $stmt->bindValue(4, $id);
        if ($stmt->execute()):
            return "Atualizado com sucesso";
        else:
            return "Erro ao atualizar";
        endif;
    }

    public function deleteImage($id) {

        $sql = "update notes set imagem = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "");
        $stmt->bindValue(2, $id);

        if ($stmt->execute()):
            return "Imagem excluida com sucesso!";
        else:
            return "Erro ao excluir imagem";
        endif;
    }

    public function delete($id) {
        //pegou a mesma estrutura do findid

        $resultado = $this->findId($id);

        if (!empty($resultado['imagem'])):
            unlink("uploads/" . $resultado['imagem']);
        endif;
        //ate aqui para selecionar a aimagem 
        $sql = "delete from notes where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);


        if ($stmt->execute()):
            return "Excluido com sucesso";
        else:
            return "Erro ao excluir";
        endif;
    }

    public function search($search) {

        $sql = "select * from notes where titulo like ? COLLATE utf8_general_ci";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "%$search%");
        $stmt->execute();

        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }

}
