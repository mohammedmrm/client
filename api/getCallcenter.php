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
        "title" => "الاداره",
        "subTitle" => "07800000000",
    ],
    [
        "title" => "خدمة العملاء",
        "subTitle" => "07800000000",

    ]
];
ob_end_clean();
echo (json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data), JSON_PRETTY_PRINT));
