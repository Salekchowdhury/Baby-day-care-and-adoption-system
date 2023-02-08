
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
                <li class="nav-item active">
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

        <div class="content-wrapper">
            <section class="content-header" style="background-color: rgba(116,12,41,0.6)">
                <div>

                </div>

                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h3>My Order History</h3>
                            <?php

                            if(isset($_SESSION['updatetMsg'])){
                                echo $_SESSION['updatetMsg'];
                                unset($_SESSION['updatetMsg']);
                            }
                            if(isset($_SESSION['confirmMSG'])){
                                echo $_SESSION['confirmMSG'];
                                unset($_SESSION['confirmMSG']);
                            }
                            ?>

                            <table id="sohag1" class="table table-bordered table-hover">
                                <thead>
                                <tr style="color: white;background-color: rgba(116,12,41,0.6);position:;">
                                    <th>Serial</th>
                                    <th>Product Name</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Phone</th>
                                    <th>Address</th>
<!--                                    <th>Number</th>-->
                                    <th>Quantity</th>
<!--                                    <th>Delivery Date</th>-->
<!--                                    <th>Payment Method</th>-->
<!--                                    <th>Transaction Number</th>-->
                                    <th>Price</th>

                                    <th style="text-align: center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $lists=$datamanipulation->showMyOrderHistoryById($user_id);
                                $s=1;
                                foreach ($lists as $list){
                                 $buyerData = $datamanipulation->showStaffProfile($list->buyer_id);
                                    ?>
                                    <tr>
                                        <td><?php echo $s?></td>
                                        <td><?php echo $list->name?></td>
                                        <td><?php echo $buyerData->name?></td>
                                        <td><?php echo $buyerData->phone?></td>
                                        <td><?php echo $buyerData->address?></td>
<!--                                        <td>--><?php //echo $list->phone?><!--</td>-->
                                        <td><?php echo $list->quantity?></td>
<!--                                        <td>--><?php //echo $list->confirm_date?><!--</td>-->
<!--                                        <td>--><?php //if($list->transaction_id){
//                                                echo "Bkash";
//                                            }else{
//                                                echo "Cash on Delivery";
//                                            }?><!--</td>-->
<!--                                        <td>--><?php //echo $list->transaction_id?><!--</td>-->
                                        <?php
                                        if($list->uprice){
                                            ?>
                                            <td><?php echo $list->uprice ?></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><?php echo $list->price ?></td>
                                            <?php
                                        }
                                        ?>

                                        <td>
                                            <?php
                                            if($list->confirm_status=='yes'){
                                                ?>
                                                <a style="color: red"  href="" <i class=" disabled btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i> CONFIRMED</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a style="color: white"  href="confirm_history.php?cart_id=<?php echo $list->cart_id?>"title="Confirm Order" <i class=" btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i> CONFIRM</a>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $s++;
                                }
                                ?>




                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>




            </section>



            <footer>

            </footer>
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
<script>
  $('.custom-file-input').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>
</body>
</html>