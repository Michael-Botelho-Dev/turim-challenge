<?php
class Filho
{
    private $conn;
    private $table_name = "filhos";
    public $id;
    public $nome;
    public $pessoa_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, pessoa_id=:pessoa_id";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->pessoa_id = htmlspecialchars(strip_tags($this->pessoa_id));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":pessoa_id", $this->pessoa_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readByPessoa($pessoa_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pessoa_id = ?";
        $stmt = $this->conn->prepare($query);

        $pessoa_id = htmlspecialchars(strip_tags($pessoa_id));
        $stmt->bindParam(1, $pessoa_id);

        $stmt->execute();

        return $stmt;
    }
}
?>