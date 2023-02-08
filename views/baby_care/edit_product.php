
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
                <li class="nav-item active">
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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

                <?php

                if(isset($_SESSION['uploadImage'])){

                    echo $_SESSION['uploadImage'];
                    unset($_SESSION['uploadImage']);

                }   if(isset($_SESSION['errorId'])){

                    echo $_SESSION['errorId'];
                    unset($_SESSION['errorId']);

                }
                if(isset($_GET['edit_product'])){
                    $product = $datamanipulation->postDataCollectviaUserId($_GET['edit_product']);
                }
                ?>


                <div class="container-fluid mt-5">
                    <div class="row">
                        <form action="../process/baby_care_process.php" method="post" enctype="multipart/form-data">

                            <div  class="w-100 card card-primary card-outline ">
                                <div class="card-header">
                                    <h2>Edit Baby Product</h2>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-4">
                                            <label>
                                                Product Id:
                                            </label>
                                            <input type="text" name="product_id" value="<?php echo $product->product_id?>"  class="form-control"/>
                                            <input type="hidden" name="item_id" value="<?php echo $_GET['edit_product']?>" class="form-control"/>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Name:
                                            </label>
                                            <input type="text" name="updateProductName" value="<?php echo $product->product_name?>"  class="form-control"/>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Price:
                                            </label>
                                            <input type="text" name="updatePrice" value="<?php echo $product->price?>"  class="form-control"/>
                                        </div>


                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Image:
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input"  id="customFile" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose File</label>
                                                <img class="mt-2" src="<?php echo $product->image?>" width="80" height="80" style="border-radius: 50%">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                Product Description :
                                            </label>
                                            <textarea type="text" name="updateDescription" class="form-control" cols="3" rows="5"><?php echo $product->description?></textarea>
                                        </div>
                                        <a href="add_product.php" class="col-6 btn btn-success mt-2 rounded mt-5" style="background-color: #21025d">Back</a>
                                        <button class="col-6 btn btn-success mt-2 rounded mt-5" name="btn_save_changes" style="background-color: #21025d"> Edit Product </button>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>


                </div><!-- /.container-fluid -->
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
<script>


  $('.custom-file-input').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });


</script>

</body>
</html>