<?php
    require_once("conexao.php");

    $nome = $_POST["txtpessoa"];
    $valor_contribuicao = $_POST["txtvalor"];

    $sql = "INSERT INTO contribuinte VALUES(0, :nome, :valor_contribuicao)";

    $comando = $conexao->prepare($sql);

    $comando->bindValue(":nome", $nome);
    $comando->bindValue(":valor_contribuicao", $valor_contribuicao);

    $comando->execute();

    header("Location: index.php");
?>