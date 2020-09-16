<?php
session_start();
header("Access-Control-Allow-Origin: *");  
header('Content-Type: application/json');
require("_apiAccess.php");
access();
$msg=""
require_once("../php/dbconnection.php");
try{
  $query = "select * from cites";
  $data = getData($con,$query);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
   $msg = "Query Error";
}
echo (json_encode(array('code'=>200,'message'=>$msg,"success"=>$success,"data"=>$data),JSON_PRETTY_PRINT));
?>