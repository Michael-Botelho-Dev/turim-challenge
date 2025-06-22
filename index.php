<?php

require_once 'controllers/PessoaController.php';
require_once 'controllers/FilhoController.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'pessoas';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($controller) {
    case 'pessoa':
        $obj = new PessoaController();
        break;
    case 'filho':
        $obj = new FilhoController();
        break;
    default:
        echo "Controller não encontrada!";
        exit;
}

if (method_exists($obj, $action)) {
    if ($id) {
        $obj->$action($id);
    } else {
        $obj->$action();
    }
} else {
    echo "Ação não encontrada!";
}
?>
