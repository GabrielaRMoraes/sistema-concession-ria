<?php

require_once 'conexao.php';

class Automovel
{
    public function adicionaAutomovel($id_automovel, $modelo_automovel, $preco_automovel)
    {
        try {
            $sql = "INSERT INTO automovel (id_automovel, modelo_automovel, preco_automovel) VALUES (?,?,?)";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1, $id_automovel);
            $stmt->bindValue(2, $modelo_automovel);
            $stmt->bindValue(3, $preco_automovel);

            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }


    public function removeAutomovel($id_automovel)
    {
        try {
            $sql = "DELETE FROM automovel WHERE id_automovel=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_automovel);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Automóvel Excluído';
            } else {
                return 'Nenhum automóvel encontrado para excluir';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir automóvel: ' . $ex->getMessage();
        }
    }


    public function getAutomovel($id_automovel)
    {
        try {
            $sql = "SELECT * FROM automovel WHERE id_automovel=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_automovel);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                return $result;
            }
            return false;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function atualizaAutomovel($id_automovel, $novoAutomovel, $preco_automovel)
    {
        try {
            $sql = "UPDATE automovel SET modelo_automovel = ?, preco_automovel = ? WHERE id_automovel = ?";
    
            $stmt = Conexao::getConexao()->prepare($sql);
    
            $stmt->bindValue(1, $novoAutomovel);
            $stmt->bindValue(2, $preco_automovel);
            $stmt->bindValue(3, $id_automovel);
        
            $stmt->execute();
    
            return ($stmt->rowCount() > 0) ? 'Automóvel Atualizado' : 'Nenhum automóvel encontrado para atualizar';
        } catch (Exception $ex) {
            return 'Erro ao atualizar automóvel: ' . $ex->getMessage();
        }
    }
    
    
    
}
