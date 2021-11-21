<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <div id="wrapper">

        <?php
            if(isset($_POST['btnReg'])){
                $id = $_POST['txtid'];
                $gender = $_POST['txtgender'];
                $phone = $_POST['txtphone'];
                $address = $_POST['txtaddress'];
                $pass1 = $_POST['txtPassword'];
                $pass2 = $_POST['txtConfirmPassword'];
                $name = $_POST['txtFullname'];
                $email = $_POST['txtemail'];

                $err = "";

                if($id == "" || $pass1 == "" || $pass2 == "" || $name == "" || $email == "" || $gender == "" || $phone == "" || $address == ""){
                        $err.= "Enter fields with mark (*), please<br/>";
                }
                if($pass1 != $pass2){
                    $err .= "Password and confirm password are the same<br/>";
                }
                if($err != ""){
                    echo $err;
                }
                else{
                    include_once("connect.php");
                    $pass = md5($pass1);
                    $sq = "SELECT * FROM public.customer WHERE userid='$id' OR email='$email'";
                    $res = pg_query($conn, $sq);
                    
                    if(pg_num_rows($res)==0){
                        pg_query($conn, "INSERT INTO public.customer (userid, username, gender, address, email, phone, pass) 
                        VALUES ('$id', '$name', '$gender', '$address', '$email', '$phone', '$pass')");
                        echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
                    }
                    else{
                        echo "Username or Email already exists<br/>";
                    }
                }
            }
        ?>
        <form action="" method="POST">
            <div id="register-header">
                <h1>Register</h1>
            </div>
            <div id="username">
                <div id="label">
                    <label>User ID:</label><br/>
                </div>
                <input type="text" name="txtid" id="usernameInput" placeholder="Enter user id *">
            </div>
            <div id="username">
                <div id="label">
                    <label>Fullname:</label><br/>
                </div>
                <input type="text" name="txtFullname" id="usernameInput" placeholder="Enter fullname *">
            </div>
            <div id="username">
                <div id="label">
                    <label>Gender:</label><br/>
                </div>
                <input type="text" name="txtgender" id="usernameInput" placeholder="Enter gender *">
            </div>
            <div id="username">
                <div id="label">
                    <label>Address:</label><br/>
                </div>
                <input type="text" name="txtaddress" id="usernameInput" placeholder="Enter address *">
            </div>
            <div id="email">
                <div id="label">
                    <label>Email:</label><br/>
                </div>
                <input type="email" name="txtemail" id="email-txt" placeholder="Enter email *">
            </div>
            <div id="username">
                <div id="label">
                    <label>Phone:</label><br/>
                </div>
                <input type="number" name="txtphone" id="usernameInput" placeholder="Enter phone *">
            </div>
            <div id="password">
                <div id="label">
                    <label>Password:</label><br/>
                </div>
                <input type="password" name="txtPassword" id="passwordInput" placeholder="Enter password *">
            </div>
            <div id="confirmPassword">
                <div id="label">
                    <label>Confirm Password:</label><br/>
                </div>
                <input type="password" name="txtConfirmPassword" id="confirmPasswordInput" placeholder="Enter confirm password *">
            </div>
            <div id="btnRegister">
                <input type="submit" name="btnReg" value="Register" id="btnReg">
            </div>
        </form>
    </div>
</body>
</html>
