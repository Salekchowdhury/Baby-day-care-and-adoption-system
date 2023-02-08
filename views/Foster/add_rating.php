
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
                            <p  class="profile-name"><?php echo $data->name?></p>
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
                <li class="nav-item ">
                    <a class="nav-link" href="contact_us.php">
                        <span class="menu-title">Contact Us</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item active">
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
                            <h1 style="color: #3c763d">Rating</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        if(isset($_GET['rating_user_id'])){
//                            $userDetails=$datamanipulation->sellerById($_GET['rating_user_id']);
                            //var_dump($userDetails);

                        }
                        ?>
                        <div class="col-md-5" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">

                            <!-- Profile Image -->
                            <div style="height: 96%; background-color: #0b1921" class="card card-primary card-outline ">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-center">

                                                <br>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-group list-group-unbordered mb-3" style="list-style: none; color: white">
                                                <br>

                                                <div class="flex flex-column text-center fa-2x">
                                                    <?php
//                                                    $totalUsers = $datamanipulation->totalRatingUsers();

                                                    $rateList = $datamanipulation->totalAdoptRating();
                                                    $totalUsers = $datamanipulation->totalRatingUsers();
                                                    //var_dump($rateList);
                                                    $totalRatingAvg = $rateList[0]->averageRating;
                                                    $int = (int)$totalRatingAvg;

                                                    if($rateList){
                                                        for ($i=1;$i<6;$i++){
                                                            if($int>=$i){
                                                                echo "<i style='color: #1D00AF' class=\"far fa-star \"></i>";
                                                            }else{
                                                                echo "<i class=\"far fa-star\"></i>";
                                                            }
                                                        }

                                                    }
                                                       ?> (<?php echo $totalUsers->totalClient?>)<?php
                                                    ?>

                                                </div>
                                                <?php
                                                $check = $datamanipulation->checkRating($user_id);
                                                if(!$check){
                                                    echo "<button class=\"btn btn-success mt-2 d-block mx-auto\" data-toggle=\"modal\" data-target=\"#exampleModal\" style=\"background-color: #520a5d\">Rating</button>";
                                                }
                                                ?>



                                                <form id="rateForm" action="../process/data_process.php" method="post">
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                        <div class="modal-dialog" role="document" >
                                                            <div class="modal-content" style="background-color: #520a5d">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">BABY DAY CARE AND ADOPTION SYSTEM</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="flex flex-column text-center fa-2x text-dark">
                                                                        <i class="far fa-star one"></i>
                                                                        <i class="far fa-star two"></i>
                                                                        <i class="far fa-star three"></i>
                                                                        <i class="far fa-star four"></i>
                                                                        <i class="far fa-star five"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="coutnRating" name="coutnRating" value="">
                                                                    <input type="hidden" name="client_id" value="<?php echo $user_id?>">
                                                                    <input type="hidden" name="postion" value="Baby_Adopt">
                                                                    <button type="button"  class="btn btn-secondary Close-rate" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submitRating" class="submitRating btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                            </ul>
                                        </div>
                                    </div>




                                </div>
                            </div>

                        </div>



                        <!-- /.col -->

                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


    </div>

    <script src="../../contents/plugins/jquery/jquery.min.js"></script>

    <script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../contents/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="../../contents/js/adminlte.min.js"></script>

    <script src="../../contents/js/demo.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        bsCustomFileInput.init();

        var count = 0;

        $(".one").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","")
          $(".three").css("color","")
          $(".four").css("color","")
          $(".five").css("color","")
          count=1;
          $(".coutnRating").val(count)
        })
        $(".two").click(function () {
          $(this).css("color","yellow")
          $(".one").css("color","yellow")
          $(".three").css("color","")
          $(".four").css("color","")
          $(".five").css("color","")
          count=2;
          $(".coutnRating").val(count)
        })
        $(".three").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".one").css("color","yellow")
          $(".four").css("color","")
          $(".five").css("color","")
          count=3;
          $(".coutnRating").val(count)
        })
        $(".four").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".three").css("color","yellow")
          $(".one").css("color","yellow")
          $(".five").css("color","")
          count=4;
          $(".coutnRating").val(count)
        })
        $(".five").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".three").css("color","yellow")
          $(".four").css("color","yellow")
          $(".one").css("color","yellow")
          count=5;
          $(".coutnRating").val(count)
        })

        $(".Close-rate").click(function () {
          $(".one").css("color","")
          $(".two").css("color","")
          $(".three").css("color","")
          $(".four").css("color","")
          $(".five").css("color","")
          count=0;
          $(".coutnRating").val(count)
        })

        $(".submitRating").click(function (e) {
          e.preventDefault()
          if(count>0){
            $("#rateForm").submit()
          }
        })




      });
    </script>
</body>
</html>







