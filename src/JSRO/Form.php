<?php

namespace JSRO;


class Form
{

    private $action;
    private $method;
    private $class;
    private $display;
    private $fields = array();

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
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
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    public function displayAlert($display)
    {
        $displayOptions = array("top", "inline", "bottom");

        if ( !in_array($display, $displayOptions) ) {
            throw new \InvalidArgumentException("O metodo de display nao existe.");
        }

        $this->display = $display;
        return $this->display;
    }

    public function addField($data)
    {
        if ( !$data instanceof FieldAbstract ) {
            throw new \InvalidArgumentException("O campo nao foi adicionado.");
        }

        $this->fields[] = $data;
        return $this->fields;
    }

    public function render()
    {
        $fields = "";
        $alerts = "";

        if ( count($this->fields) > 0 ) {
            foreach($this->fields as $field){
                $fields .= '<div class="form-group">';
                $fields .= ( $this->display == "inline" ) ? $field->getField('alert') : $field->getField();
                $fields .= '</div>';
                if ( $this->display == "top" || $this->display == "bottom" ) {
                    $alerts .= '<p class="text-danger">' . $field->getAlert() . "</p>";
                }
            }
        }

        $form = '<form action="' . $this->action . '" method="' . $this->method . '" class="' . $this->class . '">';
        $form .= ( $this->display == "top" ) ? $alerts : "";
        $form .= $fields;
        $form .= ( $this->display == "bottom" ) ? $alerts : "";
        $form .= '</form>';

        return $form;
    }

} 