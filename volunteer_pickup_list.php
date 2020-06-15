<?
include 'connection.php';



$query=mysqli_query($conn,"select * FROM donation_quantity Inner join donation on donation_quantity. ") or die(mysqli_error($conn));
while($row= mysqli_fetch_array($query)){
?>
?>