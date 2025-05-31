<?php
require_once './../src/model/Produto.php';

$produtoModel = new Produto();
$produtos = $produtoModel->listarTodosProdutos();

header('Content-Type: application/json');
echo json_encode($produtos);
