<?php

namespace GerenciadorFrenteDeLoja;

class Produto
{
    protected string $descricao;
    protected float $valorUnitario;
    protected int $quantidade;

    /**
     * Produto constructor.
     * @param string $descricao
     * @param float $valorUnitario
     * @param QuantidadeProduto $quantidadeProduto
     */
    public function __construct(string $descricao, float $valorUnitario, QuantidadeProduto $quantidadeProduto)
    {
        if (!$descricao || $valorUnitario <= 0) {
            throw new \InvalidArgumentException('Faltam dados obrigatório no produto.');
        }
        $this->descricao = $descricao;
        $this->valorUnitario = $valorUnitario;
        $this->quantidade = $quantidadeProduto->retornarQuantidade();
    }


    public function cadastrar() : bool
    {
        // Insere no banco
        return true;
    }
}
