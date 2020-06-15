<?php
session_start();
$user=$_POST['user_id'];
$password=$_POST['password'];


function admin_verification($user,$password){
include 'connection.php';
$op;
$result=mysqli_query($conn,"select * FROM volunteer WHERE email = '$user' and password = '$password' and flag='1'") or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
if($row['ID']!=null) { 
         $_SESSION['vol_user']=$user;
                header("location: volunteer_data.php");
                $op=true;
               }else {
                header("location: volunteer_login.php");
                $op=false;
                }

    // close the result. 
    mysqli_free_result($result); 
return $op;

}

admin_verification($user,$password);
