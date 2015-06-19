<?php

namespace JSRO\Fields;


class TextareaTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeRetornaOTextareaCorretamente()
    {
        $textarea = new Textarea();
        $this->assertEquals('<textarea id="" name="" class="" rows="" ></textarea>', $textarea->getField());
    }

    public function testVerificaSeOsDadosForamInseridos()
    {
        $textarea = new Textarea();
        $textarea->setId("textareaMsg");
        $textarea->setName("mensagem");
        $textarea->setClass("form-control");
        $textarea->setProtected("protected");
        $textarea->setLabel("Mensagem");
        $textarea->setAlert("Erro no field.");
        $textarea->setValue("valor");
        $textarea->setRows(2);

        $this->assertEquals("textareaMsg", $textarea->getId());
        $this->assertEquals("mensagem", $textarea->getName());
        $this->assertEquals("form-control", $textarea->getClass());
        $this->assertEquals("protected", $textarea->getProtected());
        $this->assertEquals("Mensagem", $textarea->getLabel());
        $this->assertEquals("Erro no field.", $textarea->getAlert());
        $this->assertEquals("valor", $textarea->getValue());
        $this->assertEquals(2, $textarea->getRows());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeAtributoRowsEInteiro()
    {
        $textarea = new Textarea();
        $textarea->setRows("foo");
    }

    public function testVerificaSeGetFieldPassaAlert()
    {
        $textarea = new Textarea();
        $textarea->setName("descricao");
        $textarea->setValue("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam volutpat fermentum mi, sit amet aliquet neque commodo et. In eu massa non lectus porta sodales. Phasellus accumsan metus odio, quis tristique ante aliquam in. Aliquam eget ipsum eros. Nunc sodales dignissim velit in pellentesque. Sed mattis euismod quam, ut ultricies magna auctor eu. Nam at rhoncus leo. Nulla ut dictum felis, a blandit lorem.");

        $this->assertEquals('<textarea id="" name="descricao" class="" rows="" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam volutpat fermentum mi, sit amet aliquet neque commodo et. In eu massa non lectus porta sodales. Phasellus accumsan metus odio, quis tristique ante aliquam in. Aliquam eget ipsum eros. Nunc sodales dignissim velit in pellentesque. Sed mattis euismod quam, ut ultricies magna auctor eu. Nam at rhoncus leo. Nulla ut dictum felis, a blandit lorem.</textarea><p class="text-danger">O campo descrição não pode conter mais de 200 caracteres.</p>', $textarea->getField('alert'));
    }


} 