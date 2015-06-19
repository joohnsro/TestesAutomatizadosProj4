<?php

namespace JSRO\Fields;


class InputTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeGetFieldPassaAlert()
    {
        $input = new Input();
        $input->setName("nome");
        $this->assertEquals('<input type="" id="" name="nome" class="" value="" ><p class="text-danger">O campo nome está em branco.</p>', $input->getField('alert'));

        $input->setName("valor");
        $this->assertEquals('<input type="" id="" name="valor" class="" value="" ><p class="text-danger">O campo valor precisa ser númerico. (Ex.: 00.00).</p>', $input->getField('alert'));
    }

    public function testVerificaSeRetornaOInputCorretamente()
    {
        $input = new Input();
        $this->assertEquals('<input type="" id="" name="" class="" value="" >', $input->getField());
    }

    public function testVerificaSeOsDadosForamInseridos()
    {
        $input = new Input();
        $input->setType("text");
        $input->setId("inputUsuario");
        $input->setName("usuario");
        $input->setClass("form-control");
        $input->setProtected("protected");
        $input->setLabel("Usuário");
        $input->setAlert("Erro no field.");
        $input->setValue("valor");

        $this->assertEquals("text", $input->getType());
        $this->assertEquals("inputUsuario", $input->getId());
        $this->assertEquals("usuario", $input->getName());
        $this->assertEquals("form-control", $input->getClass());
        $this->assertEquals("protected", $input->getProtected());
        $this->assertEquals("Usuário", $input->getLabel());
        $this->assertEquals("Erro no field.", $input->getAlert());
        $this->assertEquals("valor", $input->getValue());
    }

} 