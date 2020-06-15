<?php
session_start();
$user=$_POST['email'];
$password=$_POST['password'];



function ngo_verification($user,$password){
include 'connection.php';
$op;
$result=mysqli_query($conn,"select * FROM ngo WHERE email = '$user' and password = '$password' and flag='1'") or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$ngoId=trim($row['ngoId']);
if($row['ngoId']!=null) { 
             $_SESSION['user']=$user;
                header("location: ngo_data.php?ngoid='$ngoId'");
                $op=true;
               }else {
                header("location: ngo_login.php");
                $op=false;
                }

    // close the result. 
    mysqli_free_result($result); 
    return $op;
}
ngo_verification($user,$password);
