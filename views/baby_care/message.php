<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
use App\Utility\Utility;

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$data=$datamanipulation->showFosterProfile($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../contents/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/daterangepicker.css">
    <link rel="stylesheet" href="../../contents/css/chartist.min.css">
    <link rel="stylesheet" href="../../contents/css/style.css"
    <link rel="shortcut icon" href="../../contents/images/favicon.png" />

    <style>
        .br-15{
            border-radius: 15px;
            padding: 5px;
            margin-bottom: 5px;

        }
        .bg-blue{
            background-color: rgba(46, 235, 50, 0.12);
        }
        .bg-gyi{
            background-color: rgba(16, 218, 197, 0.29);
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #520a5d">
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
<!--            <h3 class="mb-0 font-weight-medium d-none d-lg-flex"> <strong style="color: #2ecc71;margin-left: 0.5em;margin-left: 500px"> --><?php //echo " "?><!-- Child Adoption System</strong></h3>-->
            <ul class="navbar-nav navbar-nav-right ml-auto">
                <h3 class="mb-0 font-weight-medium d-none d-lg-flex" style="color: white"><?php echo $data->email?></h3>
            </ul>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #21025d">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="baby_list.php">
                        <span class="menu-title text-success">Baby Details </span>
                    </a>
                </li>
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <?php
                            if($data->image){
                                ?>
                                <img class="img-xs rounded-circle" src="<?php echo $data->image?>" alt="profile image">
                                <?php
                            }else{
                                ?>
                                <img class="img-xs rounded-circle" src="../../contents/images/faces/face4.jpg" alt="profile image">
                                <?php
                            }
                            ?>

                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name"><?php echo $data->name?></p>
                        </div>
                        <div class="icon-container">

                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-title">Profile </span>
                        <i class="fas fa-male menu-icon menu-icon"></i>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register_baby.php">
                        <span class="menu-title">Regsiter Baby </span>
                        <i class="fas fa-baby menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="payment.php">
                        <span class="menu-title">Payment</span>
                        <i class="fas fa-money-bill menu-icon"></i>


                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="transaction.php">
                        <span class="menu-title">Transaction</span>
                        <i class="fas fa-money-bill-wave menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_product.php">
                        <span class="menu-title">Add Product</span>
                        <i class="fas fa-plus-square menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order_history.php">
                        <span class="menu-title">Order History</span>
                        <i class="fas fa-history menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="seller.php">
                        <span class="menu-title">Seller</span>
                        <i class="fas fa-male menu-icon menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="message.php">
                        <span class="menu-title">Message</span>
                        <i class="fas fa-comment menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="notice.php">
                        <span class="menu-title">Notice</span>
                        <i class="fas fa-exclamation-circle menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="add_rating.php">
                        <span class="menu-title">Rating</span>
                        <i class="fas fa-star menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">
                        <span class="menu-title">Contact Us</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../process/baby_care_process.php?logout">
                        <span class="menu-title">Logout</span>
                        <i class="fas fa-sign-out-alt menu-icon"></i>
                    </a>
                </li>

            </ul>
        </nav>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div>
                    <input type="hidden" class="user_id" value="<?php echo $user_id?>">
                    <input type="hidden" class="user_name" value="<?php echo $data->name?>">
                    <input type="hidden" class="buyers_name">
                    <input type="hidden"  class="buyers_id">
                </div>

                <div class="col-6" style="background-color: #21025d">
                    <div class="card">

                        <div class="card-body">
                            <h1>Chat...</h1>


                            <table id="" class="table table-bordered table-hover">
<!--                                <thead>-->
<!--                                <tr style="color: cornflowerblue;background-color: rgba(116,12,41,0.6);position:;">-->
<!--                                    <th>Serial</th>-->
<!--                                    <th>Client Name</th>-->
<!--                                    <th style="text-align: center">Action</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
                                <tbody class="tableBody attrTable">
                                <?php
                                $list = $datamanipulation->showAdminData();
                                $s=1;
                                if ($list){
                                    foreach ($list as $lists){
                                        ?>
                                        <tr>
                                            <td class="attrName"><strong><?php echo $lists->name ?></strong>
                                            </td>
                                            <td>
                                                <span class="message-show-on-alert badge-danger badge"></span> <span class=""><a data-id = "<?php echo $lists->admin_id?>" href="#" style="margin-left: 250px" class=" attrValue show-chat-box-click btn bg-dark btn-outline-primary btn-sm"><i>Chat</i></a></span>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div style="display: none; position: absolute; width: 30%; bottom: 0;right: 5%; z-index: 9999999" class=" bg-warning show-chat-box card card-warning direct-chat direct-chat-warning shadow">
                    <div class="card-header overflow-auto">
                        <div class="card-tools btn-close-tool-active ">
                            <button type="button" class="btn btn-tool btn-close-tool">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body " >
                        <div style="height: 400px" class="overflow-auto direct-chat-messages chatlogs">


                        </div>
                    </div>
                    <div class="card-footer ">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control chatMessageSend">
                                <span class="input-group-append">
                      <button type="button" class="btn bg-dark btn-outline-success chatSendBtn">Send</button>
                    </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </section>

        </div>
    </div>

    <script src="../../contents/plugins/jquery/jquery.min.js"></script>

    <script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../contents/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="../../contents/js/adminlte.min.js"></script>

    <script src="../../contents/js/demo.js"></script>
    <script>
      setInterval(function () {
        var ary = [];
        var sellers_id = $(".user_id").val();
        $(function () {
          $('.attrTable tr').each(function (a, b) {
              /*var name = $('.attrName', b).text();*/
            var value = $('.attrValue', b).attr('data-id');
            ary.push(value)
          });
            /*console.log(JSON.stringify(ary));*/
          $.ajax({
            url: "../process/data_process.php",
            type:'GET',
            data:{user_type:ary,sellers_id:sellers_id},
            success:function (result) {
              var datas = JSON.parse(result);

              htmlstring = "";
              var j = 0;
              for (var f = 0; f<ary.length; f++) {
                for (var i = 0; i < datas.length; i++) {
                  if ((datas[i].message == "unseen") && (datas[i].user_id == ary[f]) ) {
                    console.log(datas)

                    $('.attrTable tr').each(function (a, b) {
                      var name = $('.attrName', b).text();
                        /*var value = $('.attrValue', b).attr('data-id');*/
                      if($(".attrValue",b).attr('data-id') == datas[i].user_id){
                        //console.log(datas[i].buyers_id)
                        j=j+1;
                        htmlstring = $(".attrValue",b).attr('data-id');
                        $('.attrName .message-show-on-alert',b).text(j);
                      }
                    });
                  }
                }
                j=0;
              }
            }
          });
        });
      },800);
      $(".show-chat-box-click").click(function () {
        var sellers_name = $(".user_name").val();
        var sellers_id = $(".user_id").val();
        var buyers_id = $(this).attr("data-id");
        var sellerDataCollectViaId = "";
        var buyers_name = $(this).parent().parent().find('td').eq('1').text().trim();


        $(".buyers_id").val(buyers_id);
        $(".buyers_name").val(buyers_name);
        setInterval(function () {
          $.ajax({
            type: "POST",
            url: "../process/data_process.php",
            data: {
              sellerSDataCollectViaId :sellerDataCollectViaId,
              buyers_id :buyers_id,
              sellers_id :sellers_id,
            },
            success: function(data)
            {
              var data = JSON.parse(data);
              htmlstring = "";
              for(var i =0; i<data.length;i++){

                if((data[i].message_to) !=null){
                  htmlstring += "<div class=\"direct-chat-msg bg-blue br-15 mr-2 \">\n" +
                    "                        <div class=\"direct-chat-infos clearfix\">\n" +
//                    "                            <span class=\"direct-chat-name float-left text-success\">"+ data[i].sellers_name + "</span>\n" +
                    "                            <span class=\"direct-chat-timestamp float-right\">"+tConvert(data[i].time) + "</span>\n" +
                    "                        </div>\n" +

                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                    "                        </div>\n" +
                    "                    </div>"
                }
                if((data[i].message_from) !=null){
                  htmlstring +="<div class=\"direct-chat-msg right  bg-gyi ml-5 br-15 mr-2 \">\n" +
                    "                        <div class=\"direct-chat-infos clearfix\">\n" +
//                    "                            <span class=\"direct-chat-name float-right text-primary\">" + data[i].buyers_name + "</span>\n" +
                    "                            <span class=\"direct-chat-timestamp float-right\">" + tConvert(data[i].time) + "</span>\n" +
                    "                        </div>\n" +

                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                    "                        </div>\n" +
                    "                    </div>"
                }
                $('.chatlogs').html(htmlstring);
              }


            }
          });
        },1000);
        $(".btn-close-tool-active").click(function () {
          buyers_id = null
          location.reload();
        });
        $(".show-chat-box").css("display","block")

      });
      function tConvert (time) {
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

        if (time.length > 1) { // If time format correct
          time = time.slice (1);  // Remove full string match value
          time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
          time[0] = +time[0] % 12 || 12; // Adjust hours
        }
        return time.join (''); // return adjusted time or original string
      }
      $(".btn-close-tool").click(function () {
        $(".show-chat-box").css("display","none");
          /*location.reload();*/
      });

      $(".chatSendBtn").click(function () {
        var sellers_name = $(".user_name").val();
        var sellers_id = $(".user_id").val();
        var buyers_id = $(".buyers_id").val();
        var buyers_name = $(".buyers_name").val();
        var chat_message = $(".chatMessageSend").val();
        var htmlstring = " ";
        var sellerDataCollectViaId = " ";
        if(chat_message.length>0){
          $.ajax({
            type: "POST",
            url: "../process/data_process.php",
            data: {
              buyers_names :buyers_name,
              buyers_ids :buyers_id,
              sellers_ids :sellers_id,
              sellers_names :sellers_name,
              chat_messages :chat_message,
              sellerActive :htmlstring
            },
            success: function(data)
            {
              $(".chatMessageSend").val("")
              $.ajax({
                type: "POST",
                url: "../process/data-process.php",
                data: {
                  sellerSDataCollectViaId :sellerDataCollectViaId,
                  buyers_id :buyers_id,
                  sellers_id :sellers_id,
                },
                success: function(data)
                {
                  var data = JSON.parse(data);
                  for(var i =0; i<data.length;i++){
                    if((data[i].message_to) !=null){
                      htmlstring += "<div class=\"direct-chat-msg \">\n" +
                        "                        <div class=\"direct-chat-infos clearfix\">\n" +
//                        "                            <span class=\"direct-chat-name float-left\">"+ data[i].sellers_name + "</span>\n" +
                        "                            <span class=\"direct-chat-timestamp float-right\">"+tConvert(data[i].time) + "</span>\n" +
                        "                        </div>\n" +
//                        "                        <img class=\"direct-chat-img\"  src=\"../../assets/img/ok-2B.jpg\"  alt=\"Message User Image\">\n" +
                        "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                        "                        </div>\n" +
                        "                    </div>"
                    }
                    if((data[i].message_from) !=null){
                      htmlstring +="<div class=\"direct-chat-msg right\">\n" +
                        "                        <div class=\"direct-chat-infos clearfix\">\n" +
//                        "                            <span class=\"direct-chat-name float-right\">" + data[i].buyers_name + "</span>\n" +
                        "                            <span class=\"direct-chat-timestamp float-left\">" + tConvert(data[i].time) + "</span>\n" +
                        "                        </div>\n" +
                        "                        <img class=\"direct-chat-img\"  src=\"../../assets/img/ok-2B.jpg\"  alt=\"Message User Image\">\n" +
                        "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                        "                        </div>\n" +
                        "                    </div>"
                    }
                  }
                  $('.chatlogs').html(htmlstring);
                }
              });
            }
          });
        }
      });
    </script>

</body>
</html>


