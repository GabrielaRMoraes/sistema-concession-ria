<?php

require_once 'conexao.php';

class Venda
{
    public function adicionaVenda($id_venda, $data_venda, $fk_id_automovel)
    {
        try {
            $sql = "INSERT INTO venda (id_venda, data_venda, fk_Automovel_id_automovel) VALUES (?,?,?)";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1, $id_venda);
            $stmt->bindValue(2, $data_venda);
            $stmt->bindValue(3, $fk_id_automovel);


            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }


    public function removeVenda($id_venda)
    {
        try {
            $sql = "DELETE FROM venda WHERE id_venda=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_venda);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Venda Excluída';
            } else {
                return 'Nenhuma venda encontrada para excluir';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir venda: ' . $ex->getMessage();
        }
    }


    public function getVenda($id_venda)
    {
        try {
            $sql = "SELECT * FROM venda WHERE id_venda=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_venda);

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

    public function atualizaVenda($id_venda, $novaVenda)
    {
        try {
            $sql = "UPDATE venda SET venda = ? WHERE id_venda = ?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $novaVenda);
            $stmt->bindValue(2, $id_venda);

            $stmt->execute();

            return ($stmt->rowCount() > 0) ? 'Venda Atualizada' : 'Nenhuma venda encontrada para atualizar';
        } catch (Exception $ex) {
            return 'Erro ao atualizar venda: ' . $ex->getMessage();
        }
    }
}
