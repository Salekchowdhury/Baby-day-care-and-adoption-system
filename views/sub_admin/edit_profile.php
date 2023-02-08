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
                        <a href="profile.php" class="nav-link active">
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
                    <li class="nav-item">
                        <a href="day_care.php" class="nav-link">
                            <i class="nav-icon fas fa-crutch"></i>
                            <p>Day Care</p>
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
                    <li class="nav-item has-treeview">
                        <a href="chat.php" class="nav-link">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                Chat
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>Profile Information</h1>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                ?>
            </div>
        </section>
        <section class="content">
            <div class="row w-50 text-center" style=" border-bottom-left-radius: 25px; border-top-right-radius: 25px">
                <div class="col-10 text-center">
                    <div class="tab-content">
                        <?php
                        $data=$datamanipulation->showAdminDataById($user_id);
                        //var_dump($data);

                        ?>
                        <div class="tab-pane active" id="settings">
                            <div class="row text-center">
                                <form action="../process/baby_care_process.php" method="post" enctype="multipart/form-data">
                                    <div class="col-12" >
                                        <div class="pl-3" style="margin-left: 5px; border: 2px  royalblue; margin-top: 15px;background-color: #21025d; border-radius: 20px; height:480px">
                                            <?php
                                            ?>
                                            <img class="text-left mt-3" style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $data->image?>" alt="Avatar" class="m-4 avatar mb-2">
                                            <br>
                                            <input class="mb-3 text-white" type="file" name="photo">
                                            <br>
                                            <input required class="text-left mb-3"  type="text" name="name" value="<?php echo $data->name?>">
                                            <input  class="text-left mb-3"  type="hidden" name="id" value="<?php echo $user_id?>">

                                            <input required class="text-left"  type="text" name="phone" value="<?php echo $data->phone?>">

                                            <input required class="text-left mb-3"  type="text" name="email" value="<?php echo $data->email?>">
                                            <input required class="text-left"  type="password" name="password" value="<?php echo $data->password?>">
                                            <textarea required class="w-75" name="address" rows="3"><?php echo $data->address?></textarea>
                                            <br>
                                            <a href="profile.php" class="btn btn-sm btn-primary">Back</a>
                                            <button class="btn btn-sm btn-success btn-outline-primary text-white" name="updateAdminProfile">Update</button>
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


    <!-- /.content-wrapper -->

    <aside class="control-sidebar control-sidebar-dark">
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../contents/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../contents/js/demo.js"></script>
<script src="../../contents/js/dist/wow.min.js"></script>
<script>
  new WOW().init();
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>

</body>
</html>
