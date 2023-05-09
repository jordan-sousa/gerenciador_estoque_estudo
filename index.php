<?php

    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root."/gerenciador_de_estoque/controllers/ProdutoController.php";
    $produto = new ProdutoController();
    $produtos = $produto->listar();
    $encontraProduto = null;

    if (isset($_GET['codigo'])) {
        $encontraProduto = $produto->encontrar($_GET['codigo']);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerenciador de estoque</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body class=" bg-dark-subtle">
    <div class="container">
        <h1 class="text-center mb-3">Gerenciador de Estoque</h1>
        <?php if ($encontraProduto) {?>
            <form action="./routes/atualizar_route.php?codigo=<?=@$encontraProduto['codigo']?>" method="post" name="formulario" class="offset-md-4">
        <?php } else {?>
            <form action="./routes/cadastrar_route.php" method="post" name="formulario" class="offset-md-4">
        <?php }?>
            <div class="mb-3 row">
                <label for="codigo" class="col-sm-3 col-form-label">Código do Produto:</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="codigo" value="<?=@$encontraProduto['codigo']?>" name="codigo">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="produto" class="col-sm-3 col-form-label">Nome do Produto:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="produto" value="<?=@$encontraProduto['nome']?>" name="nome">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="preco" class="col-sm-3 col-form-label">Preço:</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="preco" value="<?=@$encontraProduto['preco']?>" name="preco">
                </div>
            </div>
            <div class="mt-5">

                <button type="submit" class="btn btn-secondary">
                    <?php if ($encontraProduto) {?>
                        Atualizar
                    <?php } else {?>
                        Cadastrar
                    <?php }?>
                </button>

                <!-- <button type="submit" class="btn btn-secondary">Atualizar</button> -->

                <!-- <button type="submit" class="btn btn-secondary">Excluir</button> -->

                <button type="submit" class="btn btn-secondary">Limpar</button>
            
            </div>
        </form>
    </div>  
     
    <div class="container" style="margin-top: 5rem;">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($produtos as $key => $produto) {
                ?>
                <tr>
                    <td><?=$produto['codigo']?></td> 
                
                    <td><?=$produto['nome']?></td> 
                
                    <td><?=$produto['preco']?></td> 
                    <td>
                        <a href="http://localhost/gerenciador_de_estoque/index.php?codigo=<?=$produto['codigo']?>" class="btn btn-info">
                            Editar
                        </a>
                        <a href="./routes/excluir_route.php?codigo=<?=$produto['codigo']?>" class="btn btn-danger">
                            Excluir
                        </a>
                    </td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>