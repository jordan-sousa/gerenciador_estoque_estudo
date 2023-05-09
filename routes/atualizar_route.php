<?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root."/gerenciador_de_estoque/controllers/ProdutoController.php";


    $produto = new ProdutoController();
    $produto->editarProduto($_GET['codigo'], $_POST);

    header("Location: http://localhost/gerenciador_de_estoque/index.php");


?>