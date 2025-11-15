<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Receitas</title>
    <!--Importação do Boostrap. Referência encontrada nos documentos do Bootstrap.-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <?php 
        // Carregamento do arquivo JSON com as receitas
        $receitas_json = json_decode(file_get_contents("data/receitas.json"), true);
    ?>