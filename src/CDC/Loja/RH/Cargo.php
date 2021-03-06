<?php

namespace CDC\Loja\RH;

class cargo
{

  private $cargos = array(
    'desenvolvedor' => 'CDC\Loja\RH\DezOuVintePorCento',
    'dba' => 'CDC\Loja\RH\QuinzeOuVinteECincoPorCento',
    'testador' => 'CDC\Loja\RH\QuinzeOuVinteECincoPorCento'
  );
  
  private $regra;

  public function __construct($regra)
  {
    if (array_key_exists($regra, $this->cargos)) {
      $this->regra = $this->cargos[$regra];
    } else {
      throw new \RuntimeException('Cargo invalido');
    }
  }

  public function getRegra()
  {
    return new $this->regra();
  }

}