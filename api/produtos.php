<?php
require_once '../model/Produto.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST");

$produtoModel = new Produto();
$server = $_SERVER["REQUEST_METHOD"];


switch ($server) {
    case "GET":
        $produtos = $produtoModel->listarTodosProdutos();
        break;

    case "POST":
        break;
}


header('Content-Type: application/json');
echo json_encode($produtos);
