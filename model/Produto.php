<?php
require_once __DIR__ . './../config/ConexaoBD.php';
class Produto
{

    private $pdo;
    public $id;
    public $nome;
    public $descricao;
    public $quantidade_estoque;
    public $preco;
    public $imagem;


    public function __construct()
    {
        $conexaoPDO = new ConexaoBD();
        $this->pdo = $conexaoPDO->conectar();
    }
    //Métodos 

    //adicionar
    public function adicionar($nome, $descricao, $quantidade_estoque, $preco, $imagem = "./images/default.jpg")
    {
        try {

            $sql = "INSERT INTO 
            produto(nome,descricao,quantidade_estoque,preco,imagem) 
            VALUES (:nome,:descricao,:quantidade_estoque,:preco,:imagem)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":quantidade_estoque", $quantidade_estoque);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":imagem", $imagem);

            return $stmt->execute();
        } catch (PDOException $e) {

            error_log("Erro ao adicionar produto: " . $e->getMessage());
            return false;
        }

        return true;
    }


    //excluir
    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM produto WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);


            if ($stmt->execute()) {
                return $stmt->rowCount() > 0;
            }
            return false;
        } catch (PDOException $e) {
            error_log("Erro ao deletar o produto ID: {$id}" . $e->getMessage());
            return false;
        }
    }



    //listar todos os produtos
    public function listarTodosProdutos()
    {
        try {
            $sql = "SELECT * FROM produto";
            $stmt = $this->pdo->query($sql);

            if ($stmt ===  false) {
                throw new PDOException("Falha ao preparar consulta.");
            }

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos ?: [];
        } catch (PDOException $e) {
            error_log("Erro ao listar produtos: " . $e->getMessage());
            return [];
        }
    }



    public function atualizarProduto($id, $nome, $descricao, $quantidade_estoque, $preco, $imagem)
    {
        try {
            $sql = "UPDATE produto SET 
                nome = :nome,
                descricao = :descricao,
                quantidade_estoque = :quantidade_estoque,
                preco = :preco,
                imagem = :imagem
                WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':quantidade_estoque', $quantidade_estoque, PDO::PARAM_INT);
            $stmt->bindParam(':preco', $preco); // Pode usar PDO::PARAM_STR para valores decimais
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);

            // Executa e verifica se atualizou algum registro
            if ($stmt->execute()) {
                return ($stmt->rowCount() > 0); // Retorna true se atualizou algum registro
            }

            return false;
        } catch (PDOException $e) {
            error_log("Erro ao atualizar produto ID {$id}: " . $e->getMessage());
            return false;
        }
    }



    //-----Getters and Setters-----

    //id
    public function getId()
    {
        return $this->id;
    }

    //descricao
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    //quantidade
    public function getQuantidade()
    {
        return $this->quantidade_estoque;
    }
    public function setQuantidade($quantidade_estoque)
    {
        $this->quantidade_estoque = $quantidade_estoque;
    }

    //preco
    public function getPreco()
    {
        return $this->preco;
    }
    public function setValor($preco)
    {
        $this->preco = $preco;
    }


    //nome
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    //imagem
    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
}
