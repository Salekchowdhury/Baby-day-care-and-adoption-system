<?php
if (!isset($_SESSION)){
    session_start();
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../contents/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/adminlte.min.css">
    <link rel="stylesheet" href="../../contents/css/custom-bg-daycare.css">
    <link rel="stylesheet" href="../../contents/css/new.css">
    <!--<link rel="stylesheet" href="../../contents/css/new.css">-->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="row">


</div>
<!--<div class="row" style="background-color: #343a40;">

    <marquee width="100%" direction="left" height="100%">
        <h1 style="color: #4fbd4f">Welcome To Online Tutor and Student Portal System</h1>
    </marquee>
</div>-->
<div class="row">


    <div class="col-sm-8" style="margin-left: 500px;padding-top: 45px">

        <div class="">
            <div class="">
                <!-- <a href="#"><b>Student</b>Care</a>-->
            </div>
            <div class="" <!--style="border-bottom-left-radius: 45px;-->
            border-top-right-radius: 45px;">
            <div class=" " <!--style="border-bottom-left-radius: 45px;-->
            border-top-right-radius: 45px; border: 3px solid">

            <form  action="../../views/process/verify.php" method="post" style=" display: inline-block;margin-left: 10px;margin-top: 106px;border: 2px solid;border-radius: 13px;padding: 84px; margin: auto">
                <?php
                if(isset($_SESSION['errorMesseage'])){
                    echo $_SESSION['errorMesseage'];
                    unset($_SESSION['errorMesseage']);
                }

                ?>
                <h4 style="color: #3d58cd">Please Select Your Option</h4>

                <div class="row">
                    <div class="col-sm-12 btn-group">
                        <a class="btn btn-secondary  btn-group" href="../baby_care/profile.php" >DAY CARE</a>
                        <a class="btn btn-success  btn-group" href="../Foster/profile.php" >ADOPT</a>
                    </div>

                </div>
            </form>





        </div>
    </div>
</div>



</div>
</div>





<div class="col-sm-4">

</div>
<div class="row">


</div>
</div>
<!--<div class="row">

</div>-->

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="../../contents/plugins/slick-1.8.1/slick-1.8.1/slick/slick.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--<script>
  $(document).ready(function(){
    $("#mySlider").slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });


    $("#mySlider2").slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });
  });
</script>-->

</body>

</html>