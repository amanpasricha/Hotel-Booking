<?php
    include_once 'admin/include/class.user.php'; 
    $user = new User();
?>


<!DOCTYPE html>
<html lang="en-IN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Available Rooms & Services</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        h1 {
            font-size: 60px;
            color: floralwhite;
            font-weight: 600;
            margin-bottom: 0;
            text-transform: capitalize;
        }

        
        .room_banner{
            background-size: cover;
            background-position: center;
            background-image: url(images/home_gallary/6.jpg);
            padding: 320px 0 90px 0;
            text-align: center;
            /* color: white; */
        }

        .padd {
            padding: 16px;
        }   

        .about_thumb {
            height: 20rem;
        }
    </style>
    
    
</head>

<body>
	<?php include('header.php'); ?>
    
    <div class="room_banner">
        <h1>Our Luxury Rooms</h1>
    </div>

    <!-- Ongoing Offers Area Start -->
    <div class="container offers_area">
        <?php
        $room_query = mysqli_query($user->db, "SELECT * FROM RoomCategory");
        
        if($room_query && mysqli_num_rows($room_query)) { ?>
        
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center">
                        <h3>Ongoing Offers</h3>
                    </div>
                </div>
            </div>

            <?php while($row = mysqli_fetch_assoc($room_query)) { ?>

                <div class="col-xl-6 col-md-6 padd">
                    <div class="single_offers">
                        <?php
                        echo "
                            <div class='about_thumb'>
                                <img src='".$row["room_category_image"]."' alt='".$row["room_type"]."'>
                            </div>

                            <h3>Up to ".$row["discount_offer"]."% savings on ".$row["room_type"]."</h3>
                            <ul>
                                <li>No of Beds: ".$row["no_of_beds"]." ".$row["bed_type"]." Beds</li>
                                <li>Facilities: ".$row["facilities"]."</li>
                                <li>Price: Rs ".$row["price"]." /night</li>
                            </ul>
                            <button onclick='book_room(".$row["room_category_id"].")' class='book_now' target='_blank'>Book Now</button>
                        ";
                        ?>
                    </div>
                </div>
                
            <?php 
            } // End of while loop

        } else { // else part of if else
            echo "<h1>No Rooms to Show</h1>";
        } ?>
    
    </div>
    <!-- Ongoing Offers Area End -->

    <!-- Footer -->
    <?php include('footer.php'); ?>

</body>

<script type="text/javascript">
    function book_room(id) {
        window.location.href = "reservation.php?room_category_id="+id;
    }
</script>

</html>