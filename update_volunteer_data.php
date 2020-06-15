<?php

$email = $_POST['email'];
$contact = $_POST['contact'];
$address= $_POST['address'];

function update_volunteer_data($email, $contact,$address)
{
    include 'connection.php';
 
        $query = mysqli_query($conn, "update volunteer set contact_no='$contact', address='$address' where email='$email'") or die(mysqli_error($conn));
        if ($query) {
            header("location: volunteer_data.php");
    }
}


update_volunteer_data($email, $contact,$address);
