<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main_Page</title>
    <link rel="stylesheet" href="Style.css"/>
	<link rel="stylesheet" href="Products.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
</head>

<body>
<?php
    session_start();
    include_once("connect.php");
?>

    <div id="wrapper">
        <div id="header">
            <div id="header-infor">
                <p>
                    <pre class="account-show">
                        <a href="?page=login"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                        </svg></a>&nbsp;&nbsp;&nbsp;<b id="account">Welcome - <?php echo $_SESSION['us']?></b>
                    </pre>
                </p>
                <a href="index.php" id="header-Namepage"><h1 id="header-Namepage" style="text-align: center; ">ATN Toys Shop</h1></a>
            </div>
        </div>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2c2c54;" id="fixed-nav">
                <div class="container-fluid">
                  <button id="btnhover" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="hover">
                                <a class="nav-link active" aria-current="page" id="hover" href="index.php">Home</a>
                            </li>
                            <li class="nav-item" id="hover">
                                <a class="nav-link active" aria-current="page" id="hover" href="?page=information">Information</a>
                            </li>
                            <li class="nav-item dropdown" id="hover">
                                <a class="nav-link dropdown-toggle active" id="hover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Products
                                </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #40407a;">
                                        <li id="hover"><a class="dropdown-item" id="hover" href="index.php">Devices</a></li>
                                        <li id="hover"><a class="dropdown-item" id="hover" href="index.php">Accessories</a></li>
                                    </ul>
                            </li>
                            <li class="nav-item" id="hover">
                                <a class="nav-link active" aria-current="page" id="hover" href="?page=support">Support</a>
                            </li>
			
			<?php
			if (isset($_SESSION['us']) && $_SESSION['us'] != "" || isset($_SESSION['admin']) && $_SESSION['admin'] != ""){	
			?>
			    <li class="nav-item" id="hover" id="adclick">
				   <a class="nav-link active" aria-current="page" id="hover" href="?page=administrator">Management</a>
			    </li>
			    <li class="nav-item" id="mlogbtn">
                                <a class="nav-link active" aria-current="page"  href="?page=logout">
                                    <div >
                                        <input type="button" value="Logout" id="Main-btnLog">
                                    </div>    
                                </a>
                            </li>
			<?php
				}
				else{
			?>
			    <li class="nav-item" id="mlogbtn">
                                <a class="nav-link active" aria-current="page"  href="?page=login">
                                    <div >
                                        <input type="button" value="Login" id="Main-btnLog">
                                    </div>    
                                </a>
                            </li>
			<?php 
				}
			?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page=="login"){
                        include_once("Login.php");
                        
                    }
                    if($page=="information"){
                        include_once("Information.php");
                    }
                    if($page=="devices"){
                        include_once("Devices.php");
                    }
                    if($page=="accessories"){
                        include_once("Accessories.php");
                    }
                    if($page=="support"){
                        include_once("Support.php");
                    }
		    if($page=="administrator"){
		    	include_once("Administrator.php");
		    }
		    if($page=="add"){
		    	include_once("Add.php");
		    }
		    if($page=="update"){
		    	include_once("Update.php");
		    }
		    if($page=="del"){
		    	include_once("Delete.php");
		    }
		    if($page=="logout"){
		    	include_once("logout.php");
		    }
		    if($page=="register"){
		    	include_once("Register.php");
		    }
                }
                else {
                    include_once("Main_Page2.php");
                }
	    ?>
        <div id="footer">
            <footer>
                <h3>About us</h3>
                <table>
                    <td id="footer-infor">
                        <ul id="contact-infor">
                            <li><a href="#">Email:atntoysshop@gmail.com</a></li>
                            <li><a href="#">Facebook:atnshop</a></li>
                            <li><a href="">Phone: 0123456789</a></li>
                        </ul>
                    </td>
                    </table>
                    <td>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; color: white; font-weight: bold;">Support by:</p>
<!--                         <img src="images/University_of_Greenwich_logo.png" id="footerimg"/> -->
			    <b style="text-align: center; color: #efefef">The Company has support by brand center of Toys shop ATN</b>
                    </td>
                <div>
                    <b>ATN Toys Shop&copy;</b>
                </div>
            </footer>
        </div>
    </div>
    
</body>

</html>
