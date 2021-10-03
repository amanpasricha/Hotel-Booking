<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotel');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }
            public function reg_user($name, $username, $password, $email)
            {
                //$password=md5($password);
                $sql="SELECT * FROM manager WHERE uname='$username' OR uemail='$email'";
                $check=$this->db->query($sql);
                $count_row=$check->num_rows;
                if($count_row==0)
                {
                    $sql1="INSERT INTO manager SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
                    $result= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }
            
            
            public function add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO RoomCategory SET room_type='$roomname', available_rooms='$available', booked_rooms='$booked', total_rooms='$room_qnty', no_of_beds='$no_bed', bed_type='$bedtype', facilities='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO rooms SET room_cat='$roomname', book='false'";
                        mysqli_query($this->db,$sql2);
                        
                    }
                
                    return $result;
                

            }
            
            public function check_available($checkin, $checkout)
            {
                $sql = "SELECT DISTINCT room_cat FROM Rooms WHERE room_id NOT IN 
                (SELECT DISTINCT room_id FROM Rooms 
                WHERE (checkin <= '$checkin' AND checkout >'$checkin')
                OR (checkin >= '$checkin' AND checkin <='$checkout'))";

                $check= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Query Doesnt run");;
            
                return $check;
            }
            
            
            
            
            public function booknow($user_name, $mobile_no, $check_in, $check_out, $aadhar_no, $room_cat_id)
            {
                    
                    $sql="SELECT * FROM Rooms WHERE room_category_id='$room_cat_id' AND room_id NOT IN 
                    (SELECT DISTINCT room_id FROM Rooms WHERE checkin <= '$check_in' AND checkout >='$check_in')";

                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data herecannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
                        
                        $sql2="UPDATE Rooms SET checkin='$check_in', checkout='$check_out', name='$user_name', phone='$mobile_no', book='true' WHERE room_id=$id";
                        
                        $send=mysqli_query($this->db,$sql2);
                        if($send) {
                            $result="Your Room has been booked!!";
                        } else {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else {
                        $result = "No Room Is Available";
                    }
                
                    return $result;
            }
            
            
            
            
             public function edit_all_room($checkin, $checkout, $name, $phone,$id)
            {
                                
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    
                
                    return $result;
                

            }
            
            
            
            
            
             public function edit_room_cat($room_cat, $total_rooms, $no_of_beds, $bed_type,$facilities,$price,$room_cat_id)
            {
                    
                 
                        $sql2="DELETE FROM Rooms WHERE room_category_id='$room_cat_id'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$total_rooms;$i++)
                        {
                            $sql3="INSERT INTO Rooms SET room_cat='$room_cat', book='false', room_category_id='$room_cat_id'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available_rooms=$total_rooms;
                        $booked_rooms=0;
                 
                        $sql="UPDATE RoomCategory SET room_type='$room_cat', available_rooms='$available_rooms', booked_rooms='$booked_rooms', total_rooms='$total_rooms', no_of_beds='$no_of_beds', bed_type='$bed_type', facilities='$facilities', price='$price' WHERE room_type='$room_cat_id'";
                        $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
  
                    
                
                    return $result;
                

            }
            
            
            
            
            
            public function check_login($emailusername,$password)
            {
                //$password=md5($password);
                $sql2="SELECT uid from manager WHERE uemail='$emailusername' OR uname='$emailusername' and upass='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['uid']=$user_data['uid'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function get_session()
            {
                return $_SESSION['login'];
            }
            public function user_logout()
            {
                $_SESSION['login']=false;
                session_destroy();
            }
        }

?>