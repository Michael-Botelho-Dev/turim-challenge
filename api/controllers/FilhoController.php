<?php

require_once __DIR__ . '/../models/Filho.php';
require_once __DIR__ . '/../config/database.php';

class FilhoController
{
    private $filho;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->filho = new Filho($db);
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->filho->nome = $data->nome ?? null;
        $this->filho->pessoa_id = $data->pessoa_id ?? null;
        $this->filho->create();
        echo json_encode(["response" => $this->filho]);
    }

    public function delete($id): void
    {
        $this->filho->id = $id;
        $this->filho->delete();
        echo json_encode(["message" => "Filho excluído com sucesso."]);
    }
}
