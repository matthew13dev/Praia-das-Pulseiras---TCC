<?php

class Produto
{
    public $id;
    public $nome;
    public $descricao;
    public $quantidade_estoque;
    public $preco;
    public $idAdmin;
    public $imagem;
    public $data_cadastro;

    //Métodos 

    //adicionar
    public function adicionar($nome, $descricao, $quantidade_estoque, $preco, $imagem) {}


    //excluir
    public function excluir($id) {}
    //buscar

    public function buscar($id) {}
    //listar
    public function listarProdutos() {
        
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

    //id admin
    public function getIdAdmin()
    {
        return $this->idAdmin;
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
    //data cadastro
    public function getDataCadastro()
    {
        return $this->data_cadastro;
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
