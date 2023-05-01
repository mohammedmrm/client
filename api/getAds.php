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
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJmJUa-wolJvSqU4yaO4uy-EMmrWK_ULAX7Q&usqp=CAU",
        "text" => "",
        "link" => "alzaimexpress.com"
    ],
    [
        "id" => 2,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJmJUa-wolJvSqU4yaO4uy-EMmrWK_ULAX7Q&usqp=CAU",
        "text" => "",
        "link" => "alzaimexpress.com"
    ]
];
ob_end_clean();
echo (json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data), JSON_PRETTY_PRINT));
