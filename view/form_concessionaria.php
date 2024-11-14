<?php

include '../model/conexao.php';
include '../model/concessionaria.class.php';
include '../control/controller.php';

$c = new Controller();
$c->cadastrar();

if ($c->cadastroConcessionaria) echo $c->cadastroConcessionaria;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Concessionária</title>
</head>

<body>
    <form method="POST">
        <section>
            <h1><strong>Cadastro de Concessionária</strong></h1>
            <link rel="stylesheet" href="..\css\style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
            <hr>

            <p><input type="text" name="id_concessionaria" placeholder="Digite o ID da Concessionária" required /></p>
            <p><input type="text" name="concessionaria" placeholder="Digite o Nome da Concessionária" required /></p>

            <p><button name="cadastrar_concessionaria" type="submit">Cadastrar Concessionária</button></p>
        </section>
    </form>
</body>

</html>