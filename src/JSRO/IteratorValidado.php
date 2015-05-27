<?php

namespace JSRO;

class IteratorValidado implements \Iterator
{

    protected $data;

    public function __construct($data)
    {
        if ( !is_array($data) ){
            throw new \InvalidArgumentException("Os dados precisam passar por array.");
        }
        $this->data = $data;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        $dado = current($this->data);
        if ($dado->getName() == "nome" && $dado->getValue() == ""){
            $dado->setAlert("O campo nome está em branco.");
        }

        if ($dado->getName() == "valor" && !is_numeric($dado->getValue())){
            $dado->setAlert("O campo valor precisa ser númerico. (Ex.: 00.00)");
        }

        if ($dado->getName() == "descricao" && strlen($dado->getValue()) > 200){
            $dado->setAlert("O campo descrição não pode conter mais de 200 caracteres.");
        }
        return $dado;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->key() !== null && $this->key() !== false;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->data);
    }
}