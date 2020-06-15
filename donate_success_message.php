<html>

<body onload="move()">



</body>

</html>
<?php
session_start();
if (empty($_SESSION['donation'])) :
    header("location: index.php");
endif;
session_destroy();
echo '<meta http-equiv="refresh" content="2;url=index.php">';
echo '<span class="itext">Successfully Donated ...............please wait wile we transfer you to the Home page</span>';
echo'<br>';
echo '<div class="w3-light-grey">
<div id="logOut" class="w3-container w3-blue" style="height:24px;width:20%"></div>
</div>';

echo'<br>';
echo '<div class="card text-center">
<div class="card-header">
  Hello there
</div>
<div class="card-body">
  <h5 class="card-title">Thank you for the Donation.</h5>
  <p class="card-text">You have successfully donated the items ,Our volunteer will contact you soon  </p>
</div>
<div class="card-footer text-muted">
Have a nice day
</div>
</div>';

?>
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

</html>
<script>
    function move() {
        var elem = document.getElementById("logOut");
        var width = 20;
        var id = setInterval(frame, 30);

        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                document.getElementById("demo").innerHTML = width * 1 + '%';
            }
        }
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