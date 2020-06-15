<html>
<title>Pather Disha</title>

<head>
  <?php include 'header.php'; ?>
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
          <!-- <section class="ftco-section ftco-no-pt ftco-no-pb contact-section"> -->
          <!-- <div class="container-fluid px-0"> -->
          <form class="bg-light p-5 contact-form">


            <!-- <div class="form-group"> -->
            <button type="button" class="btn btn-primary py-3 px-5" value="Old Cloths" onclick="dosomething(this)">Old Cloths</button>
            <button type="button" class="btn btn-primary py-3 px-5" value="Used Computer" onclick="dosomething(this)">Used Computer</button>
            <button type="button" class="btn btn-primary py-3 px-5" value="Used books" onclick="dosomething(this)">Used Books</button><br>
            <br />
            <button type="button" class="btn btn-primary py-3 px-5" value="Used text books" onclick="dosomething(this)">Used text books</button>
            <button type="button" class="btn btn-primary py-3 px-5" value="New and old toys" onclick="dosomething(this)">New and old toys</button>
            <button type="button" class="btn btn-primary py-3 px-5" value="Sanitary pad and napkins" onclick="dosomething(this)">Sanitary pad and napkins</button>

            <!-- </div> -->
          </form>

          <!-- </div> -->

          <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
      <!-- </section> -->
    </div>
    </div>
    </div>
  </section>

</body>

<script>
  function dosomething(element) {
    var value1 = element.value;
    var queryString = "?para1=" + value1;
    window.location.href = "donate.php" + queryString;
  }
</script>





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