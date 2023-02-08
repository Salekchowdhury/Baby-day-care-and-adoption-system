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
                        <a href="day_care.php" class="nav-link active">
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-12 d-flex justify-content-start">
                            <h1>Baby Information</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row" style="background-color: rgba(9,9,9,0.96); border: 3px dashed; border-color: #b40e50; border-bottom-left-radius: 25px; border-top-right-radius: 25px">
                    <div class="col-9">
                        <div class="tab-content">
                            <?php
                            if(isset($_GET['view_details'])){
                                $baby_id = $_GET['view_details'];
                                $babyData=$datamanipulation->showRegisterBabyById($_GET['view_details']);
                            }

                            //var_dump($data);

                            ?>
                            <div class="tab-pane active" id="settings">
                                    <div class="row">

                                        <div class="col-6" >

                                            <div class="form-group row mt-3">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Name:</label><span> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="name" required class="form-control" value="<?php echo $babyData->name?>" style="border-radius: 25px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Age:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="number" disabled name="age" required class="form-control" value="<?php echo $babyData->age?>" style="border-radius: 25px">
                                                    <input type="hidden" name="gurdian_id"  class="form-control" value="<?php echo $user_id?>" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Gender:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled name="age" required class="form-control" value="<?php echo $babyData->gender?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" style="color: white">Admit:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                <div class="col-sm-10">
                                                    <input type="date" disabled required class="form-control" name="admit_date" value="<?php echo $babyData->admit_date?>" style="border-radius: 25px">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-6" >
                                      <form action="../process/admin_process.php" method="post">
                                          <div class="form-group row mt-3">
                                              <label  class="col-sm-2 col-form-label" style="color: white">Floor:</label><span> <b style="font-size: 28px;color: white"></b></span>
                                              <div class="col-sm-10">
                                                  <input type="number"  name="floor" required class="form-control" value="<?php echo $babyData->floor?>" style="border-radius: 25px">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label  class="col-sm-2 col-form-label" style="color: white">Room:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                              <div class="col-sm-10">
                                                  <input type="number"  name="room" required class="form-control" value="<?php echo $babyData->room?>" style="border-radius: 25px">
                                                  <input type="hidden" name="id"  class="form-control" value="<?php echo $baby_id?>" >
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label  class="col-sm-2 col-form-label" style="color: white">Seat:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                              <div class="col-sm-10">
                                                  <input type="number"  name="seat" required class="form-control" value="<?php echo $babyData->seat?>" style="border-radius: 25px">
                                              </div>
                                          </div>

                                          <div class="form-group row">

                                                  <label  class="col-sm-2 col-form-label" style="color: white">Room Type:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                  <div class="">
                                                      <select class=" p-2" name="room_type" style="border-radius: 25px">
                                                          <option value="">Select Option</option>
                                                          <option value="Normal">Normal</option>
                                                          <option value="standard ">Standard </option>
                                                      </select>
                                                  </div>

                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-12">
                                                  <button type="submit" class="btn btn-success" name="updateBaby">Update</button>
                                              </div>

                                          </div>
                                      </form>


                                        </div>
                                    </div>
                            </div>
                            <?php
                            if (isset($_SESSION["Success"])){
                                echo $_SESSION["Success"];
                                unset($_SESSION["Success"]);
                            }
                            if (isset($_SESSION["updateBaby"])){
                                echo $_SESSION["updateBaby"];
                                unset($_SESSION["updateBaby"]);
                            }  if (isset($_SESSION["healthMsg"])){
                                echo $_SESSION["healthMsg"];
                                unset($_SESSION["healthMsg"]);
                            }
                            ?>
                            <!-- /.tab-pane -->
                        </div>

                    </div>
                    <div class="col-md-3 ">
                        <div class="tab-content" style="border: 1px solid white;margin: 5px; border-radius: 18px" >
                            <div class="tab-pane active" id="settings">
                                <div class="row">
                                    <div class="col-11 p-4">
                                        <?php
                                        $current_date =date("d/m/Y");
                                        ?>
                                        <form action="../process/admin_process.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <input type="hidden" name="id" value="<?php echo $baby_id?>">
                                                        <select class=" p-2" name="condition" style="border-radius: 25px">
                                                            <option value="">Select Option</option>
                                                            <option value="Fever">Fever</option>
                                                            <option value="Ear Infections">Ear Infections</option>
                                                            <option value="Skin Problems">Skin Problems</option>
                                                            <option value="Coughing">Coughing</option>
                                                            <option value="Vomiting">Vomiting</option>
                                                            <option value="Jaundice">Jaundice</option>
                                                            <option value="Anaemia">Anaemia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <button type="submit" class="btn bg-dark btn-outline-success" name="changeCondition">Change</button>
                                                </div>
                                            </div>
                                        </form>
