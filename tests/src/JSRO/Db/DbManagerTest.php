<?php

namespace JSRO\Db;

class DbManagerTest extends \PHPUnit_Framework_TestCase
{

    private $db;

    public function setUp()
    {
        $this->db = new DbManager();
        $this->db->setDbAdapter(new \PDO("sqlite::memory:"));

        $this->db->getConnection()->exec("Create table commentForm (id INT AUTO_INCREMENT, nome VARCHAR(255), email VARCHAR(255), mensagem VARCHAR(255));");
    }

    public function tearDown()
    {
        $this->db->getConnection()->exec("Drop table commentForm;");
    }

    public function testVerificaSeOAdapterEstaInstaciadoCorretamente()
    {
        $this->assertInstanceOf("\PDO", $this->db->getConnection());
    }

    public function testVerificaSeInsereNoBancoDeDados()
    {

        $data = array(
            "nome" => "Jonathan",
            "email" => "jonathansroliveira@gmail.com",
            "mensagem" => "Olá mundo!"
        );

        $this->db->persist($data);
        $this->db->flush();

        $stmt = $this->db->getConnection()->query("Select * from commentForm;");

        $this->assertEquals(1, count($stmt->fetchAll()));

    }

} 