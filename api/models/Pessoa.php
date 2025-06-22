<?php
class Pessoa
{
    private $conn;
    private $table_name = "pessoas";
    public $id;
    public $nome;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $query = "SELECT p.id, p.nome
              FROM " . $this->table_name . " p";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $pessoas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pessoas as &$pessoa) {
            $queryFilhos = "SELECT id, nome FROM filhos WHERE pessoa_id = :pessoa_id";
            $stmtFilhos = $this->conn->prepare($queryFilhos);
            $stmtFilhos->bindParam(':pessoa_id', $pessoa['id']);
            $stmtFilhos->execute();

            $filhos = $stmtFilhos->fetchAll(PDO::FETCH_ASSOC);
            $pessoa['filhos'] = $filhos ?: []; // Retorna array vazio se não houver filhos
        }

        return $pessoas;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));

        $stmt->bindParam(":nome", $this->nome);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
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
}
?>