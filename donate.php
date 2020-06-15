<html>
<title>Pather Disha</title>

<head>
  <?php include 'header.php';
  include 'connection.php';
  ?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<?php
$uri = $_SERVER['REQUEST_URI'];
$split_url = explode("=", $uri);
$item_selected = str_replace("%20", " ", $split_url[1]);
?>

<script type="text/javascript">
  function showfield(name) {
    if (name == 'Old Cloths') document.getElementById('div1').innerHTML = '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of food" name="quantity"/></div>' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="Date when food cooked" name="date_of_food_cooked"/></div>';
    else if (name == 'cloths') document.getElementById('div1').innerHTML = '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of cloths" name="quantity"/></div>' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="for" name="size" /></div>';
    else if (name == 'books') document.getElementById('div1').innerHTML = '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of books" name="quantity"/></div>' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="for class" name="for_class"/></div>';
    else document.getElementById('div1').innerHTML = '';
  }
</script>

<body>
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <br />
          <br />
          <br />
          <h2 class="font-weight-bold">Donate Food,cloths,books..</h2>
          <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">

            <div class="container-fluid px-0">

              <form action="donate_success.php" class="bg-light p-5 contact-form" id="donate" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Contact No." id="contact_no" name="contact_no" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Alternate Contact No." id="alternate_contact" name="alternate_contact">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="item" name="item" readonly>
                </div>
                <div class="form-group">



                  <div id="div1" class="form-group">
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="pickup_location" name="pickup_location" required>
                      <option selected class="bg-light p-5 contact-form">
                        <p>Please choose your pickup location</p>
                      </option>
                      <!-- <option value="karunamoyee">Karunamoyee</option>
					<option value="kestopur">Kestopur</option>
					<option value="new_town">New Town</option>
					</select> -->
                      <?php
                      $query2 = mysqli_query($conn, "select * from pickup_list") or die(mysqli_error($conn));
                      while ($row2 = mysqli_fetch_array($query2)) {
                      ?>
                        <option><?php echo $row2['location']; ?></option>
                      <?php
                      }
                      ?>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Complete pickup Address" id="pickup_address" name="pickup_address" required>
                  </div>



                  <table class="table" id="dynamic_field" style="border-style:none;">
                    <tr>
                      <td><select class="form-control" id="ngo_name" name="ngo_name[]">
                          <option selected class="bg-light p-5 contact-form">
                            <p>Which NGO you want to donate</p>
                          </option>
                          <?php
                          $query = mysqli_query($conn, "select * from ngo Inner Join item_needed on ngo.ngoId=item_needed.NgoId where item_needed.item='$item_selected' and ngo.flag='1'") or die(mysqli_error($conn));
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                            <option value="<?php echo $row['ngoId']; ?>"><?php echo $row['ngo_name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </td>
                      <td><input type="text" name="quantity_per_ngo[]" placeholder="quantity" class="form-control name_list" /></td>
                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                  </table>
                </div>

                <label style="margin-right:70%;">Please enter date of pickup</label>
                <div class="form-group">
                  <input type="date" class="form-control" id="date_of_pickup" name="date_of_pickup" required>
                </div>
                <div class="form-group">
                  <label style="margin-right:70%;">Please enter time of pickup</label>
                  <input type="time" class="form-control" id="time_of_pickup" name="time_of_pickup" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="description" name="description" placeholder="description">
                </div>

                <div class="form-group">
                  <input type="submit" value="Donate" class="btn btn-primary py-3 px-5">
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
  </form>
</body>



<script>
  var queryString = decodeURIComponent(window.location.search);
  queryString = queryString.substring(1);
  var queries = queryString.split("&");
  for (var i = 0; i < queries.length; i++) {
    // document.write(queries[i] + "<br>");
    //document.write(queries[0] + "<br>");
  }
  var type = queries[0];
  var res = type.split("=");
  var item = res[1];
  document.getElementById("item").value = item;
  if (item == 'Old Cloths') {
    document.getElementById('div1').innerHTML = '<div class="form-group"><label class="form-radio-label">Suitable For</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
      '<input type="radio" id="suitable_for" name="suitable_for" value="men">Men <input type="radio" id="suitable_for" name="suitable_for" value="women">Women' + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of cloths" name="quantity"/><br/>' +
      '<input type="text" class="form-control" placeholder="Types of cloth" name="type_of_cloth"/></div>';
  }
  if (item == 'New and old toys') {
    document.getElementById('div1').innerHTML = '<div class="form-group">' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of toys" name="quantity"/><br/>';
  }

  if (item == 'Sanitary pad and napkins') {
    document.getElementById('div1').innerHTML = '<div class="form-group">' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of Sanitarypads and napkins" name="quantity"/><br/>';
  }

  if (item == 'Used books') {
    document.getElementById('div1').innerHTML = '<div class="form-group">' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of books" name="quantity"/><br/>' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="For class(enter values seperated by comma)" name="for_class"/><br/>';
  }
  if (item == 'Used Computer') {
    document.getElementById('div1').innerHTML = '<div class="form-group">' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of computers" name="quantity"/><br/>' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="Of company (if more than 1 enter value seperated by comma)" name="company_name"/><br/>';
  }

  if (item == 'Used text books') {
    document.getElementById('div1').innerHTML = '<div class="form-group">' +
      '<div class="form-group"><input type="text" class="form-control" placeholder="quantity of textbooks" name="quantity"/><br/>';
  }
</script>

<script>
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><select class="form-control" id="ngo_name" name="ngo_name[]">' +
        '<option selected class="bg-light p-5 contact-form"><p>Which NGO you want to donate</p></option>' +
        '<option value="8">InstantImp</option>' +
        '<option value="7">Pawsam</option>' +
        '<option value="9">Patherdisha</option>' +
        '</select></td><td><input type="text" name="quantity_per_ngo[]" placeholder="Quantity" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    $('#submit').submit(function() {
      $.ajax({
        url: "donate_success.php",
        method: "POST",
        data: $('#donate').serialize(),
        success: function(data) {
          alert(data);
          $('#donate')[0].reset();
        }
      });
    });
  });
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