<?php

class Controller
{
    public $cadastroIndex = false;
    public $loginIndex = false;
    public $cadastroAlocacao = false;
    public $cadastroAutomovel = false;
    public $cadastroCliente = false;
    public $cadastroConcessionaria = false;
    public $cadastroVenda = false;

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // Alocação
            if (isset($_POST['cadastrar_alocacao'])) {
                $id_alocacao = $_POST['id_alocacao'];
                $area_alocacao = $_POST['area_alocacao'];
                $quantidade_alocacao = $_POST['quantidade_alocacao'];
                $alocacao = new Alocacao();
                $this->cadastroAlocacao = $alocacao->adicionaAlocacao($id_alocacao, $area_alocacao, $quantidade_alocacao)
                    ? "Alocação cadastrada com sucesso!"
                    : "Erro ao cadastrar alocação.";
            }

            // Automóvel
            if (isset($_POST['cadastrar_automovel'])) {
                $id_automovel = $_POST['id_automovel'];
                $modelo_automovel = $_POST['modelo_automovel'];
                $preco_automovel = $_POST['preco_automovel'];
                $automovel = new Automovel();
                $this->cadastroAutomovel = $automovel->adicionaAutomovel($id_automovel, $modelo_automovel, $preco_automovel)
                    ? "Automóvel cadastrado com sucesso!"
                    : "Erro ao cadastrar automóvel.";
            }

            // Cliente
            if (isset($_POST['cadastrar_cliente'])) {
                $id_cliente = $_POST['id_cliente'];
                $nome_cliente = $_POST['nome_cliente'];
                $cliente = new Cliente();
                $this->cadastroCliente = $cliente->adicionaCliente($id_cliente, $nome_cliente)
                    ? "Cliente cadastrado com sucesso!"
                    : "Erro ao cadastrar cliente.";
            }

            // Concessionária
            if (isset($_POST['cadastrar_concessionaria'])) {
                $id_concessionaria = $_POST['id_concessionaria'];
                $concessionaria = $_POST['concessionaria'];
                $concessionariaObj = new Concessionaria();
                $this->cadastroConcessionaria = $concessionariaObj->adicionaConcessionaria($id_concessionaria, $concessionaria)
                    ? "Concessionária cadastrada com sucesso!"
                    : "Erro ao cadastrar concessionária.";
            }

            // Venda
            if (isset($_POST['cadastrar_venda'])) {
                $id_venda = $_POST['id_venda'];
                $data_venda = $_POST['data_venda'];
                $fk_id_automovel = $_POST['fk_id_automovel'];
                $venda = new Venda();
                $this->cadastroVenda = $venda->adicionaVenda($id_venda, $data_venda, $fk_id_automovel)
                    ? "Venda cadastrada com sucesso!"
                    : "Erro ao cadastrar venda.";
            }
        }
    }
}
