
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
$data=$datamanipulation->showStaffProfile($user_id);
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
</head>
<body>
<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #21025d">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">

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
                <li class="nav-item active">
                    <a class="nav-link" href="seller.php">
                        <span class="menu-title">Seller</span>
                        <i class="fas fa-male menu-icon menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="message.php">
                        <span class="menu-title">Message</span>
                        <i class="fas fa-comment menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
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
        <div class="content-wrapper">
            <?php
                $list = $datamanipulation->viewConfimrListInfo($user_id);
                if($list){
                   ?>
                    <a href="manage_order.php" class="btn btn-success" style="background-color: #21025d">Manage Order</a>
                    <?php
                }
            ?>

            <div class="row ">

                <?php
                $childData=$datamanipulation->showAllShopData($user_id);
                if($childData){
                    foreach ($childData as $list){
                        $data =$datamanipulation->checkHasitemByid($list->user_id);
                        if($data){
                            ?>
                            <div style="width: 30%; height: 390px;border-radius: 10px; background-color: #21025d ;margin: 15px;">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center mt-4">
                                        <img src="<?php echo $list->image?>" height="200" width="200" style="border-radius: 50%">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row ">

                                        <div class="col-md-12 mt-1 d-flex justify-content-center">
                                            <h5 class="text-light"><?php echo $list->name?></h5>
                                        </div>
                                        <div class="col-md-12 mt-1 d-flex justify-content-center">
                                            <h5 class="text-light">(<?php echo $list->phone?>)</h5>
                                        </div>

                                    </div>
                                    <div class="text-center" role="group">
                                        <a href="product.php?shop_id=<?php echo $list->user_id?>" class="btn-group btn bg-success btn-outline-primary fancy" style="background-image: linear-gradient(#590c70, #bfa512)" data-type="iframe" > View</a>


                                    </div>
                                </div>
                            </div>
                            <?php
                        }else{

                        }

                    }
                }
                ?>
            </div>
<!--            <div class="container">-->
<!--                <div class="row container">-->
<!--                    <div class="col-md-3 bg-info m-4" style="height: 400px;">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 bg-info m-4" style="height: 400px;">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 bg-info m-4" style="height: 400px;">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 bg-info m-4" style="height: 400px;">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, sed.</p>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>
</div>
<script src="../../contents/js/vendor.bundle.base.js"></script>
<script src="../../contents/js/chartist.min.js"></script>
<script src="../../contents/js/moment.min.js"></script>
<script src="../../contents/js/daterangepicker.js"></script>
<script src="../../contents/js/chartist.min.js"></script>
<script src="../../contents/js/vendor.bundle.base.js"></script>
<script src="../../contents/js/off-canvas.js"></script>
<script src="../../contents/js/misc.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
    $(".payment_method").on("change",function () {
      if($(this).val() == "bkash"){
        $(".bkashContent").css("display","block")
      }
      else{
        $(".bkashContent").css("display","none")
      }
    })
    $(".allItemConfirm").click(function (e) {
      //$(this).modal("show")
      //debugger
      var html = "";
      var sum = 0;
      document.querySelectorAll(".pname").forEach(e=> {
        let p = document.createElement("p");
      //document.querySelector(".modal-body").append(e.innerText, p);
      html += "<p>" + e.innerText + "</p>";

    });
      document.querySelectorAll(".uprice").forEach(el=>{


        let pq = document.createElement("p");
      sum = sum + parseInt(el.innerText.split(":").slice(-1).toString());

    })
      //console.log(html)
      console.log(sum);
      $(".modal-body").html(html)
      $(".totalPrice").text(sum)
      //$(".cart_value").val(e.target.previousElementSibling.getAttribute("data-cart-id"))

      //var html = "<div class='card'><div class='card-body'></div></div>";

    })
  });
</script>
</body>
</html>