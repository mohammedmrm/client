<?php
ob_start();
session_start();
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("../config.php");
$id = $_REQUEST['orderid'];
$Nid = $_REQUEST['notification_id'];
$msg = "";
try {
  $query = "select 
            orders.id,
            orders.order_no,
            orders.price,
            orders.new_price,
            orders.order_type,
            orders.date,
            orders.client_id,
            orders.driver_id,
            orders.manager_id,
            orders.money_status,
            orders.agreed,
            orders.to_town,
            orders.to_city,
            orders.address,
            orders.dev_price,
            orders.from_branch,
            orders.to_branch,
            orders.customer_phone,
            orders.customer_name,
            orders.with_dev,
            orders.qty,
            orders.weight,
            orders.client_phone,
            orders.note,
            orders.order_status_id,
            orders.discount,
            orders.invoice_id,
            orders.store_id,
            orders.confirm,
            orders.company_id,
            orders.driver_invoice_id,
            orders.invoice_id2,
            orders.callcenter_id,
            orders.storage_id,
            orders.storage_invoice_id,
            orders.isfrom,
            orders.delivery_company_id,
            orders.bar_code,
            orders.remote_id,
            orders.t_note,
            orders.remote_client_phone,
            orders.remote_driver_phone,
            orders.remote_confirm,
            orders.usd,
           if(order_status_id = 9,
               0,
               if(to_city = 1,
                     if(client_dev_price.price is null,(" . $config['dev_b'] . " - discount),(client_dev_price.price - discount)),
                     if(client_dev_price.price is null,(" . $config['dev_o'] . " - discount),(client_dev_price.price - discount))
                )
                 + if(new_price > 500000 ,( (ceil(new_price/500000)-1) * " . $config['addOnOver500'] . " ),0)
                 + if(weight > 1 ,( (weight-1) * " . $config['weightPrice'] . " ),0)
                 + if(towns.center = 0 ," . $config['countrysidePrice'] . ",0)
            ) as dev_price,
            new_price -
                (
                 if(order_status_id = 9,
                     0,
                     if(to_city = 1,
                           if(client_dev_price.price is null,(" . $config['dev_b'] . " - discount),(client_dev_price.price - discount)),
                           if(client_dev_price.price is null,(" . $config['dev_o'] . " - discount),(client_dev_price.price - discount))
                      )
                  )                 
                 + if(new_price > 500000 ,( (ceil(new_price/500000)-1) * " . $config['addOnOver500'] . " ),0)
                 + if(weight > 1 ,( (weight-1) * " . $config['weightPrice'] . " ),0)
                 + if(towns.center = 0 ," . $config['countrysidePrice'] . ",0)
               ) as client_price,
            clients.name as client_name,clients.phone as client_phone,
            cites.name as city,towns.name as town,branches.name as branch_name,
            order_status.status as order_status,stores.name as store_name,
            if(staff.name is null,'غير معروف',staff.name) as driver_name,
            if(orders.bar_code > 0 and orders.remote_driver_phone is not null,remote_driver_phone,staff.phone) as driver_phone
            from orders left join
            clients on clients.id = orders.client_id
            left join cites on  cites.id = orders.to_city
            left join towns on  towns.id = orders.to_town
            left join stores on  stores.id = orders.store_id
            left join branches on  branches.id = orders.to_branch
            left join order_status on  order_status.id = orders.order_status_id
            left JOIN client_dev_price on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
            left JOIN staff on staff.id = orders.driver_id
            where orders.id = ? and orders.confirm <> 0 and orders.client_id =?";
  $data = getData($con, $query, [$id, $userid]);
  $success = "1";
  if (count($data) > 1) {
    $success = "2";
  } else {
    $query = "select tracking.*,status,DATE_FORMAT(date,'%Y-%m-%d') as date,DATE_FORMAT(date,'%H:%i') as hour from tracking
      left join order_status on tracking.order_status_id = order_status.id
      where order_id=" . $id . " order by id DESC";
    $data[0]['tracking'] = getData($con, $query);
  }
  if (empty($data[0]['address'])) {
    $data[0]['address'] = "_";
  }
  if (empty($data[0]['t_note'])) {
    $data[0]['t_note'] = "_";
  }
  if (empty($data[0]['remote_client_phone'])) {
    $data[0]['remote_client_phone'] = "0";
  }
  if (empty($data[0]['remote_driver_phone'])) {
    $data[0]['remote_driver_phone'] = "0";
  }
  if (empty($data[0]['customer_name']) || $data[0]['customer_name'] == "") {
    $data[0]['customer_name'] = "NA";
  }
  if (empty($data[0]['qty'])) {
    $data[0]['qty'] = 1;
  }
  if (empty($data[0]['bar_code'])) {
    $data[0]['bar_code'] = 01;
  }
  if ($Nid > 0) {
    $sql = "update notification set client_seen = 1 where id=? and order_id=?";
    setData($con, $sql, [$Nid, $id]);
  }
} catch (PDOException $ex) {
  $data = ["error" => $ex];
  $success = "0";
  $msg = "Query Error";
}
ob_end_clean();
echo json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data), JSON_PRETTY_PRINT);
