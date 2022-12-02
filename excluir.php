<?php
    require_once("conexao.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM contribuinte WHERE idContribuinte=:id";

    $comando = $conexao->prepare($sql);
    $comando->bindValue(":id", $id);
    $comando->execute();

    header("Location: index.php");
?>