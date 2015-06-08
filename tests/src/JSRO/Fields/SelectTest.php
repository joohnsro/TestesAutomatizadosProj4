<?php

namespace JSRO\Fields;


class SelectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeAtributosSaoDoTipoCorreto()
    {
        $select = new Select();
        $select->setId(1);
        $select->setName(12);
        $select->setClass(13);
        $select->setOptions(false);
    }

    public function testVerificaFuncionamentoDoSetEGetId()
    {
        $select = new Select();
        $select->setId("id");

        $this->assertEquals("id", $select->getId());
    }

    public function testVerificaFuncionamentoDoSetEGetName()
    {
        $select = new Select();
        $select->setName("nome");

        $this->assertEquals("nome", $select->getName());
    }

    public function testVerificaFuncionamentoDoSetEGetClass()
    {
        $select = new Select();
        $select->setClass("form-control");

        $this->assertEquals("form-control", $select->getClass());
    }

    public function testVerificaFuncionamentoDoSetEGetOptions()
    {
        $select = new Select();
        $select->setOptions(array("opt1", "opt2"));

        $this->assertEquals(array("opt1", "opt2"), $select->getOptions());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeALabelRecebeuVariavelDoTipoCorreto()
    {
        $select = new Select();

        $label = array("foo");
        $select->adicionaLabel($label);
    }

    public function testVerificaSeGetFieldEstaFuncionandoCorretamente()
    {
        $select = new Select();
        $select->setId("select");
        $select->setName("selectTeste");
        $select->setClass("classe");
        $select->setOptions([]);

        $expected = "<select id='select' name='selectTeste' class='form-control classe'></select>";

        $this->expectOutputString($expected);

        $select->getField();
    }

} 