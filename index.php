<?php
    include_once 'admin/include/class.user.php'; 
    $user = new User();
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

    <!-- Image Slider -->
    <div class="w3-content w3-section">
        <img class="mySlides w3-animate-fading banner" src="images/banner/banner1.jpg">
        <img class="mySlides w3-animate-fading banner" src="images/banner/banner2.png">
        <img class="mySlides w3-animate-fading banner" src="images/banner/banner3.jpg">
        <img class="mySlides w3-animate-fading banner" src="images/banner/banner4.png">
        <img class="mySlides w3-animate-fading banner" src="images/banner/banner5.jpg">
    </div>

    
    <div class="container about_area">
        <div class="col-xl-5 col-lg-5 about_info">
                <div class="section_title mb-20px">
                    <span>About Us</span>
                    <h3>A Luxurious Hotel with Nature</h3>
                </div>
                <p>
                    Made with impromtu plans in mind, Crash Pads are intimate and comfortable spaces, ideal 
                    for short stays. When booked directly these rooms include access to Ned's Club Gym and Spa.
                </p>
                <a href="#" class="line-button">Learn More</a>
        </div>

        <div class="col-xl-7 col-lg-7 about_thumb d-flex" style="display: flex;">
            <div class="img_1">
                <img src="images/about/about1.png" alt="">
            </div>
            <div class="img_2">
                <img src="images/about/about2.png" alt="">
            </div>
        </div>
    </div>


    <div class="video_area video_bg overlay">
        <div class="video_area_inner text-center">
            <span>Montana Sea View</span>
            <h3>Relax and Enjoy your Vacation </h3>
        </div>
    </div>


    <div class="about_area container">
        <div class="col-xl-7 col-lg-7 about_thumb2 d-flex" style="display: flex;">
            <div class="img_1">
                <img src="images/about/food1.png" alt="">
            </div>
            <div class="img_2">
                <img src="images/about/food2.png" alt="">
            </div>
        </div>

        <div class="col-xl-5 col-lg-5 about_info">
            <div class="section_title mb-20px">
                <span>Delicious Food</span>
                <h3>We Serve Fresh and Delicious Food</h3>
            </div>
            <p>
                Yummy food is scrumptious, delicious, delectable, luscious, great tasting, much more than 
                tasty, really appetizing, lip-smacking; the kind of food to have you licking your lips in 
                anticipation. This is the word everyone wants to hear when bringing food to the table. 
                Yummy food is never unpalatable, plain tasting, distasteful or disgusting.
            </p>
            <a href="#" class="line-button">Learn More</a>
        </div>
    </div>


    <div class="features_room">
        <div class="section_title text-center mb-50">
            <span>Featured Rooms</span>
            <h3 style="margin-top: 5px; ">Choose a room suited to your needs.</h3>
        </div>

        <div class="rooms_here">

            <?php 
            $query_rooms = $user -> db -> prepare("SELECT * FROM RoomCategory");
            $query_rooms -> execute();
            $result_rooms = $query_rooms -> get_result();
            while($result = $result_rooms -> fetch_assoc()) { ?>
                <div class="single_rooms">
                    <div class="room_thumb">
                        <?php
                        echo "
                            <img src='".$result["room_category_image"]."' alt'".$result["room_type"]."'>
                            <div class='room_heading d-flex justify-content-between align-items-center'>
                                <div class='room_heading_inner'>
                                    <span>From Rs ".$result["price"]." /night</span>
                                    <h3>".$result["room_type"]."</h3>
                                </div>
                                <a href='reservation.php?room_category_id=".$result["room_category_id"]."' class='line-button' target='_blank'>Book Now</a>
                            </div>
                        ";
                        ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>
    
</body>

<script src="my_js/slide.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>