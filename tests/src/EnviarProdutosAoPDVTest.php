<?php

use GerenciadorFrenteDeLoja\EnviarProdutoAoPDV;
use PHPUnit\Framework\TestCase;

class EnviarProdutoAoPDVTest extends TestCase
{
    public function testDeveIntanciaUmObjetoEnviarProdutoAoPDV()
    {
        $enviarProdutoAoPDV = new EnviarProdutoAoPDV();
        self::assertTrue(is_object($enviarProdutoAoPDV));
    }
}
