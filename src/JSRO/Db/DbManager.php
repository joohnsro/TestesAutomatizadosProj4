<?php

namespace JSRO\Db;

class DbManager
{

    private $db;
    private $totalData = array();

    public function setDbAdapter(\PDO $db)
    {
        $this->db = $db;
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function persist($data)
    {
        $this->totalData[] = $data;
    }

    public function flush()
    {
        foreach($this->totalData as $data){
            $this->getConnection()->exec("Insert into commentForm (nome, email, mensagem) values ('{$data["nome"]}', '{$data["email"]}', '{$data["mensagem"]}');");
        }
    }

} 