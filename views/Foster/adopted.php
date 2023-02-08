
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
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-title">Profile </span>
                        <i class="fas fa-male menu-icon menu-icon"></i>

                    </a>
                </li>

                <li class="nav-item active">
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
            <a href="" class="btn btn-outline-primary text-light btn-outline-facebook bg-dark">ADOPTED</a>
            <!-- Content Header (Page header) -->

            <?php
            $date= date('d/m/y');
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }

            ?>

            <div class="row ">

                <?php
//                $childData=$datamanipulation->showAllChild();
                $childData=$datamanipulation->showAllChildByUserId($user_id);
                if($childData){
                    foreach ($childData as $list){
                            $list=$datamanipulation->showBabyDataById($list->child_id);
                        ?>
                        <div style="width: 30%; height: 390px;border-radius: 10px;background-image: linear-gradient(rgba(92,23,92,0.57), rgba(62,56,61,0.74),rgba(39,15,21,0.93));margin: 15px;">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center mt-4">
                                    <img src="<?php echo $list->image?>" height="200" width="200" style="border-radius: 50%">
                                </div>
                            </div>
                            <div class="container">
                                <div class="row ">

                                    <div class="col-md-12 mt-1 d-flex justify-content-center">
                                      <?php
                                      if($list->status == 'no'){
                                          ?>
                                          <h5 class="text-white"><?php echo $list->name?><span class="text-danger">(Pending)</span></h5>
                                          <?php
                                      }else{
                                          ?>
                                          <h5 class="text-white"><?php echo $list->name?><span class="text-success">(Accepted)</span></h5>
                                          <?php
                                      }

                                      ?>

                                    </div>

                                </div>
                                <div class="row d-flex justify-content-between">

                                    <div class="col-md-4 ">
                                        <b class="text-white">Weight: </b>
                                        <p style="color: white"> <?php echo $list->weight?> Kg</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b class="text-white">Gender: </b>
                                        <p style="color: white"> <?php echo $list->gender?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b class="text-white">Age: </b>
                                        <p style="color: white"> <?php echo $list->age?></p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

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