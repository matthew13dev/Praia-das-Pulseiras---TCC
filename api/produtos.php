<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../model/Produto.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$produtoModel = new Produto();
$server = $_SERVER["REQUEST_METHOD"];


switch ($server) {
    case "GET":
        $produtos = $produtoModel->listarTodosProdutos();
        break;

    case "POST":
        $json = file_get_contents("php://input");
        if (empty($json)) {
            http_response_code(400);
            echo json_encode(['error' => 'Nenhum dado recebido']);
            exit;
        }

        $data = json_decode($json, true);
        if (empty($data->nome) || empty($data->preco) || empty($data->quantidade)) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Dados incompletos"]);
            break;
        }

        $novoProduto  = $produtoModel->adicionar($data->nome, $data->descricao, $data->quantidade, $data->preco);

        // Retornar sucesso
        if ($novoProduto) {
            http_response_code(201);
            echo json_encode(["success" => true, "message" => "Produto criado com sucesso", "id" => $novoProduto]);
        } else {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => "Erro ao criar produto"]);
        }

        break;


    case "OPTIONS":
        // Para requisições de preflight CORS
        http_response_code(200);
        break;

    default:
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Método não permitido"]);
        break;
}


header('Content-Type: application/json');
echo json_encode($produtos);
