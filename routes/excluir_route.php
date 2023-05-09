<?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root."/gerenciador_de_estoque/controllers/ProdutoController.php";

    $codigo = $_GET['codigo'];
    $produto = new ProdutoController();

    $produto->excluir($codigo);

    header("Location: http://localhost/gerenciador_de_estoque/index.php");
?>