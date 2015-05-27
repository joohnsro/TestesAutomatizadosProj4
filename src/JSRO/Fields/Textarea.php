<?php

namespace JSRO\Fields;

use JSRO\FieldAbstract;

class Textarea extends FieldAbstract
{
    protected $id;
    protected $name;
    protected $value;
    protected $class;
    protected $observers = [];
    protected $label;

    public function setId($id){
        if ( !is_string($id) ){
            throw new \InvalidArgumentException("O id precisa ser do tipo string.");
        }
        $this->id = $id;
    }

    public function getId(){ return $this->id; }

    public function setName($name){
        if ( !is_string($name) ){
            throw new \InvalidArgumentException("O nome precisa ser do tipo string.");
        }
        $this->name = $name;
    }

    public function getName(){ return $this->name; }

    public function setValue($value){ $this->value = $value; }

    public function getValue(){ return $this->value; }

    public function setClass($class){
        if ( !is_string($class) ){
            throw new \InvalidArgumentException("O id precisa ser do tipo string.");
        }
        $this->class = $class;
    }

    public function getClass(){ return $this->class; }

    public function adicionaLabel($label)
    {
        $this->label = "<label for='" . $this->getId() . "'>" . $label . "</label>";
    }

    public function getField(){
        echo "<textarea type='text' id='" . $this->getId() . "' name='" . $this->getName() . "' class='form-control " . $this->getClass() . "' rows='3'>" . $this->getValue() . "</textarea>";
    }

}