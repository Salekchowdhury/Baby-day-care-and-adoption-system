
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
        <section class="content-header">
            <div>

            </div>

                <?php
                if (isset($_SESSION["successMsg"])){
                    echo $_SESSION["successMsg"];
                    unset($_SESSION["successMsg"]);
                }
                if (isset($_SESSION["babyMsg"])){
                    echo $_SESSION["babyMsg"];
                    unset($_SESSION["babyMsg"]);
                }
                if(isset($_GET['baby_id'])){
                    $baby_id=$_GET['baby_id'];

                    $baby_details=$datamanipulation->showBabyDataById($baby_id);
                }
                ?>
                <h3>Send Request</h3>
                <div class="">

                    <div class="row">
                        <div class="col-4">
                            <form class="" action="../process/baby_care_process.php" method="post">
                                        <div class="form-group  mt-3">
                                             <img src="<?php echo $baby_details->image?>" width="220" height="220" style="border-radius: 50%">
                                            <br>
                                            <br>
                                            <div >
                                                <input type="name" name="" disabled placeholder="" required class="form-control" value="Name: <?php echo $baby_details->name?>" style="border-radius: 25px">
                                                <input type="hidden" name="id"   value="<?php echo $user_id?>" >
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div >
                                                <input type="text" name="" disabled placeholder="" required class="form-control" value="Weight: <?php echo $baby_details->weight?> KG" style="border-radius: 25px">

                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div >
                                                <input type="text" name="phone" disabled required  class="form-control" value="Age: <?php echo $baby_details->age?>" style="border-radius: 25px">
                                            </div>
                                        </div>

                                        <div class="form-group ">

                                            <div >
                                                <input type="text" name="amount" placeholder="Amount" disabled required class="form-control" value="Gander: <?php echo $baby_details->gender?>" style="border-radius: 25px">
                                            </div>
                                        </div>


                                        <div class="form-group ">

                                            <div >
                                                <input type="text"  placeholder="" disabled required class="form-control" name="token" value="Date: <?php echo $baby_details->date?>" style="border-radius: 25px">
                                            </div>
                                        </div>

                                <!-- <div class="form-group row">
                                   <div class="btn  btn-group offset-sm-2 col-sm-10">
                                     <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                                   </div>
                                 </div>-->
                            </form>


                        </div>

                        <div class="col-7  ml-1">

                            <div class="card-body" style="background-color: ">
                                 <form action="../process/data_process.php" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="child_id" value="<?php echo $baby_id?>">
                                     <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                        <div class="row">
                                            <div class="bg-secondary rounded p-3 mb-3">
                                                <strong class=""><span class="" style="color: red"> N.B.</span> Please upload original documents of your electricity bill, house land papers</strong>
                                            </div>
<!--                                            <div class="col-md-4">-->
<!--                                                <div style="margin-top: 10px;margin-bottom: 10px;" class="form-group">-->
<!--                                                    <label class="pl-2">Gas Bill: </label><br/>-->
<!--                                                    <input  name="photo" type="file" class="file-upload-field" accept="image/*" required>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="col-md-6">
                                                <div style="margin-top: 10px;margin-bottom: 10px;" class="form-group">
                                                    <label class="pl-2 ">Electric Bill: </label><br/>
                                                    <input  name="electric_bill" type="file" class="file-upload-field" accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="margin-top: 10px;margin-bottom: 10px;" class="form-group">
                                                    <label class="pl-2">Land Paper: </label><br/>
                                                    <input  name="land_paper" type="file" class="file-upload-field" accept="image/*" required>
                                                </div>
                                            </div>
                                        </div>


                                     <textarea class="mt-5" cols="60" rows="5" name="application" placeholder="Write your note(Optional)"></textarea>
                                      <div class="">
                                          <a href="view_baby.php" type="submit" class="btn btn-primary btn-rounded  mb-2"  name="request" value="Back" style="margin-top: 15px;font-size: 21px; text-align: center;border: 1px solid;" >Back</a>
                                          <input type="submit" class="btn btn-success btn-rounded  mb-2"  name="request" value="Send Request" style="margin-top: 15px;font-size: 21px; text-align: center;border: 1px solid;" >
                                      </div>

                                 </form>
                            </div>
                        </div>


                    </div>
                </div>





        </section>



        <footer>

        </footer>
    </div>

</div>

<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/plugins/chart.js/Chart.min.js"></script>
<script src="../../contents/plugins/sparklines/sparkline.js"></script>
<script src="../../contents/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../contents/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../contents/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../../contents/plugins/moment/moment.min.js"></script>
<script src="../../contents/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../contents/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../contents/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../contents/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../contents/js/adminlte.js"></script>
<script src="../../contents/js/pages/dashboard.js"></script>
<script src="../../contents/js/demo.js"></script>

<script>
    $(function () {
        $("#parvez1").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#parvez2").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#parvez3").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        $('#sohag').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>


