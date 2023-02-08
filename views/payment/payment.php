
<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
use App\Utility\Utility;

//$user_id = $_SESSION['user_id'];
//$email = $_SESSION['email'];
//$name = $_SESSION['name'];
//$data=$datamanipulation->showStaffProfile($user_id);
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Payment</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
            $date= date('d/m/y');
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }

            ?>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="card card-user">
                            <div class="card-body" style="background-color: #21025d">
                                <form action="../process/owner_process.php" autocomplete="off" method="post">
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">

                                                <label style="color: white">Full Name</label>
                                                <input type="text"  value="" name="name" class="form-control"  placeholder="Fullname">
<!--                                                <input type="hidden"  value="--><?php //echo $data->name?><!--"   name="name">-->
                                            </div>
                                        </div>

                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label style="color: white">Donation Amount</label>
                                                <input type="number" required name="amount" class="form-control" placeholder="Amount">
                                                <input type="hidden"  name="user_id" value="<?php echo $user_id?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label style="color: white">Phone Number<b>(bkash)</b></label>
                                                <input type="number" required class="form-control" name="phone" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="alert alert-success alert-dismissible fade show text-black-50" >Transaction ID (Send Money through Bkash to the following number, and give the transaction ID.)</label>
                                                <h2 class="mb-0" style="color: white">Bkash Agent Number <strong>(+880 1786-563745)</strong></h2>


                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label style="color: white">Transaction ID </label>
                                                <input type="text" class="form-control" required name="transaction" placeholder="Transaction Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label style="color: white">Date</label>
                                                <input type="text"  disabled class="form-control datepicker" value="<?php echo $date?>"  placeholder="Date">
                                                <input type="hidden"  value="<?php echo $date?>" name="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="update mr-auto ml-3">
                                            <button type="submit"  name="send_donation" class="btn btn-rounded btn-success">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="">

                            <!-- Profile Image -->
                            <div style="height: 96%" class="card card-primary card-outline ">

                            </div>

                        </div>
                        <!-- /.col -->


                        <!-- /.card -->

                        <!-- /.col -->
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