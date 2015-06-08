<?php

namespace JSRO;

class FormTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaOFuncionamentoDoSetEGetAction()
    {
        $validate = $this->getMockBuilder('\JSRO\Validator')->disableOriginalConstructor()->getMock('\JSRO\Validator');

        $form = new Form($validate);
        $form->setAction("#");

        $this->assertEquals("#", $form->getAction());
    }

    public function testVerificaOFuncionamentoDoSetEGetMethod()
    {
        $validate = $this->getMockBuilder('\JSRO\Validator')->disableOriginalConstructor()->getMock('\JSRO\Validator');

        $form = new Form($validate);
        $form->setMethod("post");

        $this->assertEquals("post", $form->getMethod());
    }

    public function testVerificaOFuncionamentoDoSetEGetShowMessage()
    {
        $validate = $this->getMockBuilder('\JSRO\Validator')->disableOriginalConstructor()->getMock('\JSRO\Validator');

        $form = new Form($validate);
        $form->setShowMessage("ok");

        $this->assertEquals("ok", $form->getShowMessage());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOCreateFieldFieldRecebeuObjetoCorretamente()
    {
        $validate = $this->getMockBuilder('\JSRO\Validator')->disableOriginalConstructor()->getMock('\JSRO\Validator');
        $form = new Form($validate);

        $input = "foo";

        $form->createField($input);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOAddFieldRecebeuObjetoCorretamente()
    {
        $validate = $this->getMockBuilder('\JSRO\Validator')->disableOriginalConstructor()->getMock('\JSRO\Validator');
        $form = new Form($validate);

        $input = "foo";

        $form->addField($input);
    }


} 