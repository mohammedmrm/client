<?php
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("../php/_crpt.php");
require_once("../config.php");
$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
$limit = trim($_REQUEST['limit']);
$page = trim($_REQUEST['currentPage']);
$msg = "";
if(empty($limit)){
 $limit = 10;
}
if(empty($page)){
 $page = 1;
}
$success=0;

if(empty($end)) {
  $end = date('Y-m-d 00:00:00', strtotime($end. ' + 1 day'));
}else{
   $end =date('Y-m-d', strtotime($end. ' + 1 day'));
   $end .=" 00:00:00";
}
if(empty($start)) {
  $start = date('Y-m-d 00:00:00',strtotime($start. ' - 7 day'));
}else{
   $start .=" 00:00:00";
}
try {
$sql2 = "select invoice.*,count(orders.id) as orders,date_format(invoice.date,'%Y-%m-%d') as in_date,clients.name as client_name,clients.phone as client_phone
           ,stores.name as store_name
           from invoice
           inner join stores on stores.id = invoice.store_id
           inner join orders on orders.invoice_id = invoice.id
           inner join clients on stores.client_id = clients.id
           where clients.id=?";
          if(!empty($end) && !empty($start)){
            $sql2 .=' and invoice.date between "'.$start.'" and "'.$end.'" ';
          }
          if($store > 0){
            $sql2 .=' and invoice.store_id="'.$store.'"';
          }

$sql .= $sql2 ." group by invoice.id";

$data = getData($con,$sql,[$userid]);

$total=getData($con,$sql2);
$success = 1;
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
   $msg = "Query Error";
}
$total[0]['start'] = date('Y-m-d', strtotime($start));
$total[0]['end'] = date('Y-m-d', strtotime($end." -1 day"));
ob_end_clean();
echo json_encode(['code'=>$code,'message'=>$msg,'success'=>$success,'data'=>$data,"total"=>$total]);
?>