<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Pedido;
use DateTime;
use CDC\Loja\Tributos\TabelaInterface;


class GeradorDeNotaFiscal
{
  private $acoes;
  private $tabela;

  public function __construct($acoes, TabelaInterface $tabela) 
  {
    $this->acoes = $acoes;
    $this->tabela = $tabela;
  }

  public function gera(Pedido $pedido)
  {

    $valorTabela = $this->tabela->paraValor(
      $pedido->getValorTotal());
    $valorTotal = $pedido->getValorTotal() * $valorTabela;
    
    $nf = new NotaFiscal(
      $pedido->getCliente(),
      $valorTotal,
      new DateTime()
    );

    foreach ($this->acoes as $acao) {
      $acao->executa($nf);
    }

    return $nf;
  }
}