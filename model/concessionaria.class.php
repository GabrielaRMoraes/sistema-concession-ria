<?php

require_once 'conexao.php';

class Concessionaria
{
    public function adicionaConcessionaria($id_concessionaria, $concessionaria)
    {
        try {
            $sql = "INSERT INTO concessionaria (id_concessionaria, concessionaria) VALUES (?,?)";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1, $id_concessionaria);
            $stmt->bindValue(2, $concessionaria);

            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }


    public function removeConcessionaria($id_concessionaria)
    {
        try {
            $sql = "DELETE FROM concessionaria WHERE id_concessionaria=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_concessionaria);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Concessionária Excluída';
            } else {
                return 'Nenhuma concessionária encontrada para excluir';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir concessionária: ' . $ex->getMessage();
        }
    }


    public function getConcessionaria($id_concessionaria)
    {
        try {
            $sql = "SELECT * FROM concessionaria WHERE id_concessionaria=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_concessionaria);

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

    public function atualizaConcessionaria($id_concessionaria, $novoNome)
    {
        try {
            $sql = "UPDATE concessionaria SET concessionaria = ? WHERE id_concessionaria = ?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $novoNome);
            $stmt->bindValue(2, $id_concessionaria);

            $stmt->execute();

            return ($stmt->rowCount() > 0) ? 'Concessionária Atualizada' : 'Nenhuma concessionária encontrada para atualizar';
        } catch (Exception $ex) {
            return 'Erro ao atualizar concessionária: ' . $ex->getMessage();
        }
    }
}
