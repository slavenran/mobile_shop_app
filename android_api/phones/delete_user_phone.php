<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Method, Authorization, X-Requested-With');

include_once '../../database/Database.php';
include_once '../../models/UserPhones.php';

$model = $_GET['model'];

$database = new Database();
$db = $database->connect();

$phone = new UserPhones($db);

$phone->model = $model;

$phone->read_single();

if($phone->delete()) {
    echo json_encode(
        array('message' => 'Phone Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Phone Not Deleted')
    );
}
