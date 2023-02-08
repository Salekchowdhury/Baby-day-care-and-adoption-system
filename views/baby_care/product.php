
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
                <li class="nav-item">
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

        <form id="ConfirmForm" action="../process/baby_care_process.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Information</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <p class="p-3 border-dark border-top" style="font-size: 15px; color:darkred">Total Price: <span class="totalPrice"></span></p>
                        <div class="px-3">
                            <label>Payment Method Choose</label>
                            <select name="payment_method" class="form-control payment_method">
                                <option value=""></option>
                                <option value="cashOnDelivery">Cash on Delivery</option>
                                <option value="bkash">Bkash</option>
                            </select>
                        </div>
                        <div style="display: none" class="p-3 bkashContent">
                            <?php $sellersData=$datamanipulation->showSellerAccount($_GET['shop_id']);?>
                            <label>Transaction ID:(Send Money through Bikash to the following number, and give the transaction ID.)</label>
                            <h4>Bkash Agent Number <strong class="show-number-bkash"><?php echo $sellersData->phone?></strong></h4>
                            <input type="text" class="form-control" placeholder="Transaction Number" name="transactionId" value="">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="buyer_id" value="<?php echo $user_id?>">
                            <input type="hidden" name="seller_id" value="<?php echo $_GET['shop_id']?>">
                            <button type="button" class="btn btn-info btn-sm resetbtn" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                            <button type="submit" name="btnConfirmSend" class="btnConfirmSend btn btn-primary btn-sm"><i class="fas fa-save"></i> Confirm </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="content-wrapper">
            <section class="content">
                <?php
                if(isset($_SESSION['uploadImage'])){

                    echo $_SESSION['uploadImage'];
                    unset($_SESSION['uploadImage']);
                }
                ?>
                <div class="mt-5 row">
                    <div class="col-9">
                        <div class="row">
                            <?php
                            $allProducts = $datamanipulation->checkAllproduct($_GET["shop_id"]);
                            if($allProducts){
                                foreach ($allProducts as $allProduct){
                                    ?>
                                    <div class="card col-4">
                                        <div class="card-body">
                                            <img class="w-100" height="300" src="<?php echo $allProduct->image?>"/>
                                        </div>
                                        <div class="card-footer">
                                            <span style="font-size: 23px;color: darkgoldenrod">Name: <?php echo $allProduct->product_name?></span><br>
                                            <span style="font-size:23px;color: darkgoldenrod">Price: <?php echo $allProduct->price?></span><br>
                                            <span style="font-size: 16px;">Description: <?php echo $allProduct->description?></span>
                                            <form action="../process/baby_care_process.php" method="post">
                                                <?php
                                                $true = $datamanipulation->statusCheckItem($user_id,$_GET["shop_id"],$allProduct->item_id);
                                                if(!$true){
                                                    ?>
                                                    <button class="btn btn-success form-control" name="add_card">add to cart</button><?php }
                                                else{
                                                    echo "<button disabled=true class=\"btn btn-success form-control\" name=\"add_card\">add to cart</button>";
                                                }
                                                ?>
                                                <input name="item_id" type="hidden" value="<?php echo $allProduct->item_id?>">
                                                <input name="name" type="hidden" value="<?php echo $allProduct->product_name?>">
                                                <input name="price" type="hidden" value="<?php echo $allProduct->price?>">
                                                <input name="seller_id" type="hidden" value="<?php echo $allProduct->seller_id?>">
                                                <input name="buyer_id" type="hidden" value="<?php echo $user_id?>">
                                                <input name="buyer_id" type="hidden" value="<?php echo $user_id?>">

                                            </form>
                                        </div>
                                    </div>
                                <?php }}?>
                        </div>
                    </div>
                    <div class="col-3 border-left bg-info" style="border-radius: 5px">
                        <h3 class="text-center">My Cart</h3>
                        <?php
                        $cardData=$datamanipulation->showCardData($user_id);
                        if($cardData){
                            foreach ($cardData as $list){
                                ?>
                                <div data-cart-id = "<?php echo $list->cart_id ?>" class="card">
                                    <div class="card-body">
                                        <p><?php echo "<span class='pname'> Name: ", $list->name;"</span>" ?></p>
                                        <p><?php if(!$list->uprice){ echo "<span class='pname uprice'> Price: ",  $list->price; "</span>"; } else{echo "<span class='pname uprice'> Product Price: ",  $list->uprice; "</span>"; }?></p>
                                        <p><?php echo "<span class='pname'> Qty: ", $list->quantity;"</span>" ?> </p>

                                        <form action="../process/baby_care_process.php" method="post">
                                            <input class="w-25" name="updateQuantity" type="number" min="1" value="1">
                                            <input class="w-25" name="cart_id" type="hidden" value="<?php echo $list->cart_id?>">
                                            <input class="w-25" name="totalQuantity" type="hidden" value="<?php echo $list->quantity?>">
                                            <input class="w-25" name="totalPrice" type="hidden" value="<?php echo $list->price?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></form><br>
                                        <a href="../process/baby_care_process.php?cancelQuantity=<?php echo $list->cart_id?>" class="btn bg-dark btn-outline-danger btn-sm w-50 form-control mt-1"><i class="fa fa-trash-alt"></i></a>
                                    </div>
                                </div>

                                <?php
                            }
//                            echo "<button data-toggle=\"modal\" data-target=\"#exampleModal\" class=\"btn btn-success btn-sm form-control mt-1 allItemConfirm \"><i class=\"fa fa-air-freshener\"></i>Item Confirm</button>";
                            ?>
                            <a href="../process/baby_care_process.php?confirmItem=<?php echo $user_id?>" class="btn btn-outline-success bg-secondary btn-sm form-control mt-1"><i class="fa fa-air-freshener"></i> Confirm</a>

                            <?php
                        }else{
                            ?>
                            <h5 class="text-center mt-5 text-success">Cart Is Empty</h5>
                            <?php
                        }

                        ?>
                    </div>
                </div>
            </section>
            <!-- /.content -->
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