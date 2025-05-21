<?php

require_once "./src/model/Produto.php";
class ProdutoController
{


    public function exibirCatalogo()
    {


        $produtoModel = new Produto();
        $produtos = $produtoModel->listarTodosProdutos();

        require __DIR__ . "/../view/CatalogoView.php";
    }
}
