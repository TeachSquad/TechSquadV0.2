<html>

<body>

    <?php
    session_start();
    $op;
    $name = $_POST["ngo_name"];
    $chairman = $_POST["chairman"];
    $contact_no = $_POST["contact_no"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $establishment_year = $_POST["establishment_year"];


    function ngo_registration($name, $chairman, $contact_no, $address, $email, $pass, $establishment_year)
    {
        include 'connection.php';
        $sql = "insert into ngo (ngo_name,chairman,contact_no,address,email,password,establishment_year)
                values('$name','$chairman','$contact_no','$address','$email',$pass,$establishment_year)";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['ngoReg']="true";
            header("location: message.php");
            $op=true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $op=false;
        }
        return $op;
    }
    try {
    ngo_registration($name, $chairman, $contact_no, $address, $email, $password, $establishment_year);
    }
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
    
    ?>
</body>

</html>