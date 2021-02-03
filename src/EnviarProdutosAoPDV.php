<?php

namespace GerenciadorFrenteDeLoja;

use InvalidArgumentException;

class EnviarProdutosAoPDV
{
    protected array $listaProdutos = [];

    /**
     * @param Produto $produto
     */
    public function adicionar(Produto $produto)
    {
        array_push($this->listaProdutos, $produto);
    }

    /**
     * @return bool
     */
    public function enviar() : bool
    {
        if (!$this->listaProdutos) {
            throw new InvalidArgumentException('Não á produtos a serem enviados.');
        }
        // Envia para a fila
        return true;
    }
}
