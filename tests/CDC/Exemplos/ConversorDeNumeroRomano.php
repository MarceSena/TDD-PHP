<?php 

namespace CDC\Exemplos;

class ConversorDeNumeroRomano 
{

    protected $tabela = array(
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    );

    public function converte($numeroEmRomano)
    {
        $acomulador = 0;
        $ultimoVisinhoDaDireita = 0;

        for ($i = strlen($numeroEmRomano) - 1; $i >= 0;  $i--) {
            
            $atual = 0;
            $numCorrente = $numeroEmRomano[$i];

            if (array_key_exists($numCorrente, $this->tabela)) {
               $atual = $this->tabela[$numCorrente];
            }

            $multplicador = 1;
            if($atual < $ultimoVisinhoDaDireita){
                $multplicador = -1;
            }

            $acomulador += ($atual * $multplicador);

            $ultimoVisinhoDaDireita = $atual;
        }

        return $acomulador;
    }
}
