<?php

namespace JSRO\Fields;


class InputTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeAtributosSaoDoTipoCorreto()
    {
        $input = new Input();
        $input->setType(123);
        $input->setId(false);
        $input->setName(1);
        $input->setClass(true);
    }

    public function testVerificaFuncionamentoDoSetEGetType()
    {
        $input = new Input();
        $input->setType("text");

        $this->assertEquals("text", $input->getType());
    }

    public function testVerificaFuncionamentoDoSetEGetId()
    {
        $input = new Input();
        $input->setId("id");

        $this->assertEquals("id", $input->getId());
    }

    public function testVerificaFuncionamentoDoSetEGetName()
    {
        $input = new Input();
        $input->setName("nome");

        $this->assertEquals("nome", $input->getName());
    }

    public function testVerificaFuncionamentoDoSetEGetClass()
    {
        $input = new Input();
        $input->setClass("form-control");

        $this->assertEquals("form-control", $input->getClass());
    }

    public function testVerificaFuncionamentoDoSetEGetValue()
    {
        $input = new Input();
        $input->setValue("valor");

        $this->assertEquals("valor", $input->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeALabelRecebeuVariavelDoTipoCorreto()
    {
        $input = new Input();

        $label = array("foo");
        $input->adicionaLabel($label);
    }

    public function testVerificaSeGetFieldEstaFuncionandoCorretamente()
    {
        $input = new Input();
        $input->setType("text");
        $input->setId("input");
        $input->setName("inputTeste");
        $input->setValue("valor");
        $input->setClass("classe");

        $expected = "<input type='text' id='input' name='inputTeste' value='valor' class='form-control classe'>";

        $this->expectOutputString($expected);

        $input->getField();
    }


}