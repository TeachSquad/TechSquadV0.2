<html>
<title>Gedion 24/7</title>

<head>
  <?php include 'header.php';
  include 'connection.php';
  ?>
  <?php
  $uri = $_SERVER['REQUEST_URI'];
  $split_url = explode("=", $uri);
  if ($split_url[1] == 1) {
    echo '<script type="text/javascript">';
    echo ' alert("Someone is already picking from this  pickup loaction.Please choose another one ")';  //not showing an alert box.
    echo '</script>';
  }
  if ($split_url[1] == 2) {
    echo '<script type="text/javascript">';
    echo ' alert("Thank you for being the volunteer")';  //not showing an alert box.
    echo '</script>';
  }
  ?>
  <script>
    function validate() {
      var radioValidate = document.getElementById("gender");
      if (radioValidate.checked == false) {
        alert("please choose gender");

      } else {

      }
    }
  </script>
</head>

<body>
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <br />
          <br />
          <br />
          <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
            <div class="container-fluid px-0">
              <form action="volunteer_register.php" method="post" class="bg-light p-5 contact-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="PassWord" id="password" name="password" required>
                </div>
                <div class="form-group">
                  <label class="form-radio-label" style="margin-left:-73%">Select your Date of birth</label>
                  <input type="date" class="form-control" placeholder="Date of Birth" id="dob" name="dob" required>
                </div>
                <div class="form-group" style="margin-left:-45%">
                  <label class="form-radio-label">Select your gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" id="gender" name="gender" value="male">Male
                  <input type="radio" id="gender" name="gender" value="female">Female
                  <input type="radio" id="gender" name="gender" value="others">Others
                </div>




                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Contact No." id="contact_no" name="contact_no" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Alternate Contact No." id="alternate_contact" name="alternate_contact" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                </div>

                <div class="form-group">
                  <select class="form-control" id="registered_with_ngo" name="registered_with_ngo" required>
                    <option selected class="bg-light p-5 contact-form">
                      <p>Please choose the NGO you want to register</p>
                    </option>
                    <?php
                    $query = mysqli_query($conn, "select * from ngo where flag='1'") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $row['ngoId']; ?>"><?php echo $row['ngo_name']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">

                  <select class="form-control" id="pickup_location" name="pickup_location" required>
                    <option selected class="bg-light p-5 contact-form">
                      <p>Please choose your pickup location</p>
                    </option>
                    <option value="no_pickup">I don't want to take pickups</option>
                    <?php
                    $query2 = mysqli_query($conn, "select * from pickup_list") or die(mysqli_error($conn));
                    while ($row2 = mysqli_fetch_array($query2)) {
                    ?>
                      <option><?php echo $row2['location']; ?></option>
                    <?php
                    }
                    ?>
                  </select>


                </div>
                <div class="form-group">
                  <input type="submit" value="Register" name="submit" class="btn btn-primary py-3 px-5" onclick="validate()">
                </div>
              </form>

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

</body>





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