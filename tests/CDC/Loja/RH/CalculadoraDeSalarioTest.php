<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";


use PHPUnit\Framework\TestCase;
use CDC\Loja\RH\Funcionario,
    CDC\Loja\RH\TabelaCargos,
    CDC\Loja\RH\CalculadoraDeSalario;

class CalculadoraDeSalarioTest extends TestCase
{
    public function testDesenvolvedoresComSalarioABaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 1500, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.0 * 0.9, $salario, 'null', 0.00001);
    }

    public function testDesenvolvedoresComSalarioACimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 4000, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000.0 * 0.8, $salario, 'null', 0.00001);
    }

    public function testDBAComSalarioABaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Andre", 500, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(500.0 * 0.85, $salario, 'null', 0.00001);
    }
}
