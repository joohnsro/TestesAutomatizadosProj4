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
} 