<?php

include '../model/conexao.php';
include '../model/venda.class.php';
include '../control/controller.php';

$c = new Controller();
$c->cadastrar();

if ($c->cadastroVenda) echo $c->cadastroVenda;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Venda</title>
</head>

<body>
    <form method="POST">
        <section>
            <h1><strong>Cadastro de Venda</strong></h1>
            <link rel="stylesheet" href="..\css\style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
            <hr>

            <p><input type="text" name="id_venda" placeholder="Digite o ID da Venda" required /></p>
            <p><input type="date" name="data_venda" placeholder="Digite a Data da Venda" required /></p>
            <p><input type="text" name="fk_id_automovel" placeholder="Digite o ID do Automóvel" required /></p>

            <p><button name="cadastrar_venda" type="submit">Cadastrar Venda</button></p>
        </section>
    </form>
</body>

</html>