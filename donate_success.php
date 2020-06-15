<?php
session_start();
include 'connection.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['contact_no'])) {
    $contact_no = $_POST['contact_no'];
}
if (isset($_POST['alternate_contact'])) {
    $alternate_contact = $_POST['alternate_contact'];
}
if (isset($_POST['item'])) {
    $item = $_POST['item'];
}
if (isset($_POST['pickup_location'])) {
    $pickup_location = $_POST['pickup_location'];
}
if (isset($_POST['pickup_address'])) {
    $pickup_address = $_POST['pickup_address'];
}
if (isset($_POST['date_of_pickup'])) {
    $date_of_pickup = $_POST['date_of_pickup'];
    echo $date_of_pickup;
}
if (isset($_POST['time_of_pickup'])) {
    $time_of_pickup = $_POST['time_of_pickup'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['suitable_for'])) {
    $suitable_for = $_POST['suitable_for'];
} else {
    $suitable_for = null;
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}
if (isset($_POST['type_of_cloth'])) {
    $type_of_cloth = $_POST['type_of_cloth'];
} else {
    $type_of_cloth = null;
}
if (isset($_POST['for_class'])) {
    $for_class = $_POST['for_class'];
} else {
    $for_class = null;
}
if (isset($_POST['company_name'])) {
    $company_name = $_POST['company_name'];
} else {
    $company_name = null;
}

try {

    $query_donation = "insert into donation(doner_name,email,contact_no,alternate_contact,pickup_location,pickup_address,date_of_pickup,time_of_pickup,description,item,quantity,type_of_cloth,suitable_for,for_class,company_name) 
values('$name','$email','$contact_no','$alternate_contact','$pickup_location','$pickup_address','$date_of_pickup','$time_of_pickup','$description','$item','$quantity','$type_of_cloth','$suitable_for','$for_class','$company_name')";
    if (mysqli_query($conn, $query_donation)) {
        $donation_id = mysqli_insert_id($conn);
    }
    $count = count($_POST["ngo_name"]);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            if (trim($_POST["ngo_name"][$i] != '') && trim($_POST["quantity_per_ngo"][$i] != '')) {
                $ngo_name = $_POST["ngo_name"][$i];
                echo $ngo_name;
                $quantity = $_POST["quantity_per_ngo"][$i];
                echo $quantity;
                $item = $_POST['item'];

               //$get_Volunteer_email = "select email from volunteer INNER JOIN donation_quantity ON volunteer.registered_with_ngo=donation_quantity.ngo_Id where donation_Id='$donation_id' and pickup_location='$pickup_location'";
                $query = "insert into donation_quantity(ngo_Id,quantity,item,donation_Id) values('$ngo_name','$quantity','$item','$donation_id')";
                mysqli_query($conn, $query);
            }
        }
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


if (mysqli_query($conn, $query_donation)) {
    try {

        $get_doner_email = "select * from donation where donationId='$donation_id'" or die(mysqli_error($conn));
        $get_Volunteer_email = "select * from volunteer INNER JOIN donation_quantity ON volunteer.registered_with_ngo=donation_quantity.ngo_Id where donation_Id='$donation_id' and volunteer.flag='1'";
        $doner_email_result = mysqli_query($conn, $get_doner_email);
        $volunteer_email_result = mysqli_query($conn, $get_Volunteer_email);
        $row = mysqli_fetch_array($doner_email_result);
        //$row_volunteer=mysqli_fetch_array($volunteer_email_result);
        $doner_email = $row['email'];
        $doner_pickup_location = $row['pickup_location'];
        $doner_name = $row['doner_name'];
        include 'mail.php';


        while ($row_volunteer = mysqli_fetch_array($volunteer_email_result, MYSQLI_ASSOC)) {
            echo ($row_volunteer['email']);
            $mail->addAddress($row_volunteer['email']);
            $mail->Subject = 'New pickup';
            $mail->Body    = 'Dear volunteer, there is a pickup from location ' . $row['pickup_location'] . ' On date ' . $row['date_of_pickup'] . ' and time ' . $row['time_of_pickup'] . '.Please contact the doner Mr.'
                . $row['doner_name'] . 'on his contact ' . $row['contact_no'] . 'Pickup address: ' . $row['pickup_address'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

$_SESSION['donation']="true";
header("location: donate_success_message.php");
