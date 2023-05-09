<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root."/gerenciador_de_estoque/models/Produto.php";

    class ProdutoController {
        private $produtoModel = null;

        public function __construct() {
            $this->produtoModel = new Produto();
        }

        public function cadastrar($produto){
            $this->produtoModel->addProduto($produto['codigo'], $produto['nome'], $produto['preco']);
        }

        public function excluir($codigo){
            $this->produtoModel->delete($codigo);
        }

        public function listar(){
            return $this->produtoModel->getProdutos();
        }

        public function encontrar($codigo){
            $produto = $this->produtoModel->encontrar($codigo);
            return $produto;
        }

        public function editarProduto($codigo, $dados)
        {
            // var_dump($dados);die;
            return $this->produtoModel->editarProduto($codigo, $dados);
        }

    }
?>