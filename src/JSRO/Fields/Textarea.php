<?php

namespace JSRO\Fields;


use JSRO\FieldAbstract;

class Textarea extends FieldAbstract
{

    private $id;
    private $name;
    private $rows;
    private $class;
    private $protected;
    private $value;
    private $label;

    /**
     * @param mixed $rows
     */
    public function setRows($rows)
    {
        if ( !is_int($rows) ) {
            throw new \InvalidArgumentException("O valor precisa ser inteiro.");
        }

        $this->rows = $rows;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

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

    public function getField($alert = null)
    {
        if ( $this->name == "descricao" && strlen($this->value) > 200 ) {
            $this->setAlert("O campo descrição não pode conter mais de 200 caracteres.");
        }

        $field = (!is_null($this->label)) ? '<label for="' . $this->id . '">' . $this->label . '</label>' : '';
        $field .= '<textarea id="' . $this->id . '" name="' . $this->name . '" class="' . $this->class . '" rows="' . $this->rows . '" '. $this->protected . '>' . $this->value . '</textarea>';
        $field .= ( $alert != "" || $alert !== null ) ? '<p class="text-danger">' . $this->getAlert() . '</p>' : '';
        return $field;
    }

} 