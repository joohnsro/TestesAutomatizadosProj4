<?php

namespace JSRO\Fields;


class TextareaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeAtributosSaoDoTipoCorreto()
    {
        $textarea = new Textarea();
        $textarea->setId(1);
        $textarea->setName(123);
        $textarea->setClass(false);
    }

    public function testVerificaFuncionamentoDoSetEGetId()
    {
        $textarea = new Textarea();
        $textarea->setId("id");

        $this->assertEquals("id", $textarea->getId());
    }

    public function testVerificaFuncionamentoDoSetEGetName()
    {
        $textarea = new Textarea();
        $textarea->setName("nome");

        $this->assertEquals("nome", $textarea->getName());
    }

    public function testVerificaFuncionamentoDoSetEGetClass()
    {
        $textarea = new Textarea();
        $textarea->setClass("form-control");

        $this->assertEquals("form-control", $textarea->getClass());
    }

    public function testVerificaFuncionamentoDoSetEGetValue()
    {
        $textarea = new Textarea();
        $textarea->setValue("valor");

        $this->assertEquals("valor", $textarea->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeALabelRecebeuVariavelDoTipoCorreto()
    {
        $textarea = new Textarea();

        $label = array("foo");
        $textarea->adicionaLabel($label);
    }

    public function testVerificaSeGetFieldEstaFuncionandoCorretamente()
    {
        $textarea = new Textarea();
        $textarea->setId("textarea");
        $textarea->setName("textareaTeste");
        $textarea->setClass("classe");
        $textarea->setValue("valor");

        $expected = "<textarea id='textarea' name='textareaTeste' class='form-control classe' rows='3'>valor</textarea>";

        $this->expectOutputString($expected);

        $textarea->getField();
    }

}