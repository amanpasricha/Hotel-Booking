<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$uid=$_SESSION['uid']; 
if(!$user->get_session()) 
{ 
    header("location:admin/login.php"); 
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
    header("location:index.php"); 
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('header.php'); ?>
	<div class="bradcam_area breadcam_bg_2">
        <h3>Admin Panel</h3>
    </div>
    <div class="about_area" style="padding-top: 100px !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Room Category</span>
                            <h3 style="font-size: 30px;">Manage All Rooms Categories <br> At One Place</h3>
                            <p> 
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="about_thumb d-flex" style="display: flex;">
                        <div class="img_1">
                            <img src="images/about/about1.png" alt="">
                            <a href="admin/addroom.php" class="line-button mt-10">Add Room Category</a>
                        </div>
                        <div class="img_2">
                            <img src="images/about/about2.png" alt="">
                            <a href="room.php" class="line-button mt-10">Show All Room Category</a>
                        </div>
                        <div class="img_1" style="margin-left: 10px">
                            <img src="images/offers/2.png" alt="">
                            <a href="admin/addroom.php" class="line-button mt-10">Edit Room Category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Bookings</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="images/offers/1.png" alt="">
                        </div>
                        <h3>Book rooms and Suites</h3>
                        <a href="reservation.php?room_category_id=101" class="book_now">Book Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="images/offers/2.png" alt="">
                        </div>
                        <h3>Check All Booked Rooms</h3>
                        <a href="show_all_room.php" class="book_now">Show All Booked Rooms</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="images/offers/3.png" alt="">
                        </div>
                        <h3>Edit All Booked Rooms</h3>
                        <a href="show_all_room.php" class="book_now">Edit Booked Room</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bradcam_area manager_bg">
        <h3><a href="admin/registration.php">Add Manager</a></h3>
    </div>
    </div>
    <?php include('footer.php'); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>