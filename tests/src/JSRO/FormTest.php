<?php

namespace JSRO;


use JSRO\Fields\Input;

class FormTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeAdicionaAtributos()
    {
        $form = new Form();
        $form->setAction("#");
        $form->setMethod("post");
        $form->setClass("form");

        $this->assertEquals("#", $form->getAction());
        $this->assertEquals("post", $form->getMethod());
        $this->assertEquals("form", $form->getClass());

        $this->assertEquals(array(new Input()), $form->addField(new Input()));
        $this->assertEquals("top", $form->displayAlert("top"));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeCampoFoiAdicionado()
    {
        $form = new Form();
        $form->addField(array("type"=>"text"));
    }

    public function testVerificaSeOFormularioRenderizouComSucesso()
    {
        $input = new Input();
        $input->setName("nome");

        $form = new Form();
        $form->displayAlert("top");
        $form->addField($input);

        $this->assertEquals('<form action="" method="" class=""><p class="text-danger">O campo nome está em branco.</p><div class="form-group"><input type="" id="" name="nome" class="" value="" ></div></form>', $form->render());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoDisplayAlertFuncionaCorretamente()
    {
        $form = new Form();
        $form->displayAlert("middle");
    }

}