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
} 