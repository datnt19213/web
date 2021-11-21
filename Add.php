<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="Style.css"/>
    <link rel="stylesheet" href="Products.css">
    <link rel="stylesheet" href="Administrator.css">
</head>

<body>
    <div id="wrapper">
        
        <div id="content">
            <div id="div-form">
            <?php
                include_once("connect.php");
                if(isset($_POST["btnAdd"]))
                {
                    $id = $_POST["txtid"];
                    $name = $_POST["txtname"];
                    $shopid = $_POST["txtshop"];
                    $img = $_FILES['txtimage'];
                    $cateid = $_POST['txtcategory'];
                    $pubid = $_POST['txtpublisher'];
                    $price = $_POST['txtprice'];
                    $qty = $_POST['txtqty'];

                    $err = "";

                    if(trim($name) == ""){
                        $err .= "Enter Product Name, please<br/>";
                    }
                    if($id == ""){
                        $err .= "Enter Product ID, please<br/>";
                    }
                    if($img == ""){
                        $err .= "Enter Product Image, please<br/>";
                    }
                    if($cateid == ""){
                        $err .= "Enter Category ID, please<br/>";
                    }
                    if($shopid == ""){
                        $err .= "Enter Shop ID, please<br/>";
                    }
                    if($pubid == ""){
                        $err .= "Enter Publisher ID, please<br/>";
                    }
                    if($price == ""){
                        $err .= "Enter Product Price, please<br/>";
                    }
                    if($qty == ""){
                        $err .= "Enter Product Quantity, please<br/>";
                    }
                    if($err != ""){
                        echo "$err<br/>";
                    }
                
			else {
				if ($img['type'] == "image/jpg"  || $img['type'] == "image/jpeg" || $img['type'] == "image/png" || $img['type'] == "image/gif") {
					if ($img['size'] <= 6144000) {
						$sq = "SELECT * from public.product where proid='$id'";
						$result = pg_query($conn, $sq);
						if (pg_num_rows($result) == 0) {
							copy($img['tmp_name'], "images/" . $img['name']);
							$_filePic = $img['name'];
							$sqlstring = "INSERT INTO public.product (proid, proname, shopid, pubid, img, cateid, price, quantity) 
							VALUES ('$id','$name','$shopid','$pubid','$_filePic', '$cateid', '$price', '$qty')";
							pg_query($conn, $sqlstring);
							echo '<meta http-equiv="refresh" content="0;URL=?page=administrator"/>';
						} else {
							echo "<li>Duplicate product</li>";
						}
					} else {
						echo "<li>Image is so big</li>";
					}
				} else {
					echo "<li>Image format is not correct</li>";
				}
			}
		}
        ?>
                <form action="" id="add-form" method="post" enctype="multipart/form-data">
                    <p id="h-txt">Add</p><br>
                    <ul id="listInput">
                        <li id="Proname-add">
                            <p>Product ID:</p>
                            <input type="text" name="txtid" id="txtProname-add" placeholder="Product id" maxlength="50"><br><br>
                        </li>
                        <li id="Proname-add">
                            <p>Product Name:</p>
                            <input type="text" name="txtname" id="txtProname-add" placeholder="Product name" maxlength="50"><br><br>
                        </li>
                        <li id="proImage-add">
                            <p>Image:</p>
                            <input type="file" name="txtimage" id="ProImage-add" placeholder="Product image"><br><br>
                        </li>
                        <li id="ProType-add">
                            <p>Category:</p>
                            <input type="text" name="txtcategory" id="numType-add" placeholder="Category id" maxlength="5"><br><br>
                        </li>
                        <li id="ProType-add">
                            <p>Shop:</p>
                            <input type="text" name="txtshop" id="numType-add" placeholder="Shop id" maxlength="5"><br><br>
                        </li>
                        <li id="ProType-add">
                            <p>Publisher:</p>
                            <input type="text" name="txtpublisher" id="numType-add" placeholder="Publisher id" maxlength="5"><br><br>
                        </li>
                        <li id="proPrice-add">
                            <p>Price:</p>
                            <input type="number" name="txtprice" id="Price-add" maxlength="10"><br><br>
                        </li>
                        <li id="ProQty-add">
                            <p>Quantity:</p>
                            <input type="number" name="txtqty" id="proQty-add" maxlength="10"><br><br>
                        </li>
                        <li>
                            <input type="submit" name="btnAdd" value="Add" id="add">
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
