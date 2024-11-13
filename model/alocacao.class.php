<?php

require_once 'conexao.php';

class Alocacao
{
    public function adicionaAlocacao($id_alocacao, $area_alocacao, $quantidade_alocacao)
    {
        try {
            $sql = "INSERT INTO alocacao (id_alocacao, area_alocacao, quantidade_alocacao) VALUES (?,?,?)";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1, $id_alocacao);
            $stmt->bindValue(2, $area_alocacao);
            $stmt->bindValue(3, $quantidade_alocacao);

            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }


    public function removeAlocacao($id_alocacao)
    {
        try {
            $sql = "DELETE FROM alocacao WHERE id_alocacao=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_alocacao);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Alocação Excluída';
            } else {
                return 'Nenhuma alocação encontrada para excluir';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir alocação: ' . $ex->getMessage();
        }
    }


    public function getAlocacao($id_alocacao)
    {
        try {
            $sql = "SELECT * FROM alocacao WHERE id_alocacao=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_alocacao);

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

    public function atualizaAlocacao($id_alocacao, $novaAlocacao)
    {
        try {
            $sql = "UPDATE alocacao SET alocacao = ? WHERE id_alocacao = ?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $novaAlocacao);
            $stmt->bindValue(2, $id_alocacao);

            $stmt->execute();

            return ($stmt->rowCount() > 0) ? 'Alocação Atualizada' : 'Nenhuma alocação encontrada para atualizar';
        } catch (Exception $ex) {
            return 'Erro ao atualizar alocação: ' . $ex->getMessage();
        }
    }
}
