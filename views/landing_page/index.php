<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baby Day Care Adoption System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="fontawesome/css/fontawesome.css">

    </head>

    <body>
        <!-- <navabr start> -->
        <nav class="navbar navbar-expand-lg custome-bg fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <img  class="p-2" src="img/logo.png" width="75" height="75" style="border-radius: 50%">
                    <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white active"
                               aria-current="page" href="#home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#service">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#contact">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login_register_forgot/login.php">Sign in</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- <navabr end> -->

        <!-- <landing section start> -->

        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="home-center text-center">
                        <h1>Baby Day Care <br> & <br> Adoption System</h1>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="bg-info text-white py-2">
                <div class="container text-center">
                    <div class="text-center mt-5">
                        <h5 class="text-uppercase">Our Services</h5>
                        <h2 class="text-uppercase font-weight-bold">services</h2>
                    </div>
                    <div class="row ">
                        <div class="col-md-5">
                                <div class="mt-5">
                                    <img  class="p-2 mt-5" src="img/adoption.jpg" style="width: 400px"; height="410px" >

                                </div>
                        </div>
                        <div class=" col-md-7  shadow-box" style="">
                            <h2 class="text-uppercase mt-5 font-weight-bold text-center">Baby Adoption</h2>
                            <div class="row mt-2">
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/acount.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Create Account</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img class="p-2" src="img/service/message.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Message</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/adoption.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Adoption</h5>

                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/baby.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Baby</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img class="p-2" src="img/service/rating.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Rating</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/contact.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Contact</h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-5 shadow-box">


                    </div>


                </div>
            <div class="container text-center">
                <div class="row ">
                    <div class=" col-md-7  shadow-box" style="">
                        <h2 class="text-uppercase mt-5 font-weight-bold text-center">Baby Day Care</h2>
                        <div class="row mt-5">
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/payment.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid black">
                                    </div>
                                    <h5 class="text-uppercase">Payment</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img class="p-2" src="img/service/message.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                    </div>
                                    <h5 class="text-uppercase">Message</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/attendance.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                    </div>
                                    <h5 class="text-uppercase">Attendance</h5>

                                </div>
                            </div>

                        </div>
                        <div class="row mt-5 shadow-box">
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/health.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Helth</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img class="p-2" src="img/service/vaccine.webp" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Vaccine</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/food.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Food</h5>

                                </div>
                            </div>

                        </div>
                        <div class="row mt-5 shadow-box">
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/rating.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Rating</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img class="p-2" src="img/service/buy.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Buy</h5>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                    <div class="my-2">
                                        <img  class="p-2" src="img/service/sell.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                    </div>
                                    <h5 class="text-uppercase">Sell</h5>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mt-5">
                            <img  class="p-2 mt-5" src="img/baby_care.jpeg" style="width: 580px" height="740px" >

                        </div>
                    </div>


                </div>



            </div>

        </section>


        <!-- <Services section end> -->

        <!-- < contact section Start> -->

        <section id="contact" class="custome-bg">
            <div class="container">
                <div class="row custome-bg mt-4">
                    <div class="col-md-6 mt-4 custome-bg">
                        <div class="text-center text-white mb-2">
                            <h5 class="text-uppercase text-left">Our Office</h5>
                            <div class="text-left">
                                <span class="text-left">+8801866330130</span>
                                <br>
                                <span class="text-left">farahnazsultana72@gmail.com</span>
                                <br>
                                <span class="text-left">D.C Road, Chawkbazar, Chittagong, Bangladesh</span>
                                <br>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 ">
                        <div class="text-center mt-3 text-white mb-2">
                            <h5 class="text-uppercase">Contact form</h5>
                            <?php
                            if(isset($_SESSION['SendMessage'])){
                                echo $_SESSION['SendMessage'];
                                unset($_SESSION['SendMessage']);
                            }
                            ?>
<!--                            <h2 class="text-uppercase font-weight-bold">Get in Touch</h2>-->
                        </div>
                        <form action="../process/email.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
<!--                                    <lable for="firstName"> Name</lable>-->
                                    <input type="text" name="name" class="form-control"
                                           placeholder=" Name" id="firstName">
                                </div>
                            </div>
                            <div class="form-group">
<!--                                <lable for="email">Email</lable>-->
                                <input type="email" name="email" class="form-control"
                                       placeholder="Your Email" id="email">
                            </div>
                            <div class="form-group">
<!--                                <lable for="subject">Subject</lable>-->
                                <input type="text" name="subject" class="form-control"
                                       placeholder="Your Subject" id="subject">
                            </div>
                            <div class="form-group">
<!--                                <lable for="email">Message</lable>-->
                                <textarea class="form-control" name="message" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class=" mb-2 btn btn-info bg-dark" name="message_from_home_page">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>