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
                        <a href="profile.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="nurse.php" class="nav-link active">
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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="content">
            <div class="row">
                <div class="col-md-3" style="padding-top: 15px">
                    <div class="card card-user" style="background-color: rgba(17,4,71,0.86) ">
                        <div class="card-header">
                            <?php
                            if (isset($_SESSION["addNurse"])){
                                echo $_SESSION["addNurse"];
                                unset($_SESSION["addNurse"]);
                            }
                            if (isset($_SESSION["deleteNurse"])){
                                echo $_SESSION["deleteNurse"];
                                unset($_SESSION["deleteNurse"]);
                            }
                            if (isset($_SESSION["updateNurse"])){
                                echo $_SESSION["updateNurse"];
                                unset($_SESSION["updateNurse"]);
                            }
                            $data=$datamanipulation->adminData($user_id);
                            if($data->address){
                                $address=$data->address;
                            }else{
                                $address="";
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="../process/admin_process.php" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: white">Full Name</label>
                                            <input type="text" required class="form-control" name="name" value="" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: white">Image</label>
                                            <input class="text-light" required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" style="color: white">Email address</label>
                                            <input type="email" required class="form-control" name="email" placeholder="Email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: white">Address</label>
                                            <textarea type="text" required class="form-control" cols="5" rows="5" name="address" value="" placeholder="Home Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label style="color: white">Phone Number</label>
                                            <input type="number" required class="form-control" name="phone" value="" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update w-50">
                                        <button type="submit" name="add_nurse" class="btn btn-success btn-round">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" style="border: 2px  royalblue; margin-top: 15px;border-radius: 20px; height:480px">
                    <table id="parvez1" class="table">
                        <thead class=" text-primary" style="background-color: rgba(21,3,71,0.86)">
                        <th>
                            SL
                        </th>

                        <th>
                            Name
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone
                        </th>

                        <th>
                            Action
                        </th>

                        </thead>
                        <tbody class="attrTable">
                        <?php
                        $lists=$datamanipulation->showAllNurse();
                        $s=1;
                        foreach ($lists as $list){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $s?>
                                </td>

                                <td>
                                    <?php echo $list->name?>

                                </td>
                                <td>
                                    <?php echo $list->address?>

                                </td>
                                <td>
                                    <?php echo $list->email?>
                                </td>
                                <td>
                                    <?php echo $list->phone?>
                                </td>

                                <td>
                                    <a href="edit_nurse.php?edit_nurse=<?php echo $list->id?>"title="Edit" class="btn btn-primary btn-outline-success text-light"> EDIT</a>
                                    <a href="../process/admin_process.php?delete_nurse=<?php echo $list->id?>"title="Delete" class="btn btn-danger btn-outline-success text-light"> DELETE</a>
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
