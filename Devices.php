<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devices</title>
    <link rel="stylesheet" href="Products.css">
</head>
<body>
            <form class="d-flex" id="size">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        <div id="content">
            <div id="pro-form">
                    <div class="row" id="row">
                        <div class="col-sm-5 col-md-6">  
                        <?php
                            include_once("connection.php");
                            $sql = pg_query($conn, "SELECT * FROM public.product WHERE CategoryID = 1") or die .$conn;
                            if(pg_num_rows($sql)>0){
                                while($result = pg_fetch_assoc($sql)){
                        ?>
                            <form action="" id="form-text" method="POST">
                                <img src="images/<?php echo $result['ProImage'] ?>" alt="Error Picture">
                                <p>
                                    <ul>
                                        <li>ID:&nbsp;<?php echo $result['proId'] ?></li>
                                        <li>Name:&nbsp;<?php echo $result['proName'] ?></li>
                                        <li>Type:&nbsp;<?php echo $result['cateId'] ?></li>
                                        <li>Type:&nbsp;<?php echo $result['cateId'] ?></li>
                                        <li>Price:&nbsp;<?php echo $result['price'] ?></li>
                                        <li>Quantity:&nbsp;<?php echo $result['quantity'] ?></li>
                                    </ul>
                                </p>
                                <a href="">
                                    <button type="submit" id="cart-btn" onclick="a()"><script>function a(){alert('You just add the product to cart');}</script>Add to Cart</button>
                                </a>
                            </form>
                        <?php
                                }
                            }
                            else{
                                function alert(){
                                    alert("No result");
                                }
                                alert();
                            }
                        ?>
                        </div>
                    </div>
            </div>
        </div>
</body>
</html>