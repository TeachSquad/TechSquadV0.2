<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
<?php
include'connection.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Gedion 24/7</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="welcome.php">Ngo list <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="volunteer_list_admin.php">Volunteer List</a>
      <a class="nav-item nav-link" href="Donation_list_admin.php">Donation List</a>
      <a class="nav-item nav-link" href="index.php">Logout</a>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<?php

include'connection.php';
if(isset($_GET['did'])){
    $id=$_GET['did'];
    
}
?>
<table class="table" id="dynamic_field" style="border-style:none;">
<thead>
    <tr>
        <th scope="col">NGO</th>
        <th scope="col">Item</th>
        <th scope="col">Quantity</th>
    </tr>
</thead>
</div>
<?php
$query=mysqli_query($conn,"select * FROM donation_quantity where donation_Id='$id'") or die(mysqli_error($conn));
while($row= mysqli_fetch_array($query)){
?>

<tr>
    <?php $ngoVal=$row['ngo_Id'];?>
    <?php $query1=mysqli_query($conn,"select * from ngo where ngoID='$ngoVal'");
    $row1=mysqli_fetch_array($query1);
    ?>
    <td><?php echo $row1['ngo_name'];?></td>
    <td><?php echo $row['item'];?></td>
    <td><?php echo $row['quantity'];?></td>  
                               
</tr>

<?php
}
?>
</table>