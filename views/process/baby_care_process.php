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

/*$name=$data->name;
$image=$data->image;
$profession=$data->profession;
$phone=$data->phone;
$holding_no=$data->holding_no;
$bio=$data->bio;
$owner_name= $ownerData->owner_name;
$building_name= $ownerData->building_name;
$road_no= $ownerData->road_no;
$bio= $ownerData->bio;*/

if(isset($_GET['logout'])){
    session_destroy();
    Utility::redirect("../../views/login_register_forgot/login.php");
    //include_once ("../../views/login_register_forgot/login.php");
}
if(isset($_POST['add_item'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];

    $product_id = $_POST['product_id'];
    $seller_id = $_POST['seller_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    //var_dump($id);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);



    $checkItem = $datamanipulation->checkItem($product_id,$seller_id);
    if(!$checkItem){
        $status = $datamanipulation->insertItem($product_id,$seller_id,$name,$price,$image,$description);

        if($status){
            $_SESSION["uploadImage"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Item Added Successfully....</span>
                         </div>";

            Utility::redirect( "$http_reffer");
        }
    }else{
        $_SESSION["errorId"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> Product id $product_id is already exists  </span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }




}
if (isset($_POST['postDataCollect'])){

    $user_id = $_POST['value'];
//    var_dump($user_id);
    $data = $datamanipulation->postDataCollectviaUserId($user_id);
    echo json_encode($data);
}

if (isset($_POST['btn_save_changes'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $item_id = $_POST['item_id'];
    $updateProductName = $_POST['updateProductName'];
    $updatePrice = $_POST['updatePrice'];
    $updateDescription = $_POST['updateDescription'];
//    var_dump($updateProductName);



    $files = $_FILES['photo'];
    var_dump($files["size"]);
    if(!empty($files["size"])){
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $image = '../../contents/img/' .$random. $fileName;
        move_uploaded_file($fileTmpName, $image);


        $data = $datamanipulation->updateItemWithoutImage($item_id,$updateProductName,$updatePrice,$updateDescription,$image);
        if ($data){
            $_SESSION["add_post"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Post Successfully....</span>
                         </div>";
            Utility::redirect( "$http_reffer");
        }

    }else{
        $data = $datamanipulation->updateItem($item_id,$updateProductName,$updatePrice,$updateDescription);

        if($data){
            $_SESSION["add_post"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Post Successfully....</span>
                         </div>";

            Utility::redirect( "$http_reffer");
        }
    }


}

if (isset($_POST['updateProfile'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $new_password=$_POST['password'];

//    var_dump($_POST['ChangePhoto']);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);


    if(!empty($fileName)){
        $status = $datamanipulation->updateSellerProfileWithImage($name,$email,$phone,$address,$new_password,$image,$id);

    }else{
        $status = $datamanipulation->updateSellerProfileWithOutImage($name,$email,$phone,$address,$new_password,$id);
    }
        if ($status){
            $_SESSION["add_post"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Profile - </b> Updated Successfully....</span>
                         </div>";
            Utility::redirect( "$http_reffer");

    }else{
        $data = $datamanipulation->updateItem($item_id,$updateProductName,$updatePrice,$updateDescription);

        if($data){
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Post Successfully....</span>
                         </div>";
            Utility::redirect( "$http_reffer");
        }
    }


}
if (isset($_POST['updateAdminProfile'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $new_password=$_POST['password'];

//    var_dump($_POST['ChangePhoto']);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);


    if(!empty($fileName)){
        $status = $datamanipulation->updateAdminProfileWithImage($name,$email,$phone,$address,$new_password,$image,$id);

    }else{
        $status = $datamanipulation->updateAdminProfileWithoutImage($name,$email,$phone,$address,$new_password,$id);
    }
        if ($status){
            $_SESSION["success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Profile - </b> Updated Successfully....</span>
                         </div>";
            Utility::redirect( "$http_reffer");

    }else{
        $data = $datamanipulation->updateItem($item_id,$updateProductName,$updatePrice,$updateDescription);

        if($data){
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Post Successfully....</span>
                         </div>";
            Utility::redirect( "$http_reffer");
        }
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
if (isset($_GET['cancelQuantity'])){
    $http= $_SERVER['HTTP_REFERER'];
    $datamanipulation->deletecard($_GET['cancelQuantity']);
    Utility::redirect("$http");
}

if(isset($_POST['confirm_order'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['cart_id'];
    $date=$_POST['deliveryDate'];



    $status = $datamanipulation->confirmOrder($id,$date);
    //var_dump($status);
    //var_dump($_POST);

    if($status){
        $_SESSION["confirmMSG"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             Order Confirm Successfully....</span>
                         </div>";

        Utility::redirect( '../baby_care/order_history.php');
//        include '../baby_care/order_history.php';
    }



}
if (isset($_GET['seller_user_id'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $user_id =$_GET['seller_user_id'];
    $data = $datamanipulation->orderDelete($user_id);
    Utility::redirect("$http_reffer");

}
if(isset($_GET['confirmItem'])) {

    $carts = $datamanipulation->showCardData($_GET['confirmItem']);
    var_dump($carts);
    foreach ($carts as $cart){
        $datamanipulation->updatetCartStatus($cart->cart_id);
    }
    Utility::redirect("../baby_care/manage_order.php");
//    include_once '';
}
if (isset($_POST['updateQuantity'])){
    $http= $_SERVER['HTTP_REFERER'];
    $updateQuantity = $_POST['updateQuantity'];
    $totalPrice = $_POST['totalPrice'];
    $cart_id = $_POST['cart_id'];
    $totalQuantity = $_POST['totalQuantity'];
    $totalQuantity = ($totalQuantity+$updateQuantity);
    $totalPrice = ($totalQuantity*$totalPrice);
    $datamanipulation->updateQuantity($cart_id,$totalQuantity,$totalPrice);
    //var_dump($totalQuantity);
    Utility::redirect("$http");
}
if(isset($_POST['add_card'] )){
    $http= $_SERVER['HTTP_REFERER'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $item_id = $_POST['item_id'];
    $seller_id = $_POST['seller_id'];
    $buyer_id = $_POST['buyer_id'];
//    $phone = $_POST['phone'];
    $data = $datamanipulation->insertCartProduct($price,$name,$item_id,$seller_id,$buyer_id);
    Utility::redirect("$http");
}
if(isset($_POST['staffImageUpload'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    var_dump($id);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);



    $status = $datamanipulation->updateStaffImage($image,$id);

    if($status){
        $_SESSION["uploadImage"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Change - </b> Change Photo Successfully....</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }



}
if(isset($_POST['register_baby'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $gurdian_id = $_POST['gurdian_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $admit_date = $_POST['admit_date'];

//    var_dump($id);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);



    $status = $datamanipulation->register_baby($image,$gurdian_id,$name,$age,$gender,$admit_date);

    if($status){
        $_SESSION["registerBaby"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Registered - </b> Data  Successfully....</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }



}
if(isset($_POST['chnageProfile'])) {
    $http= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $status = $datamanipulation->updateStaffProfile($name,$email,$phone,$address,$id);
    if($status){
        $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Update Data Successfully.</span>
                         </div>";

        Utility::redirect( "$http");
    }
}
if(isset($_POST['changePass'])) {
    $http= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

        $status = $datamanipulation->changePass($new_password, $id);
        if($status){
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Change Password Successfully.</span>
                         </div>";

            Utility::redirect( "$http");


        }


    }


if(isset($_GET['delete_notice'])){

    $status = $datamanipulation->deleteNotice($_GET['delete_notice']);
    if($status){
        Utility::redirect("../../views/seller/notice.php");

    }

}



if(isset($_POST['update'] )){
    $http= $_SERVER['HTTP_REFERER'];
    $update = $datamanipulation->updateUserData($_POST['user_id'],$_POST['name'],$_POST['profession'],$_POST['phone'],$_POST['road_no'],$_POST['holding_no'],$_POST['owner_name'],$_POST['building_name'],$_POST['address'],$_POST['bio']);
    var_dump($update);
    if($update){
        $_SESSION["UdateMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Updated - </b> Update Your Data Successfully. </span>
                        </div>";
        Utility::redirect("$http");
    }
}




if (isset($_POST['checkedNo'])){
        $checkedNo = $datamanipulation->updateChatActiveNo($_POST['user_id']);
        return $checkedNo;
}
if (isset($_POST['checkedYes'])){
    $checkedYes = $datamanipulation->updateChatActiveYes($_POST['user_id']);
}

if(isset($_POST['old_pass'] )){
    $id = $_POST['user_id'];
    $data = $datamanipulation->userPassword($id);
    echo json_encode($data);
}

