<?php

namespace JSRO;

class Form
{

    protected $action;
    protected $method;
    protected $showMessage;
    protected $field = array();
    protected $fields = array();

    public function __construct(Validator $validator){}

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $showMessage
     */
    public function setShowMessage($showMessage)
    {
        $this->showMessage = $showMessage;
    }

    /**
     * @return mixed
     */
    public function getShowMessage()
    {
        return $this->showMessage;
    }

    public function createField(FieldAbstract $field)
    {
        $this->field = $field->getField();
        return $this;
    }

    public function addField(FieldAbstract $field)
    {
        $this->fields[] = array(
            "field" => $field->getField()
        );
        return $this->fields;
    }

    public function render()
    {
        echo '<form action="' . $this->getAction() . '" method="' . $this->getMethod() . '" class="form-horizontal">';
        foreach ($this->fields as $field){
            echo ($field['label'] !== null) ? $field['label'] . $field['field'] : $field['field'];
        }
        echo '</form>';
    }

    public function populate($dados)
    {
        if ($this->getShowMessage() == "top"){
            echo "<ul class='text-danger'>";
            foreach ($dados as $dado){
                echo ($dado->getAlert() != "") ? "<li>" . $dado->getAlert() . "</li>" : null;
            }
            echo "</ul>";
            echo "<form>";
            foreach ($dados as $dado){
                echo "<div class='form-group'>";
                echo ($dado->getLabel() !== NULL) ? $dado->getLabel() : null;
                echo $dado->getField();
                echo "</div>";
            }
            echo "</form>";
        }

        if ($this->getShowMessage() == NULL || $this->getShowMessage() == "middle"){
            echo "<form>";
            foreach ($dados as $dado){
                echo "<div class='form-group'>";
                echo ($dado->getLabel() !== NULL) ? $dado->getLabel() : null;
                echo $dado->getField();
                echo ($dado->getAlert() != "") ? "<p class='text-danger'>" . $dado->getAlert() . "</p>" : null;
                echo "</div>";
            }
            echo "</form>";
        }

        if ($this->getShowMessage() == "bottom"){
            echo "<form>";
            foreach ($dados as $dado){
                echo "<div class='form-group'>";
                echo ($dado->getLabel() !== NULL) ? $dado->getLabel() : null;
                echo $dado->getField();
                echo "</div>";
            }
            echo "</form>";
            echo "<ul class='text-danger'>";
            foreach ($dados as $dado){
                echo ($dado->getAlert() != "") ? "<li>" . $dado->getAlert() . "</li>" : null;
            }
            echo "</ul>";
        }

    }
}