<!--                                        <strong class="text-success pb-2">TODAY:</strong><span class="text-light"> --><?php //echo $current_date?><!--</span>-->
                                        <br>
                                        <strong class="text-success ">CONDITION:</strong><span class="text-light"> <?php echo  $babyData->health_status?></span>
                                        <br>
                                        <strong class="text-success ">ROOM TYPE:</strong><span class="text-light"> <?php echo  $babyData->room_type?></span>
                                        <br>
                                        <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $babyData->image?>" alt="Avatar" class="m-4 avatar mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <br>
                        <h2>Nurse</h2>
                        <form action="../process/admin_process.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6 text-center">
                                    <div class="">
                                        <input type="hidden" name="id" value="<?php echo $baby_id?>">
                                        <select class=" p-2 w-50" name="nurse_id" style="border-radius: 25px">
                                            <?php
                                            $lists =$datamanipulation->showAllNurse();
                                            if($lists){
                                                foreach ($lists as $list){
                                                    ?>
                                                    <option value="<?php echo $list->id?>"><?php echo $list->name?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn bg-dark btn-outline-success" name="updateNurseInbaby">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Address
                                        </th>

                                        <th>
                                            Image
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                            <?php
                                            $data= $datamanipulation->showNurseById($babyData->nurse_id);
                                            if($data){
                                            ?>
                                                <tr>
                                                    <td><?php echo $data->name?></td>
                                                    <td><?php echo $data->phone?></td>
                                                    <td><?php echo $data->address?></td>
                                                    <td>
                                                        <img src="<?php echo $data->image?>" width="80" height="80" style="border-radius: 50%">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <h2>Vaccine</h2>
                        <form action="../process/admin_process.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6 text-center">
                                    <div class="">
                                        <input type="hidden" name="id" value="<?php echo $baby_id?>">
                                        <select class=" p-2 w-50" name="vaccine_name" style="border-radius: 25px">
                                                <option value="">Select Option</option>
                                                <option value="Hepatitis B">Hepatitis B</option>
                                                <option value="Diphtheria">Diphtheria</option>
                                                <option value="Polio">Polio </option>
                                                <option value="Rubella">Rubella </option>
                                                <option value="Tetanus">Tetanus  </option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn bg-dark btn-outline-success" name="updateVaccinebaby">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">

                                        <?php
                                        $datas= $datamanipulation->showVaccineByBabyId($baby_id);
                                        if($datas){
                                            foreach ($datas as $data){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->vaccine_name?></td>
                                                    <td><?php echo $data->date?></td>
                                                    <td>
                                                        <a href="../process/admin_process.php?delete_vaccine=<?php echo $data->vac_id?>"title="Delete" class="btn btn-danger btn-outline-success text-light"> DELETE</a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }

                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <?php
                        if (isset($_SESSION["foodMsg"])){
                            echo $_SESSION["foodMsg"];
                            unset($_SESSION["foodMsg"]);
                        }
                        ?>
                        <br>
                        <h2>Food</h2>
                        <form action="../process/admin_process.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-4 ">
                                    <div class="">
                                        <input type="hidden" name="id" value="<?php echo $baby_id?>">
                                        <select  class=" p-2 w-100" name="food" style="border-radius: 25px">
                                            <option value="">Select Foot</option>
                                            <option value="Barley Water">Barley Water</option>
                                            <option value="Banana Puree">Banana Puree</option>
                                            <option value="Oats Kheer">Oats Kheer</option>
                                            <option value="Sooji Kheer">Sooji Kheer</option>
                                            <option value="Moong Dal">Moong Dal</option>
                                            <option value="Carrot Puree">Carrot Puree</option>
                                            <option value="Rice Gruel">Rice Gruel</option>
                                            <option value="Apple Puree">Apple Puree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right" >
                                   <input class=" w-100" type="time" name="time" style="border-radius: 25px; padding: 5px" placeholder="time">
                                </div>
                                <div class="col-md-4 text-right">
                                    <button type="submit" class="btn bg-dark btn-outline-success" name="inserBabyFoot">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="card card-plain">
                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            Food
                                        </th>
                                        <th>
                                            time
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                            <?php
                                            $current_date =date('Y-m-d');
                                            $datas= $datamanipulation->showFoodListByBabyId($baby_id);
                                            if($datas){
                                                foreach ($datas as $data){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $data->food?></td>
                                                        <td><?php echo $data->time?></td>
                                                        <td><?php echo $data->date?></td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <h2>Attendance</h2>
                        <?php
                        if (isset($_SESSION["attendanceMsg"])){
                            echo $_SESSION["attendanceMsg"];
                            unset($_SESSION["attendanceMsg"]);
                        }
                        ?>
                        <form action="../process/admin_process.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-4 ">
                                    <div class="">
                                        <input type="hidden" name="id" value="<?php echo $baby_id?>">
                                        <select  class=" p-2 w-100" name="shift" style="border-radius: 25px">
                                            <option value="">Select Type</option>
                                            <option value="in">IN</option>
                                            <option value="out">Out</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right" >
                                    <input class=" w-100" type="time" name="time" style="border-radius: 25px; padding: 5px" placeholder="time">
                                </div>
                                <div class="col-md-4 text-right">
                                    <button type="submit" class="btn bg-dark btn-outline-success" name="insertBabyAttendance">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="card card-plain">

                            <div class="card-body" style="background-color: ">
                                <div class="scroll-content">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #0c525d">

                                        <th>
                                            IN
                                        </th>
                                        <th>
                                            OUT
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        </thead>
                                        <tbody class="attrTable">
                                         <?php
                                         $current_date =date('Y-m-d');
                                         $datas= $datamanipulation->showAttentanceByBabyId($baby_id);
                                         if($datas){
                                             foreach ($datas as $data){
                                                 ?>
                                                 <tr>
                                                     <td><?php echo $data->in_time?></td>
                                                     <td><?php echo $data->out_time?></td>
                                                     <td><?php echo $data->date?></td>

                                                 </tr>
                                                 <?php
                                             }

                                         }
                                         ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12">
                        <br>

                    </div>



                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <div style="height: 96%" class="card card-primary card-outline ">
                            </div>
                        </div>
                    </div>
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