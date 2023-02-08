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
                        <a href="product_request.php" class="nav-link active">
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
        <section class="content-header">
        </section>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h3></h3>
                            <?php

                            if(isset($_SESSION['updatetMsg'])){
                                echo $_SESSION['updatetMsg'];
                                unset($_SESSION['updatetMsg']);
                            }
                            if(isset($_SESSION['confirmMSG'])){
                                echo $_SESSION['confirmMSG'];
                                unset($_SESSION['confirmMSG']);
                            }
                            ?>

                            <table id="sohag1" class="table table-bordered table-hover">
                                <thead>
                                <tr style="color: white;background-color: rgba(21,3,71,0.86);position:;">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <!--                                    <th>Number</th>-->
                                    <th>Quantity</th>
                                    <!--                                    <th>Delivery Date</th>-->
                                    <!--                                    <th>Payment Method</th>-->
                                    <!--                                    <th>Transaction Number</th>-->
                                    <th>Price</th>
                                    <th style="text-align: center">Status</th>

                                    <th style="text-align: center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $lists=$datamanipulation->showMyOrderHistory();
                                $s=1;
                                foreach ($lists as $list){

                                    ?>
                                    <tr>
                                        <td><?php echo $s?></td>
                                        <td><?php echo $list->name?></td>
                                        <!--                                        <td>--><?php //echo $list->phone?><!--</td>-->
                                        <td><?php echo $list->quantity?></td>
                                        <!--                                        <td>--><?php //echo $list->confirm_date?><!--</td>-->
                                        <!--                                        <td>--><?php //if($list->transaction_id){
                                        //                                                echo "Bkash";
                                        //                                            }else{
                                        //                                                echo "Cash on Delivery";
                                        //                                            }?><!--</td>-->
                                        <!--                                        <td>--><?php //echo $list->transaction_id?><!--</td>-->
                                        <?php
                                        if($list->uprice){
                                            ?>
                                            <td><?php echo $list->uprice ?></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><?php echo $list->price ?></td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <?php
                                            if($list->confirm_status=='yes'){
                                                ?>
                                                <div class="text-center">
                                                    <a style="color: red"  href="" <i class=" disabled btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i> CONFIRMED</a>

                                                </div>

                                                <?php
                                            }else{
                                                ?>
                                                <div class="text-center">
                                                    <a style="color: white"  href=""title="Confirm Order" <i class="disabled text-dark btn btn-success btn-outline-primary far fa-check-square" aria-hidden="true"></i> PENDING</a>

                                                </div>

                                                <?php
                                            }
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            if($list->confirm_status=='yes'){
                                                ?>
                                                <div class="text-center">

                                                    <a class="btn  btn-success" href="user_profile.php?view_user=<?php echo $list->seller_id?>"><i class="far fa-eye"></i> Seller</a>
                                                    <a class="btn  btn-success" href="user_profile.php?view_user=<?php echo $list->buyer_id?>"><i class="far fa-eye"></i> Buyer</a>

                                                </div>

                                                <?php
                                            }else{
                                                ?>
                                                <div class="text-center">

                                                    <a class="btn btn-success" href="user_profile.php?view_user=<?php echo $list->seller_id?>"><i class="far fa-eye"></i> Seller</a>
                                                    <a class="btn btn-success" href="user_profile.php?view_user=<?php echo $list->buyer_id?>"><i class="far fa-eye"></i> Buyer</a>

                                                </div>

                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $s++;
                                }
                                ?>




                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
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
