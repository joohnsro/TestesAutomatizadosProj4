<?php

namespace JSRO\Fields;


use JSRO\FieldAbstract;

class Input extends FieldAbstract
{
    protected $type;
    protected $id;
    protected $name;
    protected $value;
    protected $class;
    protected $label;

    public function setType($type){
        if( !is_string($type) ){
            throw new \InvalidArgumentException("O tipo precisa ser do tipo string.");
        }
        $this->type = $type;
    }

    public function getType(){ return $this->type; }

    public function setId($id){
        if( !is_string($id) ){
            throw new \InvalidArgumentException("O id precisa ser do tipo string.");
        }
        $this->id = $id;
    }

    public function getId(){ return $this->id; }

    public function setName($name){
        if( !is_string($name) ){
            throw new \InvalidArgumentException("O nome precisa ser do tipo string.");
        }
        $this->name = $name;
    }

    public function getName(){ return $this->name; }

    public function setValue($value){
        if( !is_string($value) ){
            throw new \InvalidArgumentException("O valor precisa ser do tipo string.");
        }
        $this->value = $value;
    }

    public function getValue(){ return $this->value; }

    public function setClass($class){
        if( !is_string($class) ){
            throw new \InvalidArgumentException("A classe precisa ser do tipo string.");
        }
        $this->class = $class;
    }

    public function getClass(){ return $this->class; }

    public function adicionaLabel($label)
    {
        if ( !is_string($label) ) {
            throw new \InvalidArgumentException("A label pracisa ser do tipo string.");
        }

        $this->label = "<label for='" . $this->getId() . "'>" . $label . "</label>";
    }

    public function getField(){
        echo "<input type='" . $this->getType() . "' id='" . $this->getId() . "' name='" . $this->getName() . "' value='" . $this->getValue() . "' class='form-control " . $this->getClass() . "'>";
    }

}