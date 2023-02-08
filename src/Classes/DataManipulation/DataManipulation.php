<?php
namespace App\DataManipulation;
use App\Model\Database as DB;
use  App\Utility\Utility;



class DataManipulation extends DB
{

 public function checkEmailInAdminTable($email){

    $sql = "SELECT * FROM admin where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CheckOtp($otp){

    $sql = "SELECT * FROM users where emailtoken = '".$otp."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkEmailInUserTable($email){

    $sql = "SELECT * FROM users where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkEmail($email){

    $sql = "SELECT * FROM users where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function adminData($user_id){

    $sql = "SELECT * FROM admin where admin_id = '".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllNotice(){

    $sql = "SELECT * FROM notice";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
    public function showAlertonMessageforbuyers($id){
        $message = "unseen";
        $sql = "select sellers_id, messageRead from chat where buyers_id = '".$id."' && messageRead='".$message."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
    public function showAlertonMessage($sellers_id){
        $message = "unseen";
        $sql = "select buyers_id, message from chat where  sellers_id = '".$sellers_id."' &&  message='".$message."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }

//    public function insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
//        $dataArray=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
//        $sql="insert into chat(user_id,clients_id,user_name,clients_name,message_from,date,time)VALUES (?,?,?,?,?,now(),now())";
//        $sth=$this->Dbconnect->prepare($sql);
//        $status=$sth->execute($dataArray);
//        $update = "update chat set messageRead = 'seen' where user_id = '".$buyers_id."' &&  clients_id = '".$sellers_id."'";
//        $this->Dbconnect->exec($update);
//        return $status;
//    }
    public function insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $dataArray=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(buyers_id,sellers_id,buyers_name,sellers_name,message_from,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        $update = "update chat set messageRead = 'seen' where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);
        return $status;
    }
//    public function viewSellerBuyersTotalInfo($buyers_id,$sellers_id){
//        $sql = "SELECT * FROM chat where user_id = '".$buyers_id."' &&  clients_id = '".$sellers_id."' ORDER BY no DESC";
//        $data = $this->Dbconnect->query($sql);
//        $data->setFetchMode(\PDO::FETCH_OBJ);
//        $satatus = $data->fetchAll();
//
//        $updates = "update chat set messageRead = 'seen' where user_id = '".$buyers_id."' &&  clients_id = '".$sellers_id."'";
//        $this->Dbconnect->exec($updates);
//
//        return $satatus;
//    }
    public function viewSellerBuyersTotalInfo($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $updates = "update chat set messageRead = 'seen' where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."'";
        $this->Dbconnect->exec($updates);

        return $satatus;
    }
    public function viewSellerBuyersTotalInfoS($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $update = "update chat set message = 'seen' where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);

        return $satatus;
    }
//    public function insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
//        $data=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
//        $sql="insert into chat(user_id,clients_id,user_name,clients_name,message_to,date,time)VALUES (?,?,?,?,?,now(),now())";
//        $sth=$this->Dbconnect->prepare($sql);
//        $status=$sth->execute($data);
//        $update = "update chat set message = 'seen' where user_id = '".$buyers_id."' &&  clients_id = '".$sellers_id."'";
//        $this->Dbconnect->exec($update);
//        return $status;
//    }
    public function insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $data=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(buyers_id,sellers_id,buyers_name,sellers_name,message_to,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($data);
        $update = "update chat set message = 'seen' where buyers_id = '".$buyers_id."' &&  sellers_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);
        return $status;
    }
public function showAdminData(){

    $sql = "SELECT * FROM admin";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showNoticeById($id){

    $sql = "SELECT * FROM notice where id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkPass($id){

    $sql = "SELECT password FROM users where user_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showStaffProfile($user_id){

    $sql = "SELECT * FROM users where user_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
    public function showBabyDataById($id){

        $sql = "SELECT * FROM child WHERE id='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function showRegisterBabyDataById($id){

        $sql = "SELECT * FROM register_baby WHERE id='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }

public function checkBabyData($id){

        $sql = "select *  from document where child_id='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function showAllChild(){

        $sql = "select *  from child where status='no'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function showAllChildByUserId($id){

        $sql = "select *  from request where user_id='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
public function showFosterProfile($user_id){

    $sql = "SELECT * FROM users where user_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}


public function showVehicleDataByid($id){

    $sql = "SELECT * FROM vehicle WHERE id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTollDataById($id){

    $sql = "SELECT * FROM toll WHERE toll_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTollDataByVehicleNo($id){

    $sql = "SELECT * FROM vehicle WHERE id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTransaction($id){

    $sql = "SELECT * FROM payment WHERE payment_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllTransaction(){

    $sql = "SELECT * FROM payment WHERE type= 'payment' ORDER BY payment_id DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllDonation(){

    $sql = "SELECT * FROM payment WHERE type != 'payment' ORDER BY payment_id DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showPaymentData($payment_id){

    $sql = "SELECT * FROM payment  WHERE payment_id='".$payment_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTransactionById($user_id){

    $sql = "SELECT * FROM payment WHERE user_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showUserId($userId){

    $sql = "SELECT * FROM users WHERE user_id='".$userId."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAdminDataById($user_id){

    $sql = "SELECT * FROM admin WHERE admin_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllUsersAccount(){

    $sql = "SELECT * FROM users";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllUsers(){

    $sql = "SELECT * FROM users WHERE status= 'yes'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllRegisterBaby(){

    $sql = "SELECT * FROM register_baby";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showRegisterBabyById($id){

    $sql = "SELECT * FROM register_baby WHERE  id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllDeactiveUsersAccount(){

    $sql = "SELECT * FROM users WHERE status ='no'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showRefundDataById($id){

    $sql = "SELECT * FROM refund WHERE user_id ='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAttentanceByBabyId($baby_id){

    $sql = "SELECT * FROM attendance WHERE child_id ='".$baby_id."' ORDER BY date DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllAdoptRequest(){

    $sql = "SELECT * FROM request";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
    public function showAllBaby(){

        $sql = "select *  from child";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
public function showRefundData($id){

    $sql = "SELECT * FROM refund WHERE user_id ='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showRegisterBaby($id){

    $sql = "SELECT * FROM request WHERE id ='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}

public function showAllRefundData(){

    $sql = "SELECT * FROM refund WHERE status ='no'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showUserByEmail($userEmail){

    $sql = "SELECT * FROM users WHERE email='".$userEmail."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showUserByAdminEmail($userEmail){

    $sql = "SELECT * FROM admin WHERE email='".$userEmail."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function countUnseenTransaction(){

    $sql = "select count(status) as total from payment where status = 'unseen'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllAccount(){

    $sql = "select count(position) as total from users where position = 'staff'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalNotice(){

    $sql = "select count(id) as total from notice";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalAdmin(){

    $sql = "select count(admin_id) as total from admin";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function totalAdoptRating(){

        $sql = "SELECT count(rating) as countRating, count(client_id) as totalClient, SUM(rating) as sumRating,AVG(rating) as averageRating FROM rating WHERE status='Adopt'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
}
public function totalDayCareRating(){

        $sql = "SELECT count(rating) as countRating, count(client_id) as totalClient, SUM(rating) as sumRating,AVG(rating) as averageRating FROM rating WHERE status='Day_Care'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
}
public function totalRatingUsers(){

    $sql = "SELECT  count(client_id) as totalClient FROM rating WHERE status='Adopt'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function totalRatingDayCare(){

    $sql = "SELECT  count(client_id) as totalClient FROM rating WHERE status='Day_Care'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}

public function checkRating($client_id){

    $sql = "SELECT * FROM rating WHERE status='Adopt' && client_id='".$client_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkRatingDayCare($client_id){

    $sql = "SELECT * FROM rating WHERE status='Day_Care' && client_id='".$client_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountRefund(){

    $sql = "select count(rf_id) as total from refund where status='no'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public  function  insertRate($client_id,$coutnRating){
    $array = array($client_id,$coutnRating);
    $sql = "insert into rating (client_id,rating) VALUE (?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  addNurse($phone,$name,$email,$address,$image){
    $array = array($phone,$name,$email,$address,$image);
    $sql = "insert into nurse (phone,name,email,address,image) VALUE (?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  addAdoptBaby($name,$age,$gender,$weight,$image){
    $array = array($name,$age,$gender,$weight,$image);
    $sql = "insert into child (name,age,gender,weight,image,date) VALUE (?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}

public  function  insertRateBabyAdop($client_id,$coutnRating,$status){
    $array = array($client_id,$coutnRating,$status);
    $sql = "insert into rating (client_id,rating,status) VALUE (?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function showAllOwnerAccount(){

    $sql = "select count(position) as total from users where position = 'owner'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllDeactiveOwner(){

    $sql = "select count(position) as total from users where status = 'no' && position='owner'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllDeactiveStaff(){

    $sql = "select count(position) as total from users where status = 'no' && position='staff'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalAmount(){

    $sql = "select sum(amount) as total from payment WHERE type = 'payment'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalDonation(){

    $sql = "select sum(amount) as total from payment WHERE type != 'payment'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showBabyDetails($id){

    $sql = "select * from register_baby WHERE  gurdian_id ='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllNurse(){

    $sql = "select * from nurse";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function checkRequest($user_id,$child_id){

    $sql = "select * from request WHERE user_id = '".$user_id."' && child_id = '".$child_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function AllMyProduct($id){

    $sql = "SELECT * FROM item where seller_id = '".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
    public function updateItemWithoutImage($item_id,$updateProductName,$updatePrice,$description,$image){

        $array = array($updateProductName,$updatePrice,$description,$image);
        $sqls = "update item set product_name=?, price=?,description=?,image=? WHERE  item_id='" . $item_id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function updateItem($item_id,$updateProductName,$updatePrice,$description){
        $array = array($updateProductName,$updatePrice,$description);
        $sqls = "update item set product_name=?, price=?,description=? WHERE  item_id='" . $item_id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function postDataCollectviaUserId($id){
//        var_dump($id);
        $sql = "SELECT * FROM item WHERE item_id ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
public function showItemByCardId($id){

    $sql = "SELECT * FROM card WHERE cart_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}

//public function showCardData($id,$seller_id){
//
//    $sql = "SELECT * FROM card where status='no' && buyer_id = '".$id."' && seller_id = '".$seller_id."'";
//    $data = $this->Dbconnect->query($sql);
//    $data->setFetchMode(\PDO::FETCH_OBJ);
//    $satatus = $data->fetchAll();
//    return $satatus;
//}

public function showCardData($id){

    $sql = "SELECT * FROM card where status='no' && buyer_id = '".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}

public function statusCheckItem($buyer_id,$seller_id,$item_id){

    $sql = "SELECT * FROM card where status = 'no' && item_id='".$item_id."' && buyer_id='".$buyer_id."' && seller_id='".$seller_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function checkAllproduct($id){

    $sql = "SELECT * FROM item where seller_id = '".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showSellerAccount($user_id){

    $sql = "SELECT * FROM users where user_id = '".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}

public function showMyOrderHistoryById($id){

    $sql = "SELECT * FROM card where seller_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showMyOrderHistory(){

    $sql = "SELECT * FROM card";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showItemImage($id){

    $sql = "SELECT * FROM item WHERE item_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showVaccineByBabyId($id){

    $sql = "SELECT * FROM vaccine WHERE child_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showNurseById($id){

    $sql = "SELECT * FROM nurse WHERE id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkAttendance($id,$date){

    $sql = "SELECT * FROM attendance WHERE child_id='".$id."' && date = '".$date."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkHasitemByid($id){

    $sql = "SELECT * FROM item WHERE seller_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function updateQuantity($cart_id,$totalQuantity,$totalPrice){

    $array = array($totalQuantity,$totalPrice);
    $sqls = "update card set quantity=?,uprice=? WHERE  cart_id='" . $cart_id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateBabyAttendance($id,$time,$date){

    $array = array($time,$date);
    $sqls = "update attendance set out_time=?,date=? WHERE  id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateCondition($id,$condition){

    $array = array($condition);
    $sqls = "update register_baby set health_status=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateNurse($id,$nurse_id){

    $array = array($nurse_id);
    $sqls = "update register_baby set nurse_id=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateBaby($id,$floor,$room,$seat,$room_type){

    $array = array($floor,$room,$seat,$room_type);
    $sqls = "update register_baby set floor=?,room=?,seat=?,room_type=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function editNurseWithImage($nurse_id,$phone,$name,$email,$address,$image){

    $array = array($phone,$name,$email,$address,$image);
    $sqls = "update nurse set phone=?,name=?,email=?,address=?,image=? WHERE  id='" . $nurse_id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function editNurseWithOutImage($nurse_id,$phone,$name,$email,$address){

    $array = array($phone,$name,$email,$address);
    $sqls = "update nurse set phone=?,name=?,email=?,address=? WHERE  id='" . $nurse_id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
    public function updateSellerProfileWithImage($name,$email,$phone,$address,$new_password,$image,$id){

        $array = array($name,$email,$phone,$address,$new_password,$image);
        $sqls = "update users set name=?,email=?,phone=?,address=?,password=?,image=? WHERE  user_id='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updateSellerProfileWithOutImage($name,$email,$phone,$address,$new_password,$id){
        $array = array($name,$email,$phone,$address,$new_password);
        $sqls = "update users set name=?,email=?,phone=?,address=?,password=? WHERE  user_id='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updateAdminProfileWithImage($name,$email,$phone,$address,$new_password,$image,$id){

        $array = array($name,$email,$phone,$address,$new_password,$image);
        $sqls = "update admin set name=?,email=?,phone=?,address=?,password=?,image=? WHERE  admin_id='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updateAdminProfileWithoutImage($name,$email,$phone,$address,$new_password,$id){

        $array = array($name,$email,$phone,$address,$new_password);
        $sqls = "update admin set name=?,email=?,phone=?,address=?,password=? WHERE  admin_id='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

public function deletecard($id)
{
    $sql = "delete from  card WHERE cart_id = '".$id."'";
    $data = $this->Dbconnect->exec($sql);
    return $data;
}
public function insertCartProduct($price,$name,$item_id,$seller_id,$buyer_id){

    $array = array($price,$name,$item_id,$seller_id,$buyer_id);
    $sql = "insert into card (price,name,item_id,seller_id,buyer_id,confirm_date) VALUE (?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function insertBabyVaccine($id,$vaccine_name){

    $array = array($id,$vaccine_name);
    $sql = "insert into vaccine (child_id,vaccine_name,date) VALUE (?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function insertBabyFoot($id,$food,$time){

    $array = array($id,$food,$time);
    $sql = "insert into food (child_id,food,time,date) VALUE (?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function insertBabyAttendance($id,$shift,$time){

    $array = array($id,$time);
    $sql = "insert into attendance (child_id,in_time,date) VALUE (?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function checkItem($product_id,$seller_id){

    $sql = "SELECT * FROM item where seller_id = '".$seller_id."' && item_id='".$product_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function deleteItemId($id)
{
    $sql = "delete from  item WHERE item_id = '".$id."'";
    $data = $this->Dbconnect->exec($sql);
    return $data;
}
public function deleteVaccineId($id)
{
    $sql = "delete from  vaccine WHERE vac_id = '".$id."'";
    $data = $this->Dbconnect->exec($sql);
    return $data;
}
public function deleteAdopt($id)
{
    $sql = "delete from  child WHERE id = '".$id."'";
    $data = $this->Dbconnect->exec($sql);
    return $data;
}
public function showAllShopData($id){

    $sql = "SELECT * FROM users WHERE position !='Adopt'  && status ='yes' && user_id !='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function insertItem($product_id,$seller_id,$name,$price,$image,$description){

    $array = array($product_id,$seller_id,$name,$price,$image,$description);
    $sql = "insert into item (product_id,seller_id,product_name,price,image,description) VALUE (?,?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public function showAllRegisterBabyById($id){

    $sql = "select * from register_baby WHERE gurdian_id = '".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showFoodListByBabyId($id){

    $sql = "select * from food WHERE child_id = '".$id."' ORDER BY date DESC ";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showFoodListById($id,$date){

    $sql = "select * from food WHERE child_id = '".$id."' && date = '".$date."' ";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllProduct(){

    $sql = "select * from item";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}

public function updateStatus($table,$id, $status){

    $array = array($status);
    $sqls = "update $table set status=? WHERE  payment_id ='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateBabyStatus($id, $status){

    $array = array($status);
    $sqls = "update child set status=? WHERE  id ='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminRegisterToken($emailToken, $userEmail){

    $array = array($emailToken);
    $sqls = "update admin set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function addReport($id,$report,$date){

    $array = array($report,$date);
    $sqls = "update child set report=?, report_date=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateNotice($id,$notice){

    $array = array($notice);
    $sqls = "update notice set notice=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function ChangeStatus($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update toll set status=? WHERE  toll_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function ConfirmAcount($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update users set status=? WHERE  user_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function ConfirmBabyAcount($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update register_baby set status=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function confirmOrder($id,$date){
    $status='yes';
    $array = array($status,$date);
    $sqls = "update card set confirm_status=?,delivery_date=? WHERE  cart_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function viewConfimrListInfo($id){
    $sql = "SELECT * FROM card where buyer_id = '".$id."' && status='yes' ";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $status = $data->fetchAll();
    return $status;
}
public function orderDelete($orderNo){
    $sql=" delete from card WHERE cart_id ='".$orderNo."' ";
    $data= $this->Dbconnect->exec($sql);
    return $data;
}
public function deleteNurse($id){
    $sql=" delete from nurse WHERE id ='".$id."' ";
    $data= $this->Dbconnect->exec($sql);
    return $data;
}
public function updatetCartStatus($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update card set status=? WHERE  cart_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateRefundStatus($id){
       $sts='yes';
    $array = array($sts);
    $sqls = "update refund set status=? WHERE  rf_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function confirmUser($id){
       $sts='yes';
    $array = array($sts);
    $sqls = "update users set status=? WHERE  user_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function confirmAdopt($id){
       $sts='yes';
    $array = array($sts);
    $sqls = "update request set status=? WHERE  id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}

public function updateUserRegisterToken($emailToken, $userEmail){

    $array = array($emailToken);
    $sqls = "update users set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateEmailToken($emailToken,$userEmail){

    $array = array($emailToken);
    $sqls = "update users set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateToken($emailToken,$payment_id,$image){

    $array = array($emailToken,$image);
    $sqls = "update payment set token=?,QR_image=?,status='seen' WHERE  payment_id='" . $payment_id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}

public function updatePayment($payment_id,$amount,$transaction,$name,$phone){

    $array = array($payment_id,$amount,$transaction,$name,$phone);
    $sqls = "update payment set payment_id=?,amount=?,transaction_id=?,name=?,phone=? WHERE  payment_id='" . $payment_id . "' ";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function verifyAdminToken($pass, $code){

    $array = array($pass);
    $sqls = "update admin set password=?, emailtoken='yes' WHERE  emailtoken='" . $code . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminProfile($phone,$name,$email,$address,$password,$id){

    $array = array($phone,$name,$email,$address,$password);
    $sqls = "update admin set phone=?,name=?,email=?,address=?,password=? WHERE  admin_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function   updateStaffProfile($name,$email,$phone,$address,$id){

    $array = array($name,$email,$phone,$address);
    $sqls = "update users set name=?,email=?,phone=?,address=? WHERE  user_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateUserPass($pass,$otp,$email){

    $array = array($pass);
    $sqls = "update users set password=?, emailtoken='yes' WHERE  emailtoken='" . $otp . "' && email='".$email."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateStaffImage($image,$id){

    $array = array($image);
    $sqls = "update users set image=? WHERE  user_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminImage($image,$id){

    $array = array($image);
    $sqls = "update admin set image=? WHERE  admin_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function changePass($new_password, $id){

    $array = array($new_password);
    $sqls = "update users set password=? WHERE  user_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminPass($pass,$otp,$email){

    $array = array($pass);
    $sqls = "update admin set password=?, emailtoken='yes' WHERE  emailtoken='" . $otp . "' && email='".$email."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}

public  function  insertRegisterData($name,$phone,$email,$position,$password,$image_nid_front,$image_nid_back,$address,$image){
    $array = array($name,$phone,$email,$position,$password,$image_nid_front,$image_nid_back,$address,$image);
    $sql = "insert into users (name,phone,email,position,password,nid_front,nid_back,address,image) VALUE (?,?,?,?,?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
    public  function  insertRequest($user_id,$application,$child_id,$image_electric_bill,$image_land_paper){
        $array = array($user_id,$application,$child_id,$image_electric_bill,$image_land_paper);
        $sql = "insert into request (user_id,application,child_id,electric_bill,land_paper,date) VALUE (?,?,?,?,?,now())";
        $data = $this->Dbconnect->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
public  function  register_baby($image,$gurdian_id,$name,$age,$gender,$admit_date){
    $array = array($image,$gurdian_id,$name,$age,$gender,$admit_date);
    $sql = "insert into register_baby (image,gurdian_id,name,age,gender,admit_date) VALUE (?,?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}

public  function  insertPayment($user_id,$amount,$transaction,$name,$phone){
    $array = array($user_id,$amount,$transaction,$name,$phone);
    $sql = "insert into payment (user_id,amount,transaction_id,name,phone,date) VALUE (?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  insertDonation($type,$amount,$transaction,$name,$phone){
    $array = array($type,$amount,$transaction,$name,$phone);
    $sql = "insert into payment (type,amount,transaction_id,name,phone,date) VALUE (?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}

public  function  insert_new_admin($name,$email,$phone,$password,$position,$image){
    $array = array($name,$email,$phone,$password,$position,$image);
    $sql = "insert into admin (name,email,phone,password,position,image) VALUE (?,?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}


public  function  insertNotice($notice){
    $array = array($notice);
    $sql = "insert into notice (notice,date,time) VALUE (?,now(),now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
    public function delete_admin($id)
    {
        $sql = "delete from  admin WHERE admin_id = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
    public function deleteAcount($id)
    {
        $sql = "delete from  users WHERE user_id = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }

    public function deleteNotice($id)
    {
        $sql = "delete from  notice WHERE id = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
}