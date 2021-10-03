<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 

$id=$_GET['id'];

$sql="SELECT * FROM rooms WHERE room_id='$id'";
$query=mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);
 

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $result=$user->edit_all_room($checkin, $checkout, $name, $phone,$id);
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('".$result."');
         </script>";
    }

   
} 
?>


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
    <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
	<?php include('header.php'); ?>
    <div class="container well padd-block">

        <h2>Edit <?php echo $row['room_cat']?></h2>
        <hr>

        <form action="" method="post" name="room_category">

            <div style="padding-inline: 4rem;">
            
                <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker form-control" name="checkin" value="<?php echo $row['checkin']?>">

                </div>
                
                <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker form-control" name="checkout" value="<?php echo $row['checkout']?>">
                </div>
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']?>" required>
                </div>
                    
                
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Update</button>

                <br>
                <div id="click_here">
                    <a href="admin.php">Back to Admin Panel</a>
                </div>

            </div>
            
        </form>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>