<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'familia_db';
    private $username = 'root'; 
    private $conn;

    public function getConnection(): PDO
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>