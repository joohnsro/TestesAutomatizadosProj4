<?php

namespace JSRO;


abstract class FieldAbstract
{

    private $alert;

    /**
     * @param mixed $alert
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    /**
     * @return mixed
     */
    public function getAlert()
    {
        return $this->alert;
    }

    abstract public function getField();

} 