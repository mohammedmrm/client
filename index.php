<?php
require_once("php/_access.php");
access();
require_once("config.php");
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
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/toast.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="pwa/apple-touch-icon.png">
    <link rel="manifest" href="pwa/site.webmanifest">
</head><!--#FF6347;-->

<body class="theme-light" data-background="none" data-highlight="orange">
    <style type="text/css">
        .bg-div1 {
            background-color:#f96332;
            color: #000000;
        }

        .bg-div2 {
            background-color: #f96332;
        }

        .bg-div3 {
            background-color: #f96332;
        }

        .bg-div4 {
            background-color: #f96332;
        }

        .bg-div5 {
            background-color: #f96332;
        }

        .bg-div6 {
            background-color: #E9DF00;
        }

        .bg-div7 {
            background-color: #03FCBA;
        }

        .bg-div8 {
            background-color: #4CAF50;
            color: #000000;
        }

        .bg-div9 {
            background-color: #0B4EBC;
            color: white;
        }

        .bg-div10 {
            background-color: #F4B400;
            color: #2E2E2E;
        }
       a:hover {
         text-underline: none;
       }
    </style>
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <div id="page">

        <?php include_once("pre.php");  ?>
        <?php include_once("top-menu.php");  ?>
        <?php include_once("bottom-menu.php");  ?>

        <div class="page-content header-clear-medium">
            <div class="content-boxed">
            <div class="col-sm-12">
              <div class="input-group mb-3">
                <button class="input-group-prepend" onclick="search($('#search_word').val(),$('#store').val())" data-toggle="modal" data-target="#searchModal" >
                  <span class="input-group-text" id="inputGroup-sizing-sm">بحث</span>
                </button>
                <input type="text" id="search_word" placeholder="رقم الوصل ،رقم هاتف الزبون " class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <select class="form-control" id="store" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                   <option>-- البيج -- </option>
                </select>
              </div>
            </div>
            </div>
            <div class="content-boxed">
            <div class="slider-wrapper">
                <div class="single-slider owl-carousel owl-no-dots">
                    <div class="item" style="padding: 0 .5rem;"><?php echo $config['c_ad1'];?></div>
                    <div class="item" style="padding: 0 .5rem;"><?php echo $config['c_ad2'];?></div>
                </div>
                <!--Controls go here-->
            </div>
            </div>
            <div class="content-boxed">
                <a href="#" class="footer-title bottom-10"><span class=" text-center color-black">خلاصة للطلبيات والمبالغ &#128512;</span></a>
                <div class="content">
                <div class="one-third first-column">
                    <a href="#">
                        <div data-height="80" class="bg-div10 caption  shadow-huge bottom-20 ">
                            <div class="caption-center center-text">
                                <h1 class="center-text  bold font-18" id="earning-last30">0,0</h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black">٣٠ يوم</p>
                            </div>
                            <div class="caption-overlay color-black text-right " id="orders-last30"><i class="fas fa-box-open"></i></div>

                        </div>
                    </a>
                </div>

                <div class="one-third ">
                    <a href="#">
                        <div data-height="80" class="bg-div9  caption shadow-huge  bottom-20 ">
                            <div class="caption-center">
                                <h1 class="center-text  bolder font-18" id="earning-last7">0,0 </h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white">٧ أيام</p>
                            </div>
                            <div class="caption-overlay  text-right " id="orders-last7"><i class="fas fa-box-open" ></i></div>
                        </div>
                    </a>
                </div>
                <div class="one-third last-column">
                    <a href="#">
                        <div data-height="80" class="bg-div8 caption  shadow-huge bottom-20 ">
                            <div class="caption-center">
                                <h1 class="center-text  bolder font-18" id="earning-last1">0,0 </h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black ">اليوم</p>
                            </div>
                            <div class="caption-overlay text-right " id="orders-last1"> <i class="fas fa-box-open"></i></div>
                        </div>
                    </a>
                </div>
                </div>
                <span class="footer-title bottom-10">
                        <span class=" text-center color-black  ">
                             كيف ممكن اساعدك. أختر
                        </span>
                </span>
                <div class="clear">

                    <!--       End of this section       -->
                  <a href="orders.php">
                        <div data-instant-id="instant-1" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text  bolder font-18"><i class="fas fa-list-alt fa-1x   top-0 bottom-0 "></i> طلبيات قيد التسليم</h1>
                                <p class="center-text under-heading  color-black">البحث و عرض الطلبيات</p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black "></p>
                            </div>

                            <div class="caption-overlay"></div>
                        </div>
                    </a>
                </div>
                <div class="one-half">
                    <a href="returned.php">
                        <div data-instant-id="instant-2" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge">
                            <div class="caption-center">
                                <h1 class="center-text   bolder font-18"><i class="fas fa-times-circle  fa-1x  top-0 bottom-0 "></i> طلبات قيد المعالجة</h1>
                                <p class="center-text color-black  under-heading"> </p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text  color-black">انقر للعرض</p>
                                <p class="center-text color-black   "></p>
                            </div>

                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>
                <div class="one-half last-column">
                    <a href="recived.php">
                        <div data-instant-id="instant-2" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge">
                            <div class="caption-center">
                                <h1 class="center-text   bolder font-18"><i class="fas fa-check fa-1x  top-0 bottom-0 "></i> الواصل</h1>
                                <p class="center-text color-black  under-heading"> الطلبيات الواصلة </p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text  color-black">انقر للعرض</p>
                                <p class="center-text color-black   "></p>
                            </div>

                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>
                <div class="one-half">
                    <a href="posponded.php">
                        <div data-instant-id="instant-4" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge  ">
                            <div class="caption-center">
                                <h1 class="center-text bolder font-18"><i class="fas fa-file  fa-1x top-0 bottom-0  "></i> مؤجلات </h1>
                                <p class="center-text  color-black under-heading"></p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black  ">انقر للعرض</p>
                                <p class="center-text  "></p>
                            </div>
                            <div class="caption-overlay  "></div>
                        </div>
                    </a>
                </div>
                <div class="one-half last-column">
                    <a href="instorage.php">
                        <div data-instant-id="instant-4" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge  ">
                            <div class="caption-center">
                                <h1 class="center-text bolder font-18"><i class="fas fa-file  fa-1x top-0 bottom-0  "></i> رواجع بالمخزن الرئسي </h1>
                                <p class="center-text  color-black under-heading"></p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black  ">انقر للعرض</p>
                                <p class="center-text  "></p>
                            </div>
                            <div class="caption-overlay  "></div>
                        </div>
                    </a>
                </div>
