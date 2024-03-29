<?php
ob_start();
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$msg = "";
require_once("../php/dbconnection.php");
try {
    $query = "select * from servers";
    $data = getData($con, $query);
    $success = "1";
} catch (PDOException $ex) {
    $data = ["error" => $ex];
    $success = "0";
    $msg = "Query Error";
}
ob_end_clean();
echo (json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data), JSON_PRETTY_PRINT));
