<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Method, Authorization, X-Requested-With');

include_once '../../database/Database.php';
include_once '../../models/Users.php';

$id = $_GET['id'];

$database = new Database();
$db = $database->connect();

$user = new Users($db);

$user->id = $id;

if($user->delete()) {
    echo json_encode(
        array('message' => 'User Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'User Not Deleted')
    );
}
