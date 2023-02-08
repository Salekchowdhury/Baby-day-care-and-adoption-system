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
$mail = new PHPMailer( true);

$authenticate =new authentication();
//$registration =new registration();
if(!isset($_SESSION)){
    session_start();
}


if(isset($_POST['login'])){
var_dump($_POST);
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $totday_date = date("Y/m/d");
//    var_dump($totday_date);
    if($totday_date == '2023/01/18'){
        $_SESSION["errorMessageForLogin"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry - </b></span>
                         </div>";
        Utility::redirect($http_reffer);
    }else{

        $email=$_POST['email'];
        $password=$_POST['password'];
        $CheckAdminEmail = $authenticate->checkAdminEmail($email,$password);
        $CheckUserEmail = $authenticate->checkUserEmail($email,$password);



        if($CheckAdminEmail){
            $_SESSION['user_id']=$CheckAdminEmail->admin_id;
            $_SESSION['email']=$CheckAdminEmail->email;
            $_SESSION['name']=$CheckAdminEmail->name;
            if($CheckAdminEmail->position == 'Admin'){
                utility::redirect("../../views/Admin/profile.php");
            }else{
                utility::redirect("../../views/sub_admin/profile.php");
            }



        }else if ($CheckUserEmail){
            $Baby_Adopt='Baby_Adopt';
            $Baby_Care='Baby_Care';
            $Both='Both';

            $type="$CheckUserEmail->position";
            $CheckUserEmail = $authenticate->checkUserIsActive($email,$password);
            if($CheckUserEmail){
                if($type==$Baby_Care){
                    $_SESSION['user_id']=$CheckUserEmail->user_id;
                    $_SESSION['email']=$CheckUserEmail->email;
                    $_SESSION['name']=$CheckUserEmail->name;
                    utility::redirect("../../views/baby_care/profile.php");

                }
                else if ($type==$Baby_Adopt){
                    $_SESSION['user_id']=$CheckUserEmail->user_id;
                    $_SESSION['email']=$CheckUserEmail->email;
                    $_SESSION['name']=$CheckUserEmail->name;
                    utility::redirect("../Foster/profile.php");
//            include_once ('../Foster/profile.php');

                }
                else if ($type==$Both){
                    $_SESSION['user_id']=$CheckUserEmail->user_id;
                    $_SESSION['email']=$CheckUserEmail->email;
                    $_SESSION['name']=$CheckUserEmail->name;
                    utility::redirect("../Both/choose_option.php");
//            include_once ('../Foster/profile.php');

                }
            }else{
                $http_reffer= $_SERVER['HTTP_REFERER'];
                $_SESSION["errorMessageForLogin"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> Your account not varified.</span>
                         </div>";
                Utility::redirect("$http_reffer");
            }




        }else{
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["errorMessageForLogin"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> Wrong  email or password.. Please Try Agin!.</span>
                         </div>";
            Utility::redirect("$http_reffer");
        }

    }




 }


if (isset($_GET['user_type_for_buyers'])){
    $data = $datamanipulation->showAlertonMessageforbuyers($_GET['user_id']);
    echo json_encode($data);
}
if (isset($_GET['user_type'])){
    $data = $datamanipulation->showAlertonMessage($_GET['sellers_id']);
    echo json_encode($data);
}

if (isset($_POST['sellerDataCollectViaId']))
{
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $datamanipulation->viewSellerBuyersTotalInfo($buyers_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['buyers_name']) && isset($_POST['buyers_id'])){
    $buyers_name = $_POST['buyers_name'];
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $sellers_name = $_POST['sellers_name'];
    $chat_message = $_POST['chat_message'];
    $data = $datamanipulation->insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}
if (isset($_POST['sellerSDataCollectViaId']))
{
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $datamanipulation->viewSellerBuyersTotalInfoS($buyers_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['buyers_ids']) && isset($_POST['sellerActive']) && isset($_POST['sellers_names'])){
    $buyers_name = $_POST['buyers_names'];
    $buyers_id = $_POST['buyers_ids'];
    $sellers_id = $_POST['sellers_ids'];
    $sellers_name = $_POST['sellers_names'];
    $chat_message = $_POST['chat_messages'];
    $data = $datamanipulation->insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}

if(isset($_POST['coutnRating'] )){

    $client_id = $_POST['client_id'];
    $coutnRating = $_POST['coutnRating'];
    $position = $_POST['postion'];
    $checkUser = $datamanipulation->showFosterProfile($client_id);
//    var_dump($position);

    if($checkUser->position =='Both'){

        if($position == 'Baby_Adopt'){
            $data = $datamanipulation->insertRate($client_id,$coutnRating);
        }else{
            $status = "Day_Care";
            $data = $datamanipulation->insertRateBabyAdop($client_id,$coutnRating,$status);
        }


    }else{
        if($checkUser->position == 'Baby_Adopt'){
            $data = $datamanipulation->insertRate($client_id,$coutnRating);
        }else{
            $status = "Day_Care";
            $data = $datamanipulation->insertRateBabyAdop($client_id,$coutnRating,$status);
        }
    }





    $http_reffer = $_SERVER['HTTP_REFERER'];

    Utility::redirect("$http_reffer");
}

if(isset($_POST['request'])) {
    $http= $_SERVER['HTTP_REFERER'];
    $application= $_POST['application'];
    $child_id = $_POST['child_id'];
    $user_id = $_POST['user_id'];

    $random_electric_bill= rand(1000,9999);
    $files_electric_bill = $_FILES['electric_bill'];
    $fileName_electric_bill = $files_electric_bill['name'];
    $fileTmpName_electric_bill = $files_electric_bill['tmp_name'];
    $image_electric_bill = '../../contents/document/' .$random_electric_bill. $fileName_electric_bill;

    move_uploaded_file($fileTmpName_electric_bill, $image_electric_bill);


    $random_land_paper= rand(1000,9999);
    $files_land_paper = $_FILES['land_paper'];
    $fileName_land_paper = $files_land_paper['name'];
    $fileTmpName_land_paper = $files_land_paper['tmp_name'];
    $image_land_paper = '../../contents/document/' .$random_land_paper. $fileName_land_paper;

    move_uploaded_file($fileTmpName_land_paper, $image_land_paper);


    $checkRequest = $datamanipulation->checkRequest($user_id,$child_id);

    if(!$checkRequest){
        $status = $datamanipulation->insertRequest($user_id,$application,$child_id,$image_electric_bill,$image_land_paper);
        if($status){
            $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sended - </b>   Request  Successfully.</span>
                         </div>";
            Utility::redirect($http);
        }
        }else{
        $_SESSION["babyMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry - </b>   You have already sent a request for this child.</span>
                         </div>";
        Utility::redirect($http);
        }



}
if(isset($_POST['sign_up'])){
    var_dump($_POST);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $position=$_POST['position'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password !=$confirm_password){
        $http_reffer= $_SERVER['HTTP_REFERER'];
        $_SESSION["notMatch"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                              Password not match.</span>
                         </div>";
        Utility::redirect("$http_reffer");
    }else{
        $random= rand(1000,9999);
        $files = $_FILES['photo'];
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $image = '../../contents/img/' .$random. $fileName;

        move_uploaded_file($fileTmpName, $image);


        $random_nid_front= rand(1000,9999);
        $files_nid_front = $_FILES['nid_front'];
        $fileName_nid_front = $files_nid_front['name'];
        $fileTmpName_nid_front = $files_nid_front['tmp_name'];
        $image_nid_front = '../../contents/img/' .$random_nid_front. $fileName_nid_front;

        move_uploaded_file($fileTmpName_nid_front, $image_nid_front);


        $random_nid_back= rand(1000,9999);
        $files_nid_back = $_FILES['nid_back'];
        $fileName_nid_back = $files_nid_back['name'];
        $fileTmpName_nid_back = $files_nid_back['tmp_name'];
        $image_nid_back = '../../contents/img/' .$random_nid_back. $fileName_nid_back;

        move_uploaded_file($fileTmpName_nid_back, $image_nid_back);


        $checkEmail =$datamanipulation->checkEmail($email);
        if($checkEmail){
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["Success"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> This email id already exists.</span>
                         </div>";
            Utility::redirect("$http_reffer");
        }else{
            $status =$datamanipulation->insertRegisterData($name,$phone,$email,$position,$password,$image_nid_front,$image_nid_back,$address,$image);
//            $status =$datamanipulation->insertRegisterData($name,$phone,$email,$position,$password,$image);

            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success! - </b> Insert Data Successfully!.</span>
                         </div>";
            Utility::redirect("$http_reffer");

        }
    }


}