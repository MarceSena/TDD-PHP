<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase,
    CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;

use CDC\Loja\Tributos\TabelaInterface;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function testDeveGerarNFComValorDeImpostoDescontado()
    {
        $tabela = $this->createMock(TabelaInterface::class);

        $acao1 = $this->createMock(AcaoAposGerarNotaInterface::class);
        $acao1->method('executa')
            ->willReturn(true);
        
        $acao2 =$this->createMock(AcaoAposGerarNotaInterface::class);
        $acao2->method('executa')
            ->willReturn(true);

        $gerador = new GeradorDeNotaFiscal(array($acao1, $acao2),  $tabela);
        $pedido = new Pedido('Andre', 1000, 1);

        $nf = $gerador->gera($pedido);
        
        $this->assertTrue($acao1->executa($nf));
        $this->assertTrue($acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class, $nf);
    }

    // public function testDeveConsultarATableaParaCalcularValor()
    // {
    //     $tabela = $this->createMock(TabelaInterface::class);
    //     // $tabela->shouldBeCalled('paraValor')
    //     // ->with(1000.0)->willReturn(0.2);

    // }
}
