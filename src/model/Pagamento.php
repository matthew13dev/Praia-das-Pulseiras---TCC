<?php
require_once "./ENUMS/MetodoPagamentoEnum.php";
require_once "./ENUMS/StatusPagamentoEnum.php";
class Pagamento
{
    public $id;
    public MetodoPagamentoEnum $metodoPagamento;
    public StatusPagamentoEnum $statusPagamento;
    public $valorTotal;
    public $data_preocessamento;

    //----Getters and Setters------------
    //id
    public function getId()
    {
        return $this->id;
    }

    //metodo de pagamento
    public function getMetodoPagamento()
    {
        return $this->metodoPagamento;
    }

    public function setMetodoPagamento(MetodoPagamentoEnum $metodoPagamento)
    {
        $this->metodoPagamento = $metodoPagamento;
    }

    //status do pagamento

    public function getStatusPagamento()
    {
        return $this->statusPagamento;
    }
    public function setStatusPagamento(StatusPagamentoEnum $statusPagamento)
    {
        $this->statusPagamento = $statusPagamento;
    }


    //valor total do pedido
    public function getValorTotal()
    {
        return $this->valorTotal;
    }
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    //data do processamento
    public function getDataProcessamento()
    {
        return $this->data_preocessamento;
    }
    public function setDataProcessamento(DateTime $data)
    {
        $this->data_preocessamento = $data;
    }
}
