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
                        <a href="adopt_request.php" class="nav-link active">
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

            <div class="col-12">
                <div class="card" style="background-color: rgba(17,4,71,0.86); color: white">
                    <div class="row px-4 mt-3">

                        <div class="col-md-4">
                            <form action="../process/admin_process.php" method="post" enctype="multipart/form-data" >
                            <div class="">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="age" placeholder="Age" value="">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="weight" placeholder="weight" value="">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="" name="gender" style="border-radius: 15px; padding: 5px">
                                                <option value="">Select Gender </option>
                                                <option value="Male">Male </option>
                                                <option value="Female">Female </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <input required  type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success w-100 mb-2"  name="addAdoptBaby" value="Submit"style="padding-top: 5px;margin-top: 10px;" >
                            </div>
                            </form>
                        </div>

                        <div class="col-md-8">
                            <h3 style="color: white">Adopt Request</h3>
                            <?php

                            if(isset($_SESSION['addBaby'])){
                                echo $_SESSION['addBaby'];
                                unset($_SESSION['addBaby']);
                            }
                            if(isset($_SESSION['updatetMsg'])){
                                echo $_SESSION['updatetMsg'];
                                unset($_SESSION['updatetMsg']);
                            }
                            if(isset($_SESSION['conMsg'])){
                                echo $_SESSION['conMsg'];
                                unset($_SESSION['conMsg']);
                            }
                            ?>

                            <table id="sohag1" class="table table-bordered table-hover">
                                <thead>
                                <tr style="color: cornflowerblue;background-color: bisque;">
                                    <th>S#</th>
                                    <th>Application</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $lists=$datamanipulation->showAllAdoptRequest();
                                //                            var_dump($lists);
                                $s=1;
                                if($lists){
                                    foreach ($lists as $list) {
                                        ?>
                                        <tr>
                                            <td style="color: white"><?php echo $s?></td>
                                            <td style="color: white"><?php echo $list->application?></td>
                                            <td style="color: white"><?php echo $list->date?></td>
                                            <td>
                                                <?php
                                                if($list->status =='yes'){
                                                    ?>
                                                    <a style="color: red" href="adopt_details.php?details_id=<?php echo $list->id?>"title="View" class="btn  btn-secondary btn-outline-success"><i class="fas fa-eye" aria-hidden="true"></i> VIEW</a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a style="color: white" href="adopt_details.php?details_id=<?php echo $list->id?>"title="View" class="btn  btn-secondary btn-outline-success"><i class="fas fa-eye" aria-hidden="true"></i> VIEW</a>
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

                    <div class="card-body">
                    <?php
                    if(isset($_SESSION['conMsg'])){
                        echo $_SESSION['conMsg'];
                        unset($_SESSION['conMsg']);
                    }
                    ?>
                        <table id="sohag2" class="table table-bordered table-hover">
                            <thead>
                            <tr style="color: cornflowerblue;background-color: bisque;">
                                <th>S#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Weight</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $lists=$datamanipulation->showAllBaby();
                            //                            var_dump($lists);
                            $s=1;
                            if($lists){
                                foreach ($lists as $list) {
                                    ?>
                                    <tr>
                                        <td style="color: white"><?php echo $s?></td>
                                        <td style="color: white"><?php echo $list->name?></td>
                                        <td style="color: white"><?php echo $list->gender?></td>
                                        <td style="color: white"><?php echo $list->age?></td>
                                        <td style="color: white"><?php echo $list->weight?> KG</td>
                                        <td style="color: white"><?php echo $list->date?></td>
                                        <td style="color: white">
                                            <img src="<?php echo $list->image?> " width="80" height="80">
                                        </td>
                                        <td>

                                            <a style="color: white" href="../../views/process/admin_process.php?adopt_baby_id=<?php echo $list->id?>"title="View" class="btn  btn-danger btn-outline-success"><i class="fas fa-trash" aria-hidden="true"></i> DELETE</a>

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
    $("#sohag1").DataTable({
      "lengthMenu":[ 3,4 ],
    });
    $("#sohag2").DataTable({
      "lengthMenu":[ 3,4 ],
    });
    $("#sohag3").DataTable({
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