<!--                <div class="one-half">
                    <a href="receipt.php">
                        <div data-instant-id="instant-2" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge">
                            <div class="caption-center">
                                <h1 class="center-text   bolder font-18"><i class="fas fa-plus-circle  fa-1x  top-0 bottom-0 "></i> طلب وصولات</h1>
                                <p class="center-text color-black  under-heading">طلب وصولات فارغه او جاهزه</p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text  color-black">طلب وصولات</p>
                                <p class="center-text color-black   "></p>
                            </div>

                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>
                <div class="one-half last-column">
                    <a href="addorders.php">
                        <div data-instant-id="instant-2" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge">
                            <div class="caption-center">
                                <h1 class="center-text   bolder font-18"><i class="fas fa-plus-circle  fa-1x  top-0 bottom-0   "></i>اضافة طلبيه</h1>
                                <p class="center-text color-black  under-heading">تقرير بجميع الرواجع</p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text  color-black">انقر للعرض</p>
                                <p class="center-text color-black   "></p>
                            </div>

                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>
                <div class="clear">
                    <a href="print.php">
                        <div data-instant-id="instant-4" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge  ">
                            <div class="caption-center">
                                <h1 class="center-text bolder font-18"><i class="fas fa-file  fa-1x top-0 bottom-0  "></i> طباعة </h1>
                                <p class="center-text  color-black under-heading"></p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black  ">انقر للعرض</p>
                                <p class="center-text  "></p>
                            </div>
                            <div class="caption-overlay  "></div>
                        </div>
                    </a>
                </div>-->
                <?php if($_SESSION['user_details']['show_earnings'] == 1){ ?>
                <div class="clear">
                    <a href="earnings.php">
                        <div data-instant-id="instant-4" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge  ">
                            <div class="caption-center">
                                <h1 class="center-text bolder font-18"><i class="fas fa-coins  fa-1x top-0 bottom-0"> </i> كشوفات </h1>
                                <p class="center-text  color-black under-heading">كشوفات بالطلبات المستلمة</p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black  ">انقر للعرض</p>
                                <p class="center-text  "></p>
                            </div>
                            <div class="caption-overlay  "></div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div class="clear last-column">
                    <a href="charts.php">
                        <div data-instant-id="instant-5" data-height="120" class="bg-div1 caption caption-margins round-tiny shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text bolder font-18"><i class="fas fa-chart-pie  fa-1x  top-0 bottom-0  "></i> احصائيات</h1>
                                <p class="center-text  color-black under-heading">تقرير أحصائي للعميل</p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black  ">انقر للعرض</p>
                                <p class="center-text  "></p>
                            </div>
                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-left" id="exampleModalLongTitle">الطلبات <span id="orders_count"></span></h5>

      </div>
      <div class="modal-body">
       <div id="orders"></div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
   <script type="text/javascript" src="scripts/plugins.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <script type="text/javascript" src="scripts/toast.js"></script>
    <script type="text/javascript" src="scripts/getStores.js"></script>
    <script type="text/javascript">
getStores($("#store"));
function static(){
  $.ajax({
  url:"php/_static.php",
  type:"POST",
  data:$("#searchForm").serialize(),
  success:function(res){
    console.log(res);
    $.each(res.last1,function(){
       if(this.client_price != null){
          $("#earning-last1").text(this.client_price);
       }
       if(this.orders != null){
         $("#orders-last1").append("&nbsp;"+this.orders);
       }
    });
    $.each(res.last7,function(){
       if(this.client_price != null){
          $("#earning-last7").text(this.client_price);
       }
       if(this.orders != null){
         $("#orders-last7").append("&nbsp;"+this.orders);
       }
    });
    $.each(res.last30,function(){
       if(this.client_price != null){
          $("#earning-last30").text(this.client_price);
       }
       if(this.orders != null){
         $("#orders-last30").append("&nbsp;"+this.orders);
       }
    });
  },
  error:function(e){
    console.log(e);
  }
});
}
static();
function search(search,store){
 $.ajax({
  url:"php/_search.php",
  type:"POST",
  data:{search:search,store:store},
  beforeSend:function(){
    $("#orders").addClass("loading");
  },
  success:function(res){
   $("#orders").removeClass("loading");
   $("#orders").html('');
   $("#orders_count").text(" ( "+res.orders+" ) ");
   console.log(res);
   $.each(res.data,function(){
     if(this.order_status_id == 9){
       color = 'bg-red1-dark';
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
     console.log(this.id);
     $("#orders").append(
             '<div class="content-boxed '+color+'">'+
                '<div class="content  list-columns-right">'+
                    '<div>'+
                        '<a style="z-index:100;" class="call" href="tel:'+this.driver_phone+'"><i class="fa fa-phone color-green1-light call fa-2x"></i></a>'+
                        '<a href="orderDetails.php?o='+this.id+'">'+
                          '<h1 class="bolder text-center text-white">'+this.order_no+'</h1>'+
                          '<p class=" text-center text-white">'
                            +this.customer_phone+
                            '<br />'+this.city+' | '+this.town+' | '+this.address+
                            '<br />'+this.store_name+
                            '<br />( '+this.t_note+
                          ' )</p>'+
                        '</a>'+
                    '</div>'+
                '</div>'+
            '</div>'
       );
     });
    },
   error:function(e){
     $("#orders").removeClass("loading");
    console.log(e);
  }
});
}
</script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-messaging.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <!--<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-analytics.js"></script>
-->
  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-firestore.js"></script>
  <script>
    // Your web app's Firebase configuration
  if ('serviceWorker' in navigator) {
     window.addEventListener('load', () => {
      navigator.serviceWorker.register('sw.js')
    });
  }
    var firebaseConfig = {
      apiKey: "AIzaSyCmIr87Ihp8nXtHrKWZyeH1GcvFrHxmtJw",
      authDomain: "alnahr-3a32e.firebaseapp.com",
      databaseURL: "https://alnahr-3a32e.firebaseio.com",
      projectId: "alnahr-3a32e",
      storageBucket: "alnahr-3a32e.appspot.com",
      messagingSenderId: "410160983978",
      appId: "1:410160983978:web:22a64081a20724ec9185d3",
      measurementId: "G-QYSFSMTB8R"
    };
    // Initialize Firebase
    // Initialize Firebase
    if (firebase.messaging.isSupported()) {
        firebase.initializeApp(firebaseConfig);
        //  firebase.analytics();
        const messaging = firebase.messaging();
        navigator.serviceWorker.register('scripts/firebase-sw.js')
        .then((registration) => {
          messaging.useServiceWorker(registration);
          messaging.requestPermission()
          .then(function() {
            console.log(messaging.getToken());
            return messaging.getToken();
          })
          .then(function(token) {
            console.log(token);
            updateUserToken(token);
          })
          .catch(function(err) {
            console.log("error")
          });
          messaging.onMessage(function(payload) {
            console.log('On message', payload);
            Toast.success(payload.notification.title,payload.notification.body);
          });
        });
    }else{
      Notification.requestPermission().then(function(result) {
        console.log(Notification.getToken());
      });
    }






     function updateUserToken(token){
     $.ajax({
           url:"php/_updateToken.php",
           data:{token : token},
           type:"POST",
           success:function(res){
            console.log(res);
           },
           error:function(e){
             console.log(e);
           },
     });
}
</script>
</body>

</html>