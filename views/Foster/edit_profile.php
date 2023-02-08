
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
</head>
<body>
<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #520a5d">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <ul class="navbar-nav navbar-nav-right ml-auto">


                <h3 class="mb-0 font-weight-medium d-none d-lg-flex" style="color: white"><?php echo $data->email?></h3>


            </ul>

        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #520a5d">
            <ul class="nav">

                <li class="nav-item nav-profile">
                    <a href="profile.php" class="nav-link">
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
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-title">Profile </span>
                        <i class="fas fa-male menu-icon menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="view_baby.php">
                        <span class="menu-title">Adopt Baby</span>
                        <i class="fas fa-baby menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">
                        <span class="menu-title">Chat</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">
                        <span class="menu-title">Contact Us</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_rating.php">
                        <span class="menu-title">Rating</span>
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
                        <div class="col-sm-6">
                            <h1>Edit Profile</h1>
                        </div>
                        <?php
                        if (isset($_SESSION["Success"])){
                            echo $_SESSION["Success"];
                            unset($_SESSION["Success"]);
                        }
                        if (isset($_SESSION["Wrong"])){
                            echo $_SESSION["Wrong"];
                            unset($_SESSION["Wrong"]);
                        }  if (isset($_SESSION["uploadImage"])){
                            echo $_SESSION["uploadImage"];
                            unset($_SESSION["uploadImage"]);
                        }
                        ?>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row w-50 text-center" style=" border-bottom-left-radius: 25px; border-top-right-radius: 25px">
                    <div class="col-10 text-center">
                        <div class="tab-content">
                            <?php
                            $data=$datamanipulation->showFosterProfile($user_id);
                            //var_dump($data);
                            ?>
                            <div class="tab-pane active" id="settings">
                                <div class="row text-center">
                                    <form action="../process/baby_care_process.php" method="post" enctype="multipart/form-data">
                                        <div class="col-12" >
                                            <div class="pl-3" style="margin-left: 5px; border: 2px  royalblue; margin-top: 15px;background-color: #520a5d; border-radius: 20px; height:480px">
                                                <?php
                                                ?>
                                                <img class="text-left mt-3" style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $data->image?>" alt="Avatar" class="m-4 avatar mb-2">
                                                <input class="mb-3" type="file" name="photo">
                                                <input required class="text-left mb-3"  type="text" name="name" value="<?php echo $data->name?>">
                                                <input  class="text-left mb-3"  type="hidden" name="id" value="<?php echo $user_id?>">

                                                <input required class="text-left"  type="text" name="phone" value="<?php echo $data->phone?>">

                                                <input required class="text-left mb-3"  type="text" name="email" value="<?php echo $data->email?>">
                                                <input required class="text-left"  type="password" name="password" value="<?php echo $data->password?>">
                                                <textarea required class="w-75" name="address" rows="3"><?php echo $data->address?></textarea>
                                                <br>
                                                <a href="profile.php" class="btn btn-sm btn-primary">Back</a>
                                                <button class="btn btn-sm btn-success btn-outline-primary" name="updateProfile">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <div style="height: 96%" class="card card-primary card-outline ">

                            </div>
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

</body>
</html>