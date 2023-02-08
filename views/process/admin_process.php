<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/3/2020
 * Time: 2:52 PM
 */
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");

use App\Utility\Utility;
use App\user_registration\registration;
use App\user_registration\authentication;
use App\DataManipulation\DataManipulation;
$datamanipulation =new DataManipulation();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$authenticate =new authentication();

if(!isset($_SESSION)){
    session_start();

}

;

if(isset($_GET['logout'])){
    session_destroy();
    Utility::redirect("../../views/login_register_forgot/login.php");
    //include_once ("../../views/login_register_forgot/login.php");
}
if(isset($_POST['uploadImage'])){
    $email= $_POST['email'];

if(!empty($_FILES['profileImage']['name'])){
        $files = $_FILES['profileImage'];
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];

        $destinationFile ='../../contents/img/profile_image/'.date('d_m_Y_h_i_s_').$fileName;
        move_uploaded_file($fileTmpName,$destinationFile);
        //$_POST['destinationFile']=$destinationFile ;
        $data=$datamanipulation->ChangeUserProfile($destinationFile,$email);
        if($data){
            Utility::redirect("../../views/Admin/change_profile.php");


        }
    }
    else{
        $http_reffer= $_SERVER['HTTP_REFERER'];
        $_SESSION['EmptyFile']="<div class='alert alert-danger ' style=' width: 44%;'>please choose your image file</div>";
        Utility::redirect("$http_reffer");
    }

}
if(isset($_GET['delete_service'])){
   $id = $_GET['delete_service'];
   $status = $datamanipulation->deleteEmergencyCell($_GET['delete_service']);
   if($status){
       Utility::redirect("../../views/Admin/emergency_cel.php");
   }

}
if(isset($_GET['delete_notice'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $status = $datamanipulation->deleteNotice($_GET['delete_notice']);
   if($status){
       $_SESSION["updateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Notice Successfully</span>
                         </div>";
       Utility::redirect("$http_reffer");
   }


}
if(isset($_POST['submit'])){
   $phone= $_POST['phone'];
   $service_name= $_POST['service_name'];
    $status = $datamanipulation->insertEmergencyCell($phone,$service_name);
    if($status){
        Utility::redirect("../../views/Admin/emergency_cel.php");
    }


    //include_once ("../../views/Admin/emergency_cel.php");
}

if(isset($_GET['confirm_building_woner'])){
    $action='yes';
    $status = $datamanipulation->confirm_building_woner($_GET['confirm_building_woner'],$action);
    if($status){
        Utility::redirect("../../views/Admin/pending_approval.php");


    }

}





if(isset($_POST['add_admin'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];

    $name =$_POST['name'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $position =$_POST['position'];
    $password =$_POST['password'];



   $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $status = "Leave";
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);

     $checkEmail=$datamanipulation->checkEmail($email);
     if(!$checkEmail){

         $status = $datamanipulation->insert_new_admin($name,$email,$phone,$password,$position,$image);

         if($status){
             $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Add new admin data....</span>
                         </div>";

             Utility::redirect( "$http_reffer");
         }
     }else{
         $_SESSION["ExistMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> $email Already Exists</span>
                         </div>";

         Utility::redirect( "$http_reffer");
     }


}
if(isset($_POST['AdminImageUpload'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
   $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);



         $status = $datamanipulation->updateAdminImage($image,$id);

         if($status){
             $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Change - </b> Change Photo Successfully....</span>
                         </div>";

             Utility::redirect( "$http_reffer");
         }



}
if(isset($_GET['move_user_owner'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->Move_to_trash_user_acount($_GET['move_user_owner']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Moved - </b> Data Move to Trash History.</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }

}
if(isset($_GET['delete_admin_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->delete_admin($_GET['delete_admin_id']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                               <b> Deleted - </b> Delete Data Successfully.</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }

}

if(isset($_GET['recovery_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->recovery_data($_GET['recovery_id']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Recovered - </b> Recovery Data Successfully.</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }

}
if(isset($_GET['delete_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->deleteAcount($_GET['delete_id']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Delete Account Successfully.</span>
                         </div>";

        Utility::redirect( "../Admin/pending_account.php");

    }

}
if(isset($_GET['confirm_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->ConfirmAcount($_GET['confirm_id']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirmed - </b> Confirm Account Successfully.</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }

}
if(isset($_GET['confirm_register_baby_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->ConfirmBabyAcount($_GET['confirm_register_baby_id']);

    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirmed - </b> Confirm Account Successfully.</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }

}


if(isset($_GET['logout'])){
    session_destroy();
    Utility::redirect("../../views/login_register_forgot/login.php");
    //include_once ("../../views/login_register_forgot/login.php");
}
if(isset($_POST['update'] )){

    $update = $datamanipulation->updateUserAdminDatazz($_POST['user_id'],$_POST['name'],$_POST['phone'],$_POST['profession'],$_POST['road_no'],$_POST['bio']);

    if($update){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Data Successfully.</span>
                         </div>";

        Utility::redirect( "../../views/Admin/change_profile.php");
    }
}
if(isset($_POST['submit_post'] )){
    $inset = $datamanipulation->insertPostData($_POST['post'],$_POST['user_id'],$_POST['email'],$_POST['name']);
    if($inset){
        header("Location: ../Admin/my_shop.php");
    }
}
if(isset($_POST['add_notice'])) {
    $notice = $_POST['notice'];
    $status = $datamanipulation->insertNotice($notice);
    if ($status) {
        Utility::redirect("../../views/Admin/notice.php");
    }
}
    if(isset($_POST['edit_notice'])){

    $type = $_POST['type'];
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $notice = $_POST['notice'];
    $status = $datamanipulation->updateNotice($id,$notice);
    if($status){
        if($type == 'subAdmin'){
            $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Notice Successfully.</span>
                         </div>";
            Utility::redirect('../sub_admin/notice.php');

        }else{
            $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                                   <b> Update - </b> Notice Successfully.</span>
                         </div>";
            Utility::redirect('../admin/notice.php');
        }
//        Utility::redirect($http_reffer);
    }



    //include_once ("../../views/Admin/emergency_cel.php");
}
if(isset($_POST['update_profile'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $phone= $_POST['phone'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $address= $_POST['address'];
   $password= $_POST['password'];
   $id= $_POST['id'];
    $status = $datamanipulation->updateAdminProfile($phone,$name,$email,$address,$password,$id);
    if($status){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Profile Successfully.</span>
                         </div>";
        Utility::redirect($http_reffer);
    }
}
if(isset($_GET['delete_nurse'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->deleteNurse($_GET['delete_nurse']);
    if($status){
        $_SESSION["deleteNurse"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Nurse Successfully.</span>
                         </div>";
        Utility::redirect($http_reffer);
    }
}
if(isset($_POST['changeCondition'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $condition = $_POST['condition'];
    $id = $_POST['id'];
    $status = $datamanipulation->updateCondition($id,$condition);
    if($status){
        $_SESSION["healthMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Updated - </b> Health Condition Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_POST['updateNurseInbaby'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $nurse_id = $_POST['nurse_id'];
    $id = $_POST['id'];
    $status = $datamanipulation->updateNurse($id,$nurse_id);
    if($status){
        $_SESSION["healthMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Updated - </b> Data Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_POST['inserBabyFoot'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $food = $_POST['food'];
    $time = $_POST['time'];
    $id = $_POST['id'];
    $status = $datamanipulation->insertBabyFoot($id,$food,$time);
    if($status){
        $_SESSION["foodMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Data Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_POST['insertBabyAttendance'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $shift = $_POST['shift'];
    $time = $_POST['time'];
    $id = $_POST['id'];
    if($shift == 'in'){

    }
    $current_date =date('Y-m-d');
    $checkData = $datamanipulation->checkAttendance($id,$current_date);
    if($checkData){

        $status = $datamanipulation->updateBabyAttendance($checkData->id,$time,$current_date);
    }else{
        $status = $datamanipulation->insertBabyAttendance($id,$shift,$time);
    }

    if($status){
        $_SESSION["attendanceMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Data Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_POST['updateVaccinebaby'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $vaccine_name = $_POST['vaccine_name'];
    $id = $_POST['id'];
    $status = $datamanipulation->insertBabyVaccine($id,$vaccine_name);
    if($status){
        $_SESSION["healthMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Updated - </b> Data Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_POST['add_report'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $report = $_POST['report'];
    $date = date('Y-m-d');
    $status = $datamanipulation->addReport($id,$report,$date);
//    var_dump($id,$report, $date);
    if($status){
        $_SESSION["conMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Report Successfully.</span>
                         </div>";
        Utility::redirect( "../../views/Admin/adopt_request.php");
//        include_once '../../views/Admin/adopt_request.php';
    }
}
if(isset($_GET['confirm_users'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $status = $datamanipulation->confirmUser($_GET['confirm_users']);
    if($status){
        $_SESSION["conMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirmed - </b> Users Successfully.</span>
                         </div>";
        Utility::redirect( "../Admin/pending_account.php");
    }
}
if(isset($_GET['confirm_adopt'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_GET['confirm_adopt'];
    $regisBaby = $datamanipulation->showRegisterBaby($id);
    $status = $datamanipulation->confirmAdopt($id);
//    var_dump($status);
    $sts = 'yes';
    $update_status = $datamanipulation->updateBabyStatus($regisBaby->child_id,$sts);
    if($status){
        $_SESSION["conMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirmed - </b> Baby Successfully.</span>
                         </div>";
        Utility::redirect( "../../views/Admin/adopt_request.php");
//        include "../../views/Admin/adopt_request.php";
    }
}
if(isset($_GET['payment_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $table= 'payment';
    $status= 'seen';
    $status = $datamanipulation->updateStatus($table,$_GET['payment_id'],$status);
    if($status){
        $_SESSION["paymentMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirmed - </b> Payment Successfully.</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }
}
if(isset($_GET['delete_item_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_GET['delete_item_id'];
    $status = $datamanipulation->deleteItemId($id);

    if($status){
        $_SESSION["DeleteMSG"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Item Successfully....</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }

}
if(isset($_GET['delete_vaccine'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_GET['delete_vaccine'];

    $status = $datamanipulation->deleteVaccineId($id);

    if($status){
        $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Data Successfully....</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }

}
if(isset($_GET['adopt_baby_id'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_GET['adopt_baby_id'];

    $status = $datamanipulation->deleteAdopt($id);

    if($status){
        $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Data Successfully....</span>
                         </div>";
        Utility::redirect( "$http_reffer");
    }

}
if(isset($_POST['add_nurse'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $phone= $_POST['phone'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $address= $_POST['address'];


    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);


    $status = $datamanipulation->addNurse($phone,$name,$email,$address,$image);
    if($status){
        $_SESSION["addNurse"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Nurse Successfully.</span>
                         </div>";
        Utility::redirect($http_reffer);
    }
}

if(isset($_POST['edit_nurse'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $nurse_id= $_POST['id'];
   $phone= $_POST['phone'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $address= $_POST['address'];


    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    if(!empty($files["size"])){
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $image = '../../contents/img/' .$random. $fileName;

        move_uploaded_file($fileTmpName, $image);
        $status = $datamanipulation->editNurseWithImage($nurse_id,$phone,$name,$email,$address,$image);
    }else{
        $status = $datamanipulation->editNurseWithOutImage($nurse_id,$phone,$name,$email,$address);
    }


    if($status){
        $_SESSION["updateNurse"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Updated - </b> Nurse Data Successfully.</span>
                         </div>";
        Utility::redirect('../Admin/nurse.php');
//        include '../Admin/nurse.php'
    }
}

if(isset($_POST['addAdoptBaby'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $phone= $_POST['phone'];
   $name= $_POST['name'];
   $age= $_POST['age'];
   $gender= $_POST['gender'];
   $weight= $_POST['weight'];
;


    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);


    $status = $datamanipulation->addAdoptBaby($name,$age,$gender,$weight,$image);
    if($status){
        $_SESSION["addBaby"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Baby Successfully.</span>
                         </div>";
        Utility::redirect($http_reffer);
    }
}
if(isset($_POST['updateBaby'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
   $floor= $_POST['floor'];
   $id= $_POST['id'];
   $room= $_POST['room'];
   $seat= $_POST['seat'];
   $room_type= $_POST['room_type'];


    $status = $datamanipulation->updateBaby($id,$floor,$room,$seat,$room_type);
    if($status){
        $_SESSION["updateBaby"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Updated - </b> Data Successfully.</span>
                         </div>";
        Utility::redirect($http_reffer);
    }
}

