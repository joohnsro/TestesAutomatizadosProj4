<?php

namespace JSRO\Fields;


use JSRO\FieldAbstract;

class Select extends FieldAbstract
{
    protected $id;
    protected $name;
    protected $options;
    protected $class;
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

    public function setOptions($options){
        if ( !is_array($options) ){
            throw new \InvalidArgumentException("As opções precisam ser do tipo array.");
        }
        $this->options = $options;
    }

    public function getOptions(){ return $this->options; }

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
        echo "<select id='" . $this->getId() . "' name='" . $this->getName() . "' class='form-control " . $this->getClass() . "'>";
        foreach($this->getOptions() as $option){
            echo "<option value='" . $option["value"] . "'>" . $option["name"] . "</option>";
        }
        echo "</select>";
    }

}