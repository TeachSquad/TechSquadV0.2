<?php
include'connection.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

$query=mysqli_query($conn,"Update ngo set flag='1' where ngoId='$id'") or die(mysqli_error($conn));
if($query){
    header("location: ngo_to_verify.php");
}
}
if(isset($_GET['vid'])){
    $id=$_GET['vid'];

$query=mysqli_query($conn,"Update volunteer set flag='1' where ID='$id'") or die(mysqli_error($conn));
if($query){
    header("location: volunteer_list_admin.php");
}
}
if(isset($_GET['did'])){
    $id=$_GET['did'];

$query=mysqli_query($conn,"delete FROM donation where donationId='$id'") or die(mysqli_error($conn));
if($query){
    header("location: Donation_list_admin.php");
}
}
if(isset($_GET['dqid'])){
    $id=$_GET['dqid'];

$query=mysqli_query($conn,"delete FROM donation_quantity where Id='$id'") or die(mysqli_error($conn));
if($query){
    header("location: moreDetails.php");
}
}
?>