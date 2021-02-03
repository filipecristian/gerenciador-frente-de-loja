<?php

namespace GerenciadorFrenteDeLoja;

class QuantidadeProduto
{
    private int $quantidade = 0;

    /**
     * QuantidadeProduto constructor.
     * @param int $quantidade
     */
    public function __construct(int $quantidade)
    {
        $quantidadeMinima = $this->buscarQuantidadeMinima();
        if ($quantidade < $quantidadeMinima) {
            throw new \InvalidArgumentException(sprintf('A quantidade minima deve ser %s', $quantidadeMinima));
        }
        $this->quantidade = $quantidade;
    }

    public function buscarQuantidadeMinima() : int
    {
        // Buscar Quantidade Mínima do Banco por exemplo.
        return 5;
    }

    public function retornarQuantidade() : int
    {
        return $this->quantidade;
    }
}
