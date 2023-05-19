<?php

error_reporting(-1);
?>

<style>
    form {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
        max-width: 500px;
        margin: 0 auto;
    }
    input {
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>

<form action="index.php" method="POST">
<h2>Register</h2>

    User Name: <input name="name" value="" id="" class="" placeholder="enter the name"><br>
    Mobile Number: <input name="phone" value="" id="" class="" placeholder="Enter Ooredoo Numbers Only"><br>
    E-mail: <input name="email" value="" id="" class="" placeholder="xyz@ooredoo.om"><br>
    Password: <input name="password" value="" id="" class="" placeholder="enter the password"><br>
    Confirm Password: <input name="cpassword" value="" id="" class="" placeholder="enter the Confirm Password"><br>
    Department: 
    <select name="department">
        <option value="select">---Select---</option>
        <option value="agilepostpaid">Agile Postpaid</option>
        <option value="agilefixedline">Agile FixedLine</option>
        <option value="waterfll">Waterfll</option>
        <option value="l3">L3</option>
        <option value="demand">Demand</option>
        <option value="trainee">Trainee</option>
        <option value="itdnd">ITDnD</option>
        <option value="itgqr">ITGQR</option>

    </select><br>

    <input type="submit" name="submit" value="Create User"> <a href="login.php">Back To Login Page</a> 
</form>





<?php

include_once 'db_config.php';

function closeCon($conn)
{
    $conn->close();
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
    $department = $_POST['department'];

    $errMsg = '';

    if (empty($name)) {
        $errMsg = "Error! You didn't enter the Name.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errMsg = "Only alphabets and whitespace are allowed in the Name field.";


    } elseif (empty($phone)) {
        $errMsg = "Error! You didn't enter the phone.";
    } elseif (!preg_match("/^\d{8}$/", $phone)) {
        $errMsg = "Error! phone must have 8 digits.";


    } elseif (empty($email)) {
        $errMsg = "Error! You didn't enter the Email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = "Error! You entered an invalid Email address.";


    } elseif (empty($department)) {
        $errMsg = "Error! You didn't choose the Department.";


    } elseif (empty($password)) {
        $errMsg = "Error! You didn't enter the Password.";
    } elseif ($password !== $cpassword) {
        $errMsg = "Password and confirm password should match.";
    } elseif (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[A-Z]+#", $password) || !preg_match("#[a-z]+#", $password) || !preg_match("#[^\w]+#", $password)) {
        $errMsg = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';



        //password('".$password."')
        //'".$cpassword."'

    } else {
        $sql = "SELECT phone FROM register WHERE phone = '".$phone."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $errMsg = "Phone number already exists in the database.";


        } else {
            $sql = "INSERT INTO register (name, phone, email, password, cpassword, department) VALUES ('".$name."', '".$phone."', '".$email."', password('".$password."'),  password('".$cpassword."'), '".$department."')";
            $query = $conn->query($sql);
            if ($query) {
                echo "Inserted Successfully";
            } else {
                $errMsg = "Something went wrong please try again";
            }
        }
    }

    if (!empty($errMsg)) {
        echo $errMsg;
    }
}

?>


