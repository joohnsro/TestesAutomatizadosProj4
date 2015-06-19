<?php

namespace JSRO\Fields;


class SelectTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeOsDadosForamInseridos()
    {
        $select = new Select();
        $select->setId("selectCat");
        $select->setName("categoria");
        $select->setClass("form-control");
        $select->setProtected("protected");
        $select->setLabel("Categoria");
        $select->setAlert("Erro no field.");

        $this->assertEquals("selectCat", $select->getId());
        $this->assertEquals("categoria", $select->getName());
        $this->assertEquals("form-control", $select->getClass());
        $this->assertEquals("protected", $select->getProtected());
        $this->assertEquals("Categoria", $select->getLabel());
        $this->assertEquals("Erro no field.", $select->getAlert());
    }

    public function testVerificaSeInsereOpcao()
    {
        $select = new Select();
        $select->addOption(array("value"=>"1", "name"=>"categoria1"));

        $this->assertEquals(array(array("value"=>"1", "name"=>"categoria1")), $select->getOptions());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeInsereOpcaoDoTipoCorreto()
    {
        $select = new Select();
        $select->addOption("opcao");
    }

    public function testVerificaSeRetornaOSelectCorretamente()
    {
        $select = new Select();
        $this->assertEquals('<select id="" name="" class="" ></select>', $select->getField());
    }

    public function testVerificaSeGetFieldPassaAlert()
    {
        $select = new Select();
        $select->addOption(array("value" => 1, "name" => "foo"));

        $this->assertEquals('<select id="" name="" class="" ><option value="1">foo</option></select>', $select->getField());
    }

}