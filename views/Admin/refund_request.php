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
                        <a href="dashboard.php" class="nav-link ">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Dashboard

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
                    <li class="nav-item has-treeview ">
                        <a href="transaction.php" class="nav-link">
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
                    <li class="nav-item has-treeview">
                        <a href="adopt_request.php" class="nav-link">
                            <i class="nav-icon fas fa-baby"></i>
                            <p>
                                Adopt Request
                            </p>
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
                        <a href="profile.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Profile
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
                    <li class="nav-item has-treeview">
                        <a href="chat.php" class="nav-link">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                Chat
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
                <?php

                if(isset($_SESSION['SendMessage'])){
                    echo $_SESSION['SendMessage'];
                    unset($_SESSION['SendMessage']);
                }
                ?>
            </div>
           <div class="row">

               <div class="col-4">
                      <?php
                      if(isset($_GET['refund_user_id'])){
                          $RefundData=$datamanipulation->showRefundData($_GET['refund_user_id']);

                          $refundUserData=$datamanipulation->showUserId($RefundData->user_id);
                      }
                      ?>
                   <form class="" action="../process/email.php" method="post">



                       <div class="form-group  mt-3">

                           <div >
                               <input type="name" name="vehicle_no" placeholder="Vehicle No" required class="form-control" value="<?php echo $RefundData->vehicle_no?>" style="border-radius: 25px">
                               <input type="hidden" name="id"   value="<?php echo $RefundData->rf_id?>" >
                           </div>
                       </div>
                       <div class="form-group ">

                           <div >
                               <input type="text" name="vehicle_type" placeholder="Vehicle Type" required class="form-control" value="<?php echo $RefundData->vehicle_type?>" style="border-radius: 25px">

                           </div>
                       </div>
                       <div class="form-group ">

                           <div >
                               <input type="number" name="phone" required placeholder="Phone(Bkash)" class="form-control" value="<?php echo $RefundData->phone?>" style="border-radius: 25px">
                           </div>
                       </div>

                       <div class="form-group ">

                           <div >
                               <input type="number" name="amount" placeholder="Amount" required class="form-control" value="<?php echo $RefundData->amount?>" style="border-radius: 25px">
                           </div>
                       </div>


                       <div class="form-group ">

                       </div>

               </div>
               <div class="col-4">

                       <div class="form-group  mt-3">

                           <div >
                               <input type="name" name="token" placeholder="Token" required class="form-control" value="<?php echo $RefundData->token?>" style="border-radius: 25px">

                           </div>
                       </div>
                       <div class="form-group ">

                           <div >
                               <input type="text" name="name" placeholder="name" required class="form-control" value="<?php echo $refundUserData->name?>" style="border-radius: 25px">

                           </div>
                       </div>
                       <div class="form-group ">

                           <div >
                               <input type="email"  name="email" required placeholder="email" class="form-control" value="<?php echo $refundUserData->email?>" style="border-radius: 25px">
                           </div>
                       </div>
                        <div class="form-group ">

                            <div >
                                <input type="text"  name="transaction" required placeholder="transaction Id" class="form-control" value="" style="border-radius: 25px">
                            </div>
                        </div>




                       <div class="form-group ">

                       </div>

               </div>
                   <div class="col-12">
                       <input type="submit" class="btn btn-success btn-rounded w-100  mb-2"  name="refundMessage" value="Confirm Refund" style="margin-top: 15px;font-size: 21px; text-align: center;border: 1px solid;" >
                   </div>
                   </form>




           </div>





        </section>



        <footer>

        </footer>
    </div>






    <aside class="control-sidebar control-sidebar-dark">

    </aside>
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


