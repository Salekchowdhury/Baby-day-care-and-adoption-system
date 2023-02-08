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
$data=$datamanipulation->showAdminDataById($user_id);
include_once '../../views/Admin/adminHeader.php';
?>

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(21,3,71,0.86)">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px; color: white; padding-left: 10px;padding-right: 730px;"><?php echo $data->email?></strong>
            </li>

        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: rgba(21,3,71,0.86); position: fixed">
        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <img src="<?php echo $data->image?>" class="img-circle elevation-2"  alt="User Image">

                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $data->name?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="profile.php" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="nurse.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-nurse"></i>
                            Nurse

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pending_account.php" class="nav-link">
                            <i class="nav-icon  fas fa-calendar-check"></i>
                            <p>Pending Account</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="control_account.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Control Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="create_admin.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Create Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="transaction.php" class="nav-link ">
                            <i class="nav-icon fas fa-money-bill"></i>
                            Transaction

                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="products.php" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="product_request.php" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Product Request
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="day_care.php" class="nav-link">
                            <i class="nav-icon fas fa-crutch"></i>
                            <p>Day Care</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="adopt_request.php" class="nav-link">
                            <i class="nav-icon fas fa-baby"></i>
                            <p>
                                Adopt Request
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="chat.php" class="nav-link">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                Chat
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="notice.php" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-circle"></i>

                            <p>
                                Notice
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../../views/process/admin_process.php?logout=1" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Logout</p>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Information</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="">

                        <div style="height: 96%" class="card card-primary card-outline ">

                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div style="" class="h-auto card ">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <?php
                                            if(isset($_GET['details_id'])){
                                                $babyData =$datamanipulation->showRegisterBaby($_GET['details_id']);
                                                if($babyData){
                                                    $userId =$babyData->user_id;
                                                    $childId =$babyData->child_id;
                                                    $data =$datamanipulation->showStaffProfile($userId);
                                                    $adoptData =$datamanipulation->showBabyDataById($childId);
                                                }

//                            $checkEmail=$datamanipulation->checkValid($_GET['view_building_woner_profile_by_email']);
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img class="img-circle" width="300" height="200"
                                                         src="<?php echo $data->image?>"
                                                         alt="User profile picture">
                                                </div>
                                                <div class="col-md-4">
                                                    <img class="" width="300" height="200"
                                                         src="<?php echo $data->nid_front?>"
                                                         alt="NID Front Image">
                                                </div>
                                                <div class="col-md-4">
                                                    <img class="" width="300" height="200"
                                                         src="<?php echo $data->nid_back?>"
                                                         alt="NID Back Image">
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="mt-4 text-muted text-center">Bio</h3>
                                        <p class="text-muted text-center"><?php echo $data->address?></p>

                                    </div>

                                </ul>
                                <?php

                                if(isset($_SESSION['updatetMsg'])){
                                    echo $_SESSION['updatetMsg'];
                                    unset($_SESSION['updatetMsg']);
                                }
                                ?>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="settings">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-center text-red text-uppercase"><strong>Client Info</strong></p>

                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Name:</label><span> <b style="font-size: 28px;"><?php echo $data->name?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Email:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->email?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Phone:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->phone?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Position:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->position?></b></span>

                                                    </div>

                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Account Status:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->status?></b></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-center text-red text-uppercase"><strong>Baby Info</strong></p>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Name:</label><span> <b style="font-size: 28px;"><?php echo $adoptData->name?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Weight:</label><span class=""> <b style="font-size: 28px;"><?php echo $adoptData->weight?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Age:</label><span class=""> <b style="font-size: 28px;"><?php echo $adoptData->age?></b></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Gender:</label><span class=""> <b style="font-size: 28px;"><?php echo $adoptData->gender?></b></span>

                                                    </div>
                                                     <div class="form-group">
                                                        <label  class="col-sm-2 col-form-label">Date:</label><span class=""> <b style="font-size: 28px;"><?php echo $adoptData->date?></b></span>

                                                    </div>

                                                </div>

                                            </div>
                                            <hr class="text-dark">
                                            <h2>DOCUMENTS</h2>
                                            <div class="row">
                                                <div class="col-md-5">
                                                   <p><strong>Land Paper</strong></p>
                                                    <img class="" width="300" height="200"
                                                         src="<?php echo $babyData->land_paper?>"
                                                         alt="User profile picture">
                                                </div>
                                                <div class="col-md-5">
                                                    <p><strong>Electric Bill</strong></p>
                                                    <img class="" width="300" height="200"
                                                         src="<?php echo $babyData->electric_bill?>"
                                                         alt="NID Front Image">
                                                </div>
                                                <div class="col-md-2">
                                                    <?php
                                                    if($babyData->status == 'yes'){
                                                        ?>
                                                        <a  style="color: white" class="btn btn-success  btn-group" href="add_baby_report.php?confirm_adopt=<?php echo $babyData->child_id?>" >Add Report</a>
                                                        <a style="color: white" class="btn btn-info  btn-outline-primary btn-group" href="mail_to_uses.php?email_id=<?php echo $userId?>" >EMAIL</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <a  style="color: white" class="btn btn-success  btn-outline-primary  btn-group" href="../process/admin_process.php?confirm_adopt=<?php echo $babyData->id?>" >CONFIRM</a>
                                                        <a style="color: white" class="btn btn-info  btn-outline-primary btn-group" href="mail_to_uses.php?email_id=<?php echo $userId?>" >EMAIL</a>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <?php

                                                if(isset($_SESSION['reportMsg'])){
                                                    echo $_SESSION['reportMsg'];
                                                    unset($_SESSION['reportMsg']);
                                                }
                                                ?>
                                            </div>

                                        <hr class="mt-4 text-dark">
                                        <h2>REPORT</h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="py-1"><?php echo $adoptData->report_date?></p>
                                                <strong><?php echo $adoptData->report?></strong>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/js/adminlte.min.js"></script>
<script src="../../contents/js/demo.js"></script>
</body>
</html>
