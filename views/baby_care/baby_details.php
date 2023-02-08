
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
                <li class="nav-item active">
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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-12 d-flex justify-content-start">
                            <h1>Baby Information</h1>
                        </div>
                        <?php
                        if($_GET['baby_id']){
                            $baby_id = $_GET['baby_id'];
                            $babyData = $datamanipulation->showRegisterBabyDataById($baby_id);

                        }
                        if (isset($_SESSION["Success"])){
                            echo $_SESSION["Success"];
                            unset($_SESSION["Success"]);
                        }
                        if (isset($_SESSION["Wrong"])){
                            echo $_SESSION["Wrong"];
                            unset($_SESSION["Wrong"]);
                        }  if (isset($_SESSION["registerBaby"])){
                            echo $_SESSION["registerBaby"];
                            unset($_SESSION["registerBaby"]);
                        }
                        ?>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row" style="background-color: rgba(9,9,9,0.96); border: 3px dashed; border-color: #b40e50; border-bottom-left-radius: 25px; border-top-right-radius: 25px">
                    <div class="col-9">
                        <div class="tab-content">
                            <?php
//                            $babyData=$datamanipulation->showBabyDetails($user_id);
                            //var_dump($data);

                            ?>
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal" action="../process/baby_care_process.php" method="post" enctype="multipart/form-data" >
                                    <div class="row">

                                        <div class="col-6" >

                                            <div class="form-group row mt-3">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Name:</label><span> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="name" required class="form-control" value="<?php echo $babyData->name?>" style="border-radius: 25px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Age:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="number" disabled name="age" required class="form-control" value="<?php echo $babyData->age?>" style="border-radius: 25px">
                                                    <input type="hidden" name="gurdian_id"  class="form-control" value="<?php echo $user_id?>" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Gender:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="age" required class="form-control" value="<?php echo $babyData->gender?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Admit:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="date" disabled required class="form-control" name="admit_date" value="<?php echo $babyData->admit_date?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-6" >

                                            <div class="form-group row mt-3">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Floor:</label><span> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="name" required class="form-control" value="<?php echo $babyData->floor?>" style="border-radius: 25px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Room:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="number" disabled name="age" required class="form-control" value="<?php echo $babyData->room?>" style="border-radius: 25px">
                                                    <input type="hidden" name="gurdian_id"  class="form-control" value="<?php echo $user_id?>" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Seat:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="age" required class="form-control" value="<?php echo $babyData->seat?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Room Type:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled required class="form-control" name="admit_date" value="<?php echo $babyData->room_type?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- /.tab-pane -->
                        </div>

                    </div>
                    <div class="col-md-3 ">
                        <div class="tab-content" style="border: 1px solid white;margin: 5px; border-radius: 18px" >
                            <div class="tab-pane active" id="settings">
                                <div class="row">
                                    <div class="col-11 p-4">
                                        <?php
                                        $current_date =date("d/m/Y");
                                        ?>
                                        <strong class="text-success pb-2">TODAY:</strong><span class="text-light"> <?php echo $current_date?></span>
                                        <br>
                                        <strong class="text-success ">CONDITION:</strong><span class="text-light"> NORMAL</span>
                                        <br>
                                        <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $babyData->image?>" alt="Avatar" class="m-4 avatar mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <br>
                        <h2>Nurse</h2>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Address
                                        </th>

                                        <th>
                                            Image
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                        <?php
                                        $data= $datamanipulation->showNurseById($babyData->nurse_id);
                                        if($data){
                                            ?>
                                            <tr>
                                                <td><?php echo $data->name?></td>
                                                <td><?php echo $data->phone?></td>
                                                <td><?php echo $data->address?></td>
                                                <td>
                                                    <img src="<?php echo $data->image?>" width="80" height="80" style="border-radius: 50%">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="col-md-6">
    <br>
    <h2>Vaccine</h2>
    <div class="card card-plain">

        <div class="card-body" style="background-color: ">
            <div class="scroll-content">
                <table class="table">
                    <thead class=" text-primary" style="background-color: #0c525d">

                    <th>
                        Name
                    </th>
                    <th>
                        Date
                    </th>


                    </thead>
                    <tbody class="attrTable">

                    <?php
                    $datas= $datamanipulation->showVaccineByBabyId($baby_id);
                    if($datas){
                        foreach ($datas as $data){
                            ?>
                            <tr>
                                <td><?php echo $data->vaccine_name?></td>
                                <td><?php echo $data->date?></td>

                            </tr>
                            <?php
                        }

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <br>
                        <h2>Food</h2>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            Food
                                        </th>
                                        <th>
                                            time
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                        <?php
                                        $current_date =date('Y-m-d');
                                        $datas= $datamanipulation->showFoodListByBabyId($baby_id);
                                        if($datas){
                                            foreach ($datas as $data){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->food?></td>
                                                    <td><?php echo $data->time?></td>
                                                    <td><?php echo $data->date?></td>

                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <h2>Attendance</h2>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            IN
                                        </th>
                                        <th>
                                            OUT
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                        <?php
                                        $current_date =date('Y-m-d');
                                        $datas= $datamanipulation->showAttentanceByBabyId($baby_id);
                                        if($datas){
                                            foreach ($datas as $data){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->in_time?></td>
                                                    <td><?php echo $data->out_time?></td>
                                                    <td><?php echo $data->date?></td>

                                                </tr>
                                                <?php
                                            }

                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12">
                        <br>

                    </div>



                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <div style="height: 96%" class="card card-primary card-outline ">
                            </div>
                        </div>
                    </div>
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

</body>
</html>