<?php

require_once 'conexao.php';

class Cliente
{
    public function adicionaCliente($id_cliente, $nome_cliente)
    {
        try {
            $sql = "INSERT INTO cliente (id_cliente, nome_cliente) VALUES (?,?)";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1, $id_cliente);
            $stmt->bindValue(2, $nome_cliente);


            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }


    public function removeCliente($id_cliente)
    {
        try {
            $sql = "DELETE FROM cliente WHERE id_cliente=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_cliente);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Cliente Excluído';
            } else {
                return 'Nenhum cliente encontrado para excluir';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir cliente: ' . $ex->getMessage();
        }
    }


    public function getCliente($id_cliente)
    {
        try {
            $sql = "SELECT * FROM cliente WHERE id_cliente=?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_cliente);

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

    public function atualizaCliente($id_cliente, $novoCliente)
    {
        try {
            $sql = "UPDATE cliente SET cliente = ? WHERE id_cliente = ?";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $novoCliente);
            $stmt->bindValue(2, $id_cliente);

            $stmt->execute();

            return ($stmt->rowCount() > 0) ? 'Cliente Atualizado' : 'Nenhum cliente encontrado para atualizar';
        } catch (Exception $ex) {
            return 'Erro ao atualizar cliente: ' . $ex->getMessage();
        }
    }
}
