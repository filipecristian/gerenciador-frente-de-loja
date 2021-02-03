<?php

use GerenciadorFrenteDeLoja\EnviarProdutosAoPDV;
use GerenciadorFrenteDeLoja\Produto;
use GerenciadorFrenteDeLoja\QuantidadeProduto;
use PHPUnit\Framework\TestCase;

class EnviarProdutosAoPDVTest extends TestCase
{
    public function testDeveIntanciaUmObjetoEnviarProdutoAoPDV() : void
    {
        $enviarProdutoAoPDV = new EnviarProdutosAoPDV();
        self::assertTrue(is_object($enviarProdutoAoPDV));
    }

    public function testDeveEnviarProdutoAoPDV() : void
    {
        $mock = Mockery::mock(QuantidadeProduto::class);
        $mock->shouldReceive('retornarQuantidade')
            ->andReturn(6);
        $produto = new Produto('Foo', 12.59, $mock);

        $enviarProdutoAoPDV = new EnviarProdutosAoPDV();
        $enviarProdutoAoPDV->adicionar($produto);
        $resultado = $enviarProdutoAoPDV->enviar();

        self::assertTrue($resultado);
    }

    public function testDeveRetornarErroAoEnviarProdutoAoPDVSemEstaremAdicionadosPreviamente() : void
    {
        self::expectException(InvalidArgumentException::class);
        $enviarProdutoAoPDV = new EnviarProdutosAoPDV();
        $enviarProdutoAoPDV->enviar();
    }
}
