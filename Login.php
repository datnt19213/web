<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div id="wrapper">
        <?php
            if(isset($_POST['btnLog']))
            {
                $us = $_POST['txtUsername'];
                $pa = $_POST['txtPass'];

                $err = "";
                if($us == ""){
                    $err .= "Enter Username, please <br/>";
                }
                if($pa == ""){
                    $err .= "Enter Password, please <br/>";
                }
                if($err != ""){
                    echo $err;
                }
                else{
                    include_once("connect.php");
                    $pass = md5($pa);
                    $res = pg_query($conn, "SELECT userid, pass,status FROM customer WHERE userid='$us' AND pass='$pass'")
                    or die (pg_error($conn));
                    $row = pg_fetch_array($res,NULL ,PGSQL_ASSOC);
                    if (pg_num_rows($res)==1){
                        $_SESSION["us"]= $us;
                        $_SESSION["admin"] = $row["state"];
                        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
                    }
                    else{
                        echo "you loged in fail";
                    }
                }
            }
        ?>
        <form action="" autocomplete="off" method="POST">
            <div id="header-login">
                <h1>Login</h1>
            </div>
            <div id="username">
                <div id="label">
                    <label>User ID:</label><br/>
                </div>
                <input type="text" name="txtUsername" id="usernameInput" placeholder="Enter User ID">
            </div>
            <div id="password">
                <div id="label">
                    <label>Password:</label><br/>
                </div>
                <input type="password" name="txtPass" id="passwordInput" placeholder="Enter password">
            </div>
            <div id="btnLogin">
                    <input type="submit" name="btnLog" value="Login" id="btnLog">
            </div>
            <div id="more">
                <p>You have not the account? <a href="?page=register" id="new-account">Create one?</a></p>
            </div>
        </form>
    </div>
</body>
</html>
