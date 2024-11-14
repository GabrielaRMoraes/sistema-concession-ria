<?php

include '../model/conexao.php';
include '../model/alocacao.class.php';
include '../control/controller.php';

$c = new Controller();
$c->cadastrar();

if ($c->cadastroAlocacao) echo $c->cadastroAlocacao;

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Alocação</title>
  <link rel="stylesheet" href="..\css\style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
  <form method="POST">
    <section>
      <h1><strong>Cadastro de Alocação</strong></h1>
      <hr>

      <p><input type="text" name="id_alocacao" placeholder="Digite o ID da Alocação" required /></p>
      <p><input type="text" name="area_alocacao" placeholder="Digite a Área de Alocação" required /></p>
      <p><input type="number" name="quantidade_alocacao" placeholder="Digite a Quantidade de Alocação" required /></p>

      <p><button name="cadastrar_alocacao" type="submit">Cadastrar Alocação</button></p>
    </section>
  </form>
</body>

</html>