<?
require_once("php/_access.php");
access();
include("config.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
    <meta name="description" content="في هذه الصفحة الرئيسية <?php echo $config['Company_name'];?> تستطيع ان تتعرف على الطلبيات الخاصة بك الواصة والراجعة والكثير من المعلومات">
    <meta name="<?php echo $config['Company_name'];?>" property="og:title" content="معلومات متكاملة للعميل في هذه الصفحة خاصة بعملاء  <?php echo $config['Company_name'];?>">

    <title><?php echo $config['Company_name'];?></title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="styles/datapicker.css">
<!-- load header -->
<style type="text/css">
 #search{
   width: 30%;
   min-width:10px;
   margin-left: 1.3333%;
   margin-right: 0%;
 }
 #start {
  width: 30%;
  margin-left: 1.3333%;
  margin-right: 0%;
  min-width:10px;
  border-bottom: #777777 solid 1px;
 }
 #end{
   width: 30%;
   margin-left:1.3333%;
   margin-right: 0%;
   min-width:10px;
   border-bottom: #777777 solid 1px;
 }
 .call {
   border-left: 2px  #CC0000;
   background-color: #FFFFFF;
   border-radius: 100px;
 }
 .resend {
   border-left: 2px  #CC0000;
   background-color: #FFFFFF;
   border-radius: 100px;
 }

</style>
</head>

<body class="theme-light" data-background="none" data-highlight="red2">

<div id="page">

    <!-- load main header and footer -->
     <?php include_once("pre.php");?>
     <?php include_once("top-menu.php");?>
     <?php include_once("footer-menu.php");  ?>

    <div class="page-content header-clear-medium">

         <div class="content">
         <form id="searchForm">
            <div class="search-box search-color bg-red1-dark shadow-tiny round-tiny bottom-10">
                <i class="fa fa-search"></i>
                <input type="text" name="search-text" placeholder="رقم الوصل، رقم او اسم الزبون">
            </div>
            <input type="text" name="start" id="start" class="datepicker" placeholder="من">
            <input type="text" name="end" id="end" class="datepicker"  placeholder="الى">
            <button id="search" onclick="getorders('reload')" class="btn btn-danger" type="button" value="">
                 بحث
            </button>
            <input type="hidden" name="currentPage" id="currentPage" value="1">
         </form>
        </div>


        <div class="content-boxed">
            <div class="content bottom-0">
                <h3 class="bolder text-right">الطلبيات الراجعة</h3>
            </div>


            <div id="orders"></div>

         </div>

         <!-- load footer -->
         <div id="footer-loader"></div>
    </div>
</div>
<div class="toast rounded-pill toast-bottom" id="toast-success">
    <p class="color-white" id="toast-msg"><i class='fa fa-sync fa-spin right-10'></i>
      تم التحديث
    </p>
    <div class="toast-bg opacity-90 bg-green2-dark"></div>
</div>
<div class="toast rounded-pill toast-bottom" id="toast-error">
    <p class="color-white" id="toast-msg-err"><i class='fa fa-sync fa-spin right-10'></i>
      خطا
    </p>
    <div class="toast-bg opacity-90 bg-red2-dark"></div>
</div>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/datapicker.js"></script>
<script>
$('#start').datepicker({ format: 'yyyy-mm-dd'});
$('#end').datepicker({ format: 'yyyy-mm-dd'});

function getorders(action){
if(action == "reload"){
    $("#currentPage").val(1);
}
$.ajax({
  url:"php/_getReturnedOrders.php",
  type:"POST",
  data:$("#searchForm").serialize(),
  success:function(res){
    if(action == "reload"){
     $("#orders").html('');
    }
   $("#loader").remove();
   $("#loading-items").remove();
   $("#currentPage").val(res.nextPage);

   console.log(res);
   $.each(res.data,function(){
     if(this.order_status_id == 9){
       color = 'bg-gradient-red1';
     }else if(this.order_status_id == 6){
        color = 'bg-red1-light';
     }else if(this.order_status_id == 4){
        color = 'bg-green1-dark';
     }else if(this.order_status_id == 5){
        color = 'bg-yellow1-dark';
     }else if(this.order_status_id ==7){
        color = 'bg-orange-light';
     }else if(this.order_status_id ==1){
        color = 'bg-dark1-dark';
     }else{
       color = 'bg-magenta1-light';
     }
     $("#orders").append(
             '<div class="content-boxed '+color+'">'+
                '<div class="content  list-columns-right">'+
                    '<div>'+
                        '<a style="z-index:100;" class="call" href="tel:'+this.driver_phone+'"><i class="fa fa-phone color-green1-light call fa-2x"></i></a>'+
                        '<a href="orderDetails.php?o='+this.id+'">'+
                          '<h1 class="bolder text-center text-white">'+this.order_no+'</h1>'+
                          '<p class=" text-center text-white">'+this.customer_phone+'<br />'+
                          ''+this.city+' | '+this.town+' | '+this.address+'</p>'+
                        '</a>'+
                    '</div>'+
                    '<button style="z-index:100; width:100%;" onclick="resend('+this.id+')" class="btn btn-warning">اعادة ارسال</button>'+
                '</div>'+
            '</div>'
       );
     });
     if(res.pages > res.nextPage){
      $("#orders").append('<div id="loader" onclick="getorders(\'append\')" class="btn btn-link form-control center-text top-10">تحميل المزيد</div>');
      $("#orders").append('<div id="loading-items"></div>');
     }
     if(res.pages == 0){
        $("#orders").append('<div class="text-center text-danger">لايوجد اي طلبيات</div>');
     }
    },
   error:function(e){
    console.log(e);
  }
});
}
getorders('reload');
function resend(id){
  if(confirm("هل انت متاكد من اعادة ارسال الطلب")){
      $.ajax({
        url:"php/_resendOrder.php",
        type:"POST",
        data:{id:id},
        success:function(res){
         if(res.success == 1){
            $('#toast-msg').text('تم طلب اعادة ارسال الطلب');
            $('#toast-success').addClass('toast-active');
            setTimeout(function(){
            $('#toast-success').removeClass('toast-active');
            },3000);
            getorders('reload');
         }else{
            $('#toast-msg-err').text(res.error);
            $('#toast-error').addClass('toast-active');
            setTimeout(function(){
            $('#toast-error').removeClass('toast-active');
            },5000);
         }
         console.log(res)
        } ,
        error:function(e){
          console.log(e);
        }
      });
  }
}
</script>
</body>
</html>
