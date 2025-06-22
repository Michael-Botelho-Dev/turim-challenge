<?php

require_once __DIR__ . '/../models/Pessoa.php';
require_once __DIR__ . '/../config/database.php';

class PessoaController
{
    private $pessoa;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->pessoa = new Pessoa($db);
    }

    public function index(): void
    {
        $data = $this->pessoa->readAll(); 
        echo json_encode($data);
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->pessoa->nome = $data->nome ?? null;
        $id = $this->pessoa->create();
        echo json_encode(["id" => $id]);
    }

    public function delete($id): void
    {
        $this->pessoa->id = $id;
        $this->pessoa->delete();
        echo json_encode(["message" => "Excluído"]);
    }
}