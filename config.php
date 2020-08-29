<?php
$config = [
   "Company_name"=>"شركة النهر",
   "Company_phone"=>"0782222222",
   "wellcome_message"=>"اعلان",
   "Company_email"=>"nahar@nahar.com",
   "Company_logo"=>"img/logos/logo.png",
   "dev_b"=>5000,               //??? ??????? ?????
   "dev_o"=>10000                //??? ??????? ????? ?????????
];
require_once("php/dbconnection.php");
$sql = "select * from setting";
$setting = getData($con,$sql);
foreach($setting as $val){
  $config[$val['control']] =  $val['value'];
}
?>
