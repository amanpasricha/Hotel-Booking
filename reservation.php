<?php
    include_once "admin/include/class.user.php"; 
    $user=new User(); 
    
    $room_category_id = $_GET["room_category_id"];
    if(isset($_REQUEST['submit']))
    { 
        extract($_REQUEST); 
        $result = $user->booknow($user_name, $mobile_no, $check_in, $check_out, $aadhar_no, $room_cat_id);
        echo "
            <script type='text/javascript'>
                console.log($user_name + '\t' + $mobile_no + '\t' + $check_in + '\t' + $check_out + '\t' + $aadhar_no + '\t' + $room_cat_id);
            </script>
        ";
        if($result)
        {
            echo "
                <script type='text/javascript'>
                    alert('$result');
                </script>
            ";
        }
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
    
    <style>
        body{
            background-image: url('images/banner/bradcam.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: top right;
        }

        h1 {
            font-size: 44px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include('header.php'); ?>


    <div class="container flex-center padd-block">
        <div class='col-md-10 well'>
            <form action="" method="post" name="room_category">

                <div>
                    <h1 class="text-center" style="padding-bottom: 40px;">Room Reservation</h1>
                </div>

                <div class="form-container">
                    <div class="form-element">
                        <label for="user_name">Your Name:</label>
                        <input id="user_name" name="user_name" class="input-fields" type="text" placeholder="Full Name">
                    </div>

                    <div class="form-element">
                        <label for="mobile_no">Mobile Number:</label>
                        <input id="mobile_no" name="mobile_no" class="input-fields" type="number" maxlength="10" placeholder="+91 1234567890">
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-element">
                        <label for="check_in">Check-In Date:</label>
                        <input id="check_in" name="check_in" class="input-fields" type="date">
                    </div>

                    <div class="form-element">
                        <label for="check_out">Check-Out Date:</label>
                        <input id="check_out" name="check_out" class="input-fields" type="date">
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-element">
                        <label for="aadhar_no">Aadhar Number:</label>
                        <input id="aadhar_no" name="aadhar_no" class="input-fields" type="number">
                    </div>

                    <div class="form-element">
                        <label for="room_cat_id">Select Room Category:</label>
                        <select id="room_cat_id" name="room_cat_id" class="input-fields">
                            <option value="101">Duplex Rooms</option>
                            <option value="102">Super Comfort Rooms</option>
                            <option value="103">Family Rooms</option>
                            <option value="104">Signature Rooms</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex-center">
                    <button type="submit" name="submit" class="btn submit-btn button">
                        Book Now
                    </button>
                </div>

            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>