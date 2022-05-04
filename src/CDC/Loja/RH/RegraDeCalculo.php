<?php 

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

abstract class RegraDeCalculo
{
  public function calcula(Funcionario $funcionario){
    $salario = $funcionario->getSalario();
    if($salario > $this->limite()){
      return $salario * $this->porcentagemACimaDoLimite();
    }
    return $salario * $this->porcentagemBase();
  }

  protected function limite() {}
  
  protected function porcentagemACimaDoLimite(){}

  protected function porcentagemBase(){}

}