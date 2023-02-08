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
                        <a href="day_care.php" class="nav-link active">
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
        <section class="content-header">
            <div>

            </div>
            <div class="col-12 text-light">
                <div class="card text-light" style="background-color: rgba(17,4,71,0.86)">
                    <?php

                    ?>
                    <div class="card-body">
                        <h3 style="color: white">Day Care</h3>
                        <?php

                        if(isset($_SESSION['updatetMsg'])){
                            echo $_SESSION['updatetMsg'];
                            unset($_SESSION['updatetMsg']);
                        }
                        if(isset($_SESSION['conMsg'])){
                            echo $_SESSION['conMsg'];
                            unset($_SESSION['conMsg']);
                        }
                        ?>

                        <table id="sohag1" class="table table-bordered table-hover ">
                            <thead>
                            <tr style="color: cornflowerblue;background-color: bisque;">
                                <th>S#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $lists=$datamanipulation->showAllRegisterBaby();
                            //var_dump($totalAcount);
                            $s=1;
                            if($lists){
                                foreach ($lists as $list) {
                                    ?>
                                    <tr>
                                        <td style="color: white"><?php echo $s?></td>
                                        <td><img src="<?php echo $list->image?>" height="70px" width="70px"></td>
                                        <td style="color: white"><?php echo $list->name?></td>
                                        <td style="color: white"><?php echo $list->age?></td>
                                        <td style="color: white"><?php echo $list->gender?></td>


                                        <td>
                                            <a href="day_care_baby_details.php?view_details=<?php echo $list->id?>"title="Details" <i class="btn btn-success far fa-eye"></i> VIEW</a>
                                            <?php
                                            if($list->status == 'yes'){
                                                ?>
                                                <a  class="btn btn-danger" <i class="btn btn-success far fa-check-circle"></i> CONFIRMED</a>

                                                <?php
                                            }else{
                                                ?>
                                                <a href="../process/admin_process.php?confirm_register_baby_id=<?php echo $list->id?>"title="Confirm" <i class="btn btn-success far fa-check-circle"></i> CONFIRM</a>

                                                <?php
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $s++;
                                }
                            }
                            ?>





                            </tbody>

                        </table>
                    </div>
                </div>
            </div>





        </section>



        <footer>

        </footer>
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
