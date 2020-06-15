<?

session_start();
echo $_SESSION['user'];
if(empty($_SESSION['user'])):
 // echo $_SESSION['user'];
  header("location: logout.php");
endif;
?>
<?php
$uri = $_SERVER['REQUEST_URI'];
$split_url = explode("=", $uri);
$item_selected= str_replace("%27","",$split_url[1]);
$ngoId= trim($item_selected);
?>



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
      <!-- <a class="nav-item nav-link active" href="welcome.php">Ngo list <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="volunteer_list_admin.php">Volunteer List</a>
      <a class="nav-item nav-link" href="Donation_list_admin.php">Donation List</a>-->
      <a class="nav-item nav-link" href="ngo_volunteer_list.php?<?php echo $ngoId ?>">Volunteer list</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>

<?php
$query=mysqli_query($conn,"select * FROM ngo where ngoId='$ngoId'") or die(mysqli_error($conn));
//while($row= mysqli_fetch_array($query)){
    $row= mysqli_fetch_array($query)
?>



<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


</html>


<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container-fluid px-0">
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['ngo_name']; ?>" id="ngo_name" name="ngo_name" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['chairman'];?>" id="chairman"name="chairman" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['contact_no'];?>" id="contact" name="contact" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['address'];?>" id="address" name="address" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['email'];?>" id="email" name="email" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $row['establishment_year'];?>" id="establishment_year" name="establishment_year"readonly>
              </div>		
</div>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
          </div>
        </div>
      </div>
    </section>


<div class="form-group">	
    <form action="ngo_add_item.php" method="post">
        <input type="text" name="ngoid" value="<?php echo $ngoId?>" hidden>
					<select class="form-control" id="item" name="item">
					<option selected class="bg-light p-5 contact-form"><p>Add item list</p></option>
					<option value="Old Cloths">Old Cloths</option>
					<option value="Used Computer">Used Computer</option>
                    <option value="Used books">Used books</option>
                    <option value="Used text books">Used text books</option>
                    <option value="New and old toys">New and old toys</option>
                    <option value="New and old toys">Sanitary pad and napkins</option>
                    </select>
                    <div class="form-group"><br>
        <center><input type="submit" name="Insert" class="btn btn-danger"></center>
</div>
    </form>
    </div>
       
    
