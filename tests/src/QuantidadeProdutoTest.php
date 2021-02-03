<?php

use GerenciadorFrenteDeLoja\QuantidadeProduto;
use PHPUnit\Framework\TestCase;

class QuantidadeProdutoTest extends TestCase
{
    public function testDeveInstanciaObjetoQuantideProduto() : void
    {
        $quantidadeProduto = new QuantidadeProduto(10);
        self::assertTrue(is_object($quantidadeProduto));
    }

    public function testDeveRetornarErroSeQuantidadeForMenorQueCinco() : void
    {
        self::expectException(InvalidArgumentException::class);
        new QuantidadeProduto(4);
    }

    public function testDeveRetornarErroSeQuantidadeForNegativa() : void
    {
        self::expectException(InvalidArgumentException::class);
        new QuantidadeProduto(-4);
    }
}
