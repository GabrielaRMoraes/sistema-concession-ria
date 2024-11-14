<?php

include '../model/conexao.php';
include '../model/automovel.class.php';
include '../control/controller.php';

$c = new Controller();
$c->cadastrar();

if ($c->cadastroAutomovel) echo $c->cadastroAutomovel;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Automóvel</title>
    <link rel="stylesheet" href="..\css\style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <form method="POST">
        <section>
            <h1><strong>Cadastro de Automóvel</strong></h1>
            <hr>

            <p><input type="text" name="id_automovel" placeholder="Digite o ID do Automóvel" required /></p>
            <p><input type="text" name="modelo_automovel" placeholder="Digite o Modelo do Automóvel" required /></p>
            <p><input type="number" name="preco_automovel" placeholder="Digite o Preço do Automóvel" required /></p>

            <p><button name="cadastrar_automovel" type="submit">Cadastrar Automóvel</button></p>
        </section>
    </form>
</body>

</html>