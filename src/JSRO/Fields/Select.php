<?php

namespace JSRO\Fields;


use JSRO\FieldAbstract;

class Select extends FieldAbstract
{

    private $id;
    private $name;
    private $class;
    private $protected;
    private $label;
    private $options = array();

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
        $options = "";
        foreach ( $this->options as $option ) {
            $options .= '<option value="' . $option['value'] . '">' . $option['name'] . '</option>';
        }

        $field = ($this->label) ? '<label for="' . $this->id . '">' . $this->label . '</label>' : '';
        $field .= '<select id="' . $this->id . '" name="' . $this->name . '" class="' . $this->class . '" ' . $this->protected . '>' . $options . '</select>';
        $field .= ( $alert != "" || $alert !== null ) ? '<p class="text-danger">' . $this->getAlert() . '</p>' : '';
        return $field;
    }

    public function addOption($option)
    {
        if ( !is_array($option) ) {
            throw new \InvalidArgumentException("A opcao nao e do tipo necessario.");
        }

        $this->options[] = $option;
    }

    public function getOptions()
    {
        return $this->options;
    }

} 