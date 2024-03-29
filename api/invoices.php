<?php
ob_start();
session_start();
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("../php/_crpt.php");
require_once("../config.php");
$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
$limit = trim($_REQUEST['limit']);
$page = trim($_REQUEST['page']);
$store = trim($_REQUEST['store']);
$msg = "";
if (empty($limit)) {
  $limit = 10;
}
if (empty($page)) {
  $page = 1;
}
$success = 0;

if (empty($end)) {
  $end = date('Y-m-d 00:00:00', strtotime($end . ' + 1 day'));
} else {
  $end = date('Y-m-d', strtotime($end . ' + 1 day'));
  $end .= " 00:00:00";
  $end .= " 00:00:00";
}
if (empty($start)) {
  $start = date('Y-m-d 00:00:00', strtotime($start . ' - 92 day'));
} else {
  $start .= " 00:00:00";
}
try {
  $sql = "select * from clients where id=" . $userid;
  $show = getData($con, $sql, [$userid]);
  if ($showearnings == 1) {
    $sql2 = "select invoice.*,count(orders.id) as orders,date_format(invoice.date,'%Y-%m-%d') as in_date,clients.name as client_name,clients.phone as client_phone
           ,stores.name as store_name
           from invoice
           inner join stores on stores.id = invoice.store_id
           inner join orders on orders.invoice_id = invoice.id
           inner join clients on stores.client_id = clients.id
           where clients.id=?";
    if (!empty($end) && !empty($start)) {
      $sql2 .= ' and invoice.date between "' . $start . '" and "' . $end . '" ';
    }
    if ($store > 0) {
      $sql2 .= ' and invoice.store_id="' . $store . '"';
    }

    $sql2 .= " group by invoice.id order by invoice.date DESC ";
    $count = getData($con, $sql2, [$userid]);
    $count = count($count);
    $maxPage = ceil($count / $limit);
    if ($page != 0) {
      $page = $page - 1;
    }
    $sql2 .= " limit " . ($page * $limit) . "," . $limit;

    $data = getData($con, $sql2, [$userid]);

    $sql = "select
          sum(new_price) as income,
          sum(if(to_city = 1,
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_b'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_b'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      ),
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_o'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_o'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      )
                  )
                 + if(new_price > 500000 ,( (ceil(new_price/500000)-1) * " . $config['addOnOver500'] . " ),0)
                 + if(weight > 1 ,( (weight-1) * " . $config['weightPrice'] . " ),0)
                 + if(towns.center = 0 ," . $config['countrysidePrice'] . ",0)
             ) as dev,
          sum(new_price -
              (
                if(to_city = 1,
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_b'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_b'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      ),
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_o'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_o'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      )
                 )
                 + if(new_price > 500000 ,( (ceil(new_price/500000)-1) * " . $config['addOnOver500'] . " ),0)
                 + if(weight > 1 ,( (weight-1) * " . $config['weightPrice'] . " ),0)
                 + if(towns.center = 0 ," . $config['countrysidePrice'] . ",0)
             )
            ) as client_price,
          sum(discount) as discount,
          count(orders.id) as orders
          from orders
          left JOIN client_dev_price on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
          left join towns on  towns.id = orders.to_town
          where orders.client_id = ?  and invoice_id = 0 and (order_status_id = 4 or order_status_id = 5 or order_status_id = 6)  and orders.confirm=1
          ";
    if (!empty($end) && !empty($start)) {
      $sql .= ' and orders.date between "' . $start . '" and "' . $end . '" ';
    }
    if ($store > 0) {
      $sql .= ' and orders.store_id="' . $store . '"';
    }
    $res4 = getData($con, $sql, [$userid]);;

    $total = $res4[0];
    $success = 1;
  } else {
    $data = [];
    $total = [];
    $code = 200;
  }
} catch (PDOException $ex) {
  $data = ["error" => $ex];
  $success = "0";
  $msg = "Query Error";
}
$total['start'] = date('Y-m-d', strtotime($start));
$total['end'] = date('Y-m-d', strtotime($end . " -1 day"));
ob_end_clean();
echo json_encode(['code' => $code, 'message' => $msg, 'success' => $success, 'data' => $data, "total" => $total, 'count' => $count, 'nextPage' => ($page + 2), "maxPage" => $maxPage]);
