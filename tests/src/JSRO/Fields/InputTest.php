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
} 