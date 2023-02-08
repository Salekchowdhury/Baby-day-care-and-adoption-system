
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
                ?>

                <div class="container-fluid mt-5">
                    <div class="row">
                        <form action="../process/baby_care_process.php" method="post" enctype="multipart/form-data">


                            <div  class="w-100 card card-primary card-outline ">
                                <div class="card-header">
                                    <h2>Add Baby Product</h2>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-4">
                                            <label>
                                                Product Id:
                                            </label>
                                            <input type="text" name="product_id" class="form-control"/>
                                            <input type="hidden" name="seller_id" value="<?php echo $user_id?>" class="form-control"/>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Name:
                                            </label>
                                            <input type="text" name="name" class="form-control"/>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Price:
                                            </label>
                                            <input type="text" name="price" class="form-control"/>
                                        </div>


                                        <div class="col-4 mb-2">
                                            <label>
                                                Product Image:
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input"  id="customFile" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose File</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                Product Description :
                                            </label>
                                            <textarea type="text" name="description" class="form-control" cols="3" rows="5"></textarea>
                                        </div>
                                        <button class="col-6 btn btn-success mt-2 rounded" name="add_item" style="background-color: #21025d"> Add Item</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.col -->


                            <!-- /.card -->

                            <!-- /.col -->
                    </div>
                    </form>
                    <?php

                    if(isset($_SESSION['TostUpdate'])){

                        echo $_SESSION['TostUpdate'];
                        unset($_SESSION['TostUpdate']);

                    }
                    if(isset($_SESSION['DeleteMSG'])){

                        echo $_SESSION['DeleteMSG'];
                        unset($_SESSION['DeleteMSG']);

                    }
                    ?>
                    <div class="container">
                        <div class="row" style="margin-top: 15px">


                            <?php
                            $allProducts = $datamanipulation->AllMyProduct($user_id);
                            if($allProducts){
                                foreach ($allProducts as $allProduct){
                                    ?>
                                    <div class="card col-md-3 mx-4">
<!--                                        <div class="container">-->
                                            <div class="card-body">
                                                <img class="w-100" height="300" src="<?php echo $allProduct->image?>"/>
                                            </div>
                                            <div class="card-footer">
                                                <span>Name: <?php echo $allProduct->product_name?></span><br>
                                                <span>Price: <?php echo $allProduct->price?></span><br>
                                                <span style="color: #1fc8e3;font-size: 18px"><?php echo $allProduct->description?></span>
                                                <div class="row">
                                                    <div class=" col-6">
                                                        <a href="../../views/baby_care/edit_product.php?edit_product=<?php echo $allProduct->item_id?>" class="btn btn-success form-control editPost "><i class="far fa-edit"></i> </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="../process/baby_care_process.php?delete_item_id=<?php echo $allProduct->item_id?>" class="btn btn-primary btn-outline-danger form-control" name="add_card"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>
<!--                                        </div>-->

                                    </div>


                                    <?php
                                    ?>

                                <?php }}?>

                            <!-- /.row -->
                        </div>
                    </div>

                    <!-- /.row -->
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
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
    $(".editPost").click(function () {
      var value = $(this).attr('data-id');
      var postDataCollect = " ";
      $.ajax({
        type: "POST",
        url: "../process/data_process.php",
        data: {
          value: value,
          postDataCollect :postDataCollect
        },
        success: function(data)
        {
          var data = JSON.parse(data);

          $(".updateProductName").val(data.product_name)
          $(".updatePrice").val(data.price)
          $(".updateDescription").val(data.description)
          $(".item_id").val(data.item_id)

        }
      });
    })
  });
</script>
</body>
</html>