<?php
class TestClassGetConnectionTest extends \PHPUnit\Framework\TestCase {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "project-read-it";
    private $conn;

    public function testConnection () {
        $connectionStatus = "";
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die();
        } else {
              $connectionStatus = "connection successful";
       
        }
        self::assertEquals("connection successful", $connectionStatus);

    }   

    public function testHello() {
        $word = 'hello';
        self::assertEquals('hello', $word);
    }

   
}
?>
