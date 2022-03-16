<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate category object
    $category = new Category($db);

    /* Use conditional logic of your choice to route the request to the appropriate file with 
    require_once() or include_once() */
    switch($method) {
        case 'GET':
            include_once 'read.php';
            break;
        case 'POST':
            include_once 'create.php';
            break;
        case 'PUT':
            include_once 'update.php';
            break;
        case 'DELETE':
            include_once 'delete.php';
            break;
    }

?>