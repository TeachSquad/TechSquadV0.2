<?php
session_start();
$user=$_POST['user_id'];
$password=$_POST['password'];


function admin_verification($user,$password){
include 'connection.php';
$op;
$result=mysqli_query($conn,"select * FROM admin WHERE user = '$user' and password = '$password'") or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
if($row['ID']!=null) { 
         $_SESSION['user']=$user;
                header("location: welcome.php");
                $op=true;
               }else {
                header("location: admin_login.php");
                $op=false;
                }

    // close the result. 
    mysqli_free_result($result); 
return $op;

}

admin_verification($user,$password);
