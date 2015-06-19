<?php

namespace JSRO\Fields;


use JSRO\FieldAbstract;

class Input extends FieldAbstract
{

    private $type;
    private $id;
    private $name;
    private $class;
    private $protected;
    private $value;
    private $label;

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $protected
     */
    public function setProtected($protected)
    {
        $this->protected = $protected;
    }

    /**
     * @return mixed
     */
    public function getProtected()
    {
        return $this->protected;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    public function getField($alert = null)
    {
        if ( $this->name == "nome" && ( $this->value == "" || $this->value === null ) ) {
            $this->setAlert("O campo nome está em branco.");
        }

        if ( $this->name == "valor" && !is_numeric($this->value) ) {
            $this->setAlert("O campo valor precisa ser númerico. (Ex.: 00.00).");
        }

        $field = (!is_null($this->label)) ? '<label for="' . $this->id . '">' . $this->label . '</label>' : '';
        $field .= '<input type="' . $this->type . '" id="' . $this->id . '" name="' . $this->name . '" class="' . $this->class . '" value="' . $this->value . '" ' . $this->protected . '>';
        $field .= ( $alert != "" || $alert !== null ) ? '<p class="text-danger">' . $this->getAlert() . '</p>' : '';
        return $field;
    }

} 