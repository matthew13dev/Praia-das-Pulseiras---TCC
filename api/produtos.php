<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../model/Produto.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, UPDATE, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$produtoModel = new Produto();
$server = $_SERVER["REQUEST_METHOD"];

function sendResponse($success, $message = '', $data = [])
{
    http_response_code($success ? 200 : 400);
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}


switch ($server) {
    case "GET":
        $produtos = $produtoModel->listarTodosProdutos();
        break;

    case "POST":
        $json = file_get_contents("php://input");
        error_log("Dados recebidos: " . $json);

        if (empty($json)) {
            sendResponse(false, "nenhum dado recebido");
        }

        $data = json_decode($json, true);

        $required = ['nome', 'preco', 'quantidade'];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                sendResponse(false, "Campo obrigatorio faltando: ", $field);
            }
        }


        $novoProduto  = $produtoModel->adicionar(
            $data["nome"],
            $data["descricao"],
            $data["quantidade"],
            $data["preco"]
        );
        // Retornar sucesso
        if ($novoProduto) {
            sendResponse(true, "Produto criado com sucesso", ["id" => $novoProduto]);
        } else {
            sendResponse(false, "erro ao criar produto");
        }

        break;


    case "UPDATE":
        $json = file_get_contents("php://input");
        error_log("Dados recebidos: " . $json);

        if (empty($json)) {
            sendResponse(false, "nenhum dado recebido");
        }

        $data = json_decode($json, true);

        $atualizarProduto = $produtoModel->atualizarProduto(
            $data['id'],
            $data["nome"],
            $data["descricao"],
            $data["quantidade"],
            $data["preco"],
            $data["imagem"]
        );

        // Retornar sucesso
        if ($atualizarProduto) {
            sendResponse(true, "Produto atualizado com sucesso", ["id" => $atualizarProduto]);
        } else { // Retornar falha

            sendResponse(false, "erro ao atualizar produto");
        }

        break;

    case "DELETE":
        //Receber dados
        $json = file_get_contents("php://input");

        //Debug
        error_log("Dados recebidos apa o DELETE: " . $json);

        if (empty($json)) {
            sendResponse(false, "Nenhum dado recebido");
        }

        $data = json_decode($json, true);

        if (!isset($data['id']) || empty($data['id'])) {
            sendResponse(false, "ID do produto não informado");
            exit;
        }



        $deletado = $produtoModel->excluir($data["id"]);

        // Retornar resposta
        if ($deletado) {
            sendResponse(true, "Produto Deletado com sucesso", ["id" => $data["id"]]);
        } else {

            sendResponse(false, "erro ao deletar produto", $deletado);
        }

        break;

    default:
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Método não permitido"]);
        break;
}


header('Content-Type: application/json');
echo json_encode($produtos);
