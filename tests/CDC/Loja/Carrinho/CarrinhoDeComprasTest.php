<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase,
    CDC\Loja\Carrinho\CarrinhoDeCompras,
    CDC\Loja\Carrinho\MaiorPreco;

use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasTest extends TestCase
{
    private $carrinho;

    protected function setUp() :void {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(0, $valor, 'null', 0.0001);
    }

    public function testDeveRetornarValorSeCarrinhoEstiver1Item()
    {
      
        $this->carrinho->adiciona(new Produto ("Geladeira", 1 , 900.00));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(900.00, $valor, 'null', 0.00001);
        
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosItems()
    {
      
        $this->carrinho->adiciona(new Produto ("Geladeira", 1 , 900.00));
        $this->carrinho->adiciona(new Produto ("Fogão", 1 , 1500.00));
        $this->carrinho->adiciona(new Produto ("Maquina de Lavar", 1 , 750.00));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1500.00, $valor, 'null', 0.00001);
    }
}
