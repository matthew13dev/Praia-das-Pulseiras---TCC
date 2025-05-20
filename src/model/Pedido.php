<?php

use DateTime;

class Pedido
{
    private ?int $id;
    private int $clienteId;
    private DateTime $data;
    private string $status;
    private float $valorTotal;
    private ?int $pagamentoId;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClienteId(): int
    {
        return $this->clienteId;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function getPagamentoId(): ?int
    {
        return $this->pagamentoId;
    }

    // Setters
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setClienteId(int $clienteId): void
    {
        $this->clienteId = $clienteId;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setValorTotal(float $valorTotal): void
    {
        if ($valorTotal < 0) {
            throw new \InvalidArgumentException("Valor total não pode ser negativo");
        }
        $this->valorTotal = $valorTotal;
    }

    public function setPagamentoId(?int $pagamentoId): void
    {
        $this->pagamentoId = $pagamentoId;
    }

    // Método utilitário
    public function getDataFormatada(string $format = 'd/m/Y H:i:s'): string
    {
        return $this->data->format($format);
    }
}
