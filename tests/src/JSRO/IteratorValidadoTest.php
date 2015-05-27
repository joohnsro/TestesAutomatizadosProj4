<?php

namespace JSRO;


class IteratorValidadoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOAtributoRecebidoEstaCorreto()
    {
        $data = "objeto";
        $iterator = new IteratorValidado($data);
    }

} 