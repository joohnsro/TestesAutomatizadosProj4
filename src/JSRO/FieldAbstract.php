<?php

namespace JSRO;


abstract class FieldAbstract
{
    protected $alert;

    public function setAlert($alert){ $this->alert = $alert;}
    public function getAlert(){ return $this->alert; }

    public abstract function getField();
}