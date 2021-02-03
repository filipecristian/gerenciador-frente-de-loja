<?php

use GerenciadorFrenteDeLoja\QuantidadeProduto;
use PHPUnit\Framework\TestCase;

use GerenciadorFrenteDeLoja\Produto;

class ProdutoTest extends TestCase
{
    protected $quantidadeProdutoMock;

    protected function setUp(): void
    {
        parent::setUp();
        $mock = Mockery::mock(QuantidadeProduto::class);
        $mock->shouldReceive('retornarQuantidade')
            ->andReturn(10);
        $this->quantidadeProdutoMock = $mock;
    }

    protected function tearDown() : void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testDeveInstanciarUmOjetoDeProduto() : void
    {
        $produto = new Produto('Foo', 12.58, $this->quantidadeProdutoMock);
        self::assertTrue(is_object($produto));
    }

    public function testDeveCadastrarUmProdutoComSucesso() : void
    {
        $produto = new Produto('Farinha de Trigo', 5.99, $this->quantidadeProdutoMock);
        self::assertTrue($produto->cadastrar());
    }

    public function testDeveRetornarExcessaoAoCadastrarSemDescricao() : void
    {
        self::expectException(InvalidArgumentException::class);
        $mock = Mockery::mock(QuantidadeProduto::class);
        $mock->shouldNotReceive('retornarQuantidade');

        new Produto('', 5.99, $mock);
    }

    public function testDeveRetornarExcessaoAoCadastrarComValorUnitarioZerado() : void
    {
        self::expectException(InvalidArgumentException::class);
        $mock = Mockery::mock(QuantidadeProduto::class);
        $mock->shouldNotReceive('retornarQuantidade');

        new Produto('Foo', 0, $mock);
    }
}
