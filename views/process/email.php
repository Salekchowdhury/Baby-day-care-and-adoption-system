<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
include ("../../contents/plugins/phpqrcode/qrlib.php");
use App\DataManipulation\DataManipulation;
use App\user_registration\registration;

$datamanipulation =new DataManipulation();
//$registration =new registration();

use PHPMailer\PHPMailer\PHPMailer;
use App\Utility\Utilit;
$mail = new PHPMailer( true);
$datamanipulation =new DataManipulation();


//if(isset($_POST['forgotPassword'])){
//    $http_reffer= $_SERVER['HTTP_REFERER'];
//    //var_dump($_POST);
//    $emailToken = rand(100000, 999999);
//    $_POST['emailToken'] = $emailToken;
//    $userEmail=$_POST['email'];
//   $checkEmailInAdminTable =$datamanipulation->checkEmailInAdminTable($userEmail);
//   $checkEmailInUserTable =$datamanipulation->checkEmailInUserTable($userEmail);
//
//    if($checkEmailInAdminTable || $checkEmailInUserTable ){
//
//
//        try {
//            //Server settings
//            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
//            $mail->isSMTP();                                            // Set mailer to use SMTP
//            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//            $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
//            $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
//            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
//            $mail->Port       = 465;                                    // TCP port to connect to
//
//            //Recipients babydaycareandadoptionsystem@gmail.com
//
//            $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system');
//            $mail->addAddress("$userEmail", 'User');     // Add a recipient
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addReplyTo('babydaycareandadoptionsystem@gmail.com', 'confirmation code');
//            // $mail->addCC('cc@example.com');
//            // $mail->addBCC('bcc@example.com');
//
//            // Attachments
//            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//
//            // Content
//            $mail->isHTML(true);                                  // Set email format to HTML
//            $mail->Subject = 'Change password';
//            $mail->Body    = "$emailToken";
//            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';
//
//            if($mail->send()){
//                if($checkEmailInAdminTable){
//                    $status=$datamanipulation->updateAdminRegisterToken($emailToken, $userEmail);
//                    if($status){
//                        $_SESSION['email']=$_POST['email'];
//                        $_SESSION['type']="Admin";
//                        \App\Utility\Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
//                        // Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
//                        //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
//                    }
//                }elseif ($checkEmailInUserTable){
//                    $status=$datamanipulation->updateUserRegisterToken($emailToken, $userEmail);
//                    if($status){
//                        $_SESSION['email']=$_POST['email'];
//                        $_SESSION['type']="Users";
//                        \App\Utility\Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
//                        // Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
//                        //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
//                    }
//                }
//
//            }
//
//        }
//        catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//            //echo 'Message has been sent';
//        }
//    }else{
//
//        $_SESSION["notFoundEmail"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
//                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
//                            <i class=\"fa fa-times\"></i>
//                          </button>
//                          <span style='color: white'>
//                            <b> Sorry! </b> Email ID is incorrect </span>
//                        </div>";
//        \App\Utility\Utility::redirect("$http_reffer");
//
//    }
//
//
//
//
//
//
//
//}

if(isset($_POST['message_send_by_foster']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['message'];
    $name_user = $_POST['name'];
    $userEmail = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
        $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system ');
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('babydaycareandadoptionsystem@gmail.com');               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
            \App\Utility\Utility::redirect("$http_reffer");


        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_POST['message_send_by_baby_care']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['message'];
    $name_user = $_POST['name'];
    $userEmail = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
        $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system ');
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('babydaycareandadoptionsystem@gmail.com');               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
            \App\Utility\Utility::redirect("$http_reffer");


        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }

}
if(isset($_POST['message_to_foster']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['message'];
    $name_user = $_POST['name'];
    $userEmail = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
        $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system ');
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress($userEmail);               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your Message Sent Successfully. </span>
                        </div>";
            \App\Utility\Utility::redirect("$http_reffer");


        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }

}
if(isset($_POST['message_from_home_page']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['message'];
    $name_user = $_POST['name'];
    $userEmail = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
        $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system ');
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('babydaycareandadoptionsystem@gmail.com');               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> $name_user - </b> Your Message Sent Successfully. </span>
                        </div>";
            \App\Utility\Utility::redirect("$http_reffer");


        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }

}

if(isset($_POST['forgotPassword']))
{
    $emailToken = rand(100000, 999999);
    $subject="Token Number";
    $http_reffer = $_SERVER["HTTP_REFERER"];
    $userEmail=$_POST['email'];
    $_SESSION['email'] =$userEmail;
    $checkAccount=$datamanipulation->showUserByEmail($userEmail);
    $checkAdminAccount=$datamanipulation->showUserByAdminEmail($userEmail);
    if($checkAccount || $checkAdminAccount){
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'babydaycareandadoptionsystem@gmail.com';                     // SMTP username
            $mail->Password   = 'nypjzibbijkvypfc';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('babydaycareandadoptionsystem@gmail.com', 'baby day care and adoption system ');
            //$mail->addAddress("$userEmail", 'User');     // Add a recipient
            $mail->addAddress($userEmail);               // Name is optional
            $mail->addReplyTo($userEmail, 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "
                             <table>
                              <tr><th>Message</th></tr>
                              <tr><td style='font-size: 25px'>$emailToken</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $token=$datamanipulation->updateEmailToken($emailToken,$userEmail);
                $_SESSION["SendMSG"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Token Sended. </span>
                        </div>";
                \App\Utility\Utility::redirect("../login_register_forgot/verification_forgot_password.php");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }
    }else{
        $_SESSION["wrongMSG"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Sorry - </b> Email Id is Wrong..Please Try Again. </span>
                        </div>";
        \App\Utility\Utility::redirect("$http_reffer");
    }


}


