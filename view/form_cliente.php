<?php

include '../model/conexao.php';
include '../model/cliente.class.php';
include '../control/controller.php';

$c = new Controller();
$c->cadastrar();

if ($c->cadastroCliente) echo $c->cadastroCliente;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>

<body>
    <form method="POST">
        <section>
            <h1><strong>Cadastro de Cliente</strong></h1>
            <link rel="stylesheet" href="..\css\style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
            <hr>

            <p><input type="text" name="id_cliente" placeholder="Digite o ID do Cliente" required /></p>
            <p><input type="text" name="nome_cliente" placeholder="Digite o Nome do Cliente" required /></p>

            <p><button name="cadastrar_cliente" type="submit">Cadastrar Cliente</button></p>
        </section>
    </form>
</body>

</html>