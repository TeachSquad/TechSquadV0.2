<html>

<body>

    <?php


    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $contact_no = $_POST["contact_no"];
    $alternate_contact = $_POST["alternate_contact"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $registered_with_ngo = $_POST["registered_with_ngo"];
    $pickup_location = $_POST["pickup_location"];


    function volunteer_register($name, $dob, $gender, $contact_no, $alternate_contact, $address, $registered_with_ngo, $pickup_location, $email, $password)
    {
        include 'connection.php';

        $query = "select * from volunteer where pickup_location='$pickup_location' and registered_with_ngo='$registered_with_ngo'";
        $query_vol = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_vol);
        if ($row['ID'] != null) {
            header("location: volunteer.php?p=1");
        } else {
            $sql = "insert into volunteer (name,dob,gender,contact_no,alternate_contact,address,registered_with_ngo,pickup_location,email,password)
values('$name','$dob','$gender','$contact_no','$alternate_contact','$address','$registered_with_ngo','$pickup_location','$email',$password)";
            if (mysqli_query($conn, $sql)) {
                header("location: volunteer.php?p=2");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    volunteer_register($name, $dob, $gender, $contact_no, $alternate_contact, $address, $registered_with_ngo, $pickup_location, $email, $password);
    ?>
</body>

</html>