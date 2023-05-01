<?php
ob_start();
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$msg = "";
require_once("../php/dbconnection.php");
$data = [
    [
        "id" => 1,
        "img" => "https://alzaimexpress.com/dash/img/logos/logo5.png",
        "text" => "",
        "link" => "alzaimexpress.com"
    ],
    [
        "id" => 2,
        "img" => "https://alzaimexpress.com/dash/img/logos/logo5.png",
        "text" => "",
        "link" => "alzaimexpress.com"
    ]
];
ob_end_clean();
echo (json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data), JSON_PRETTY_PRINT));
