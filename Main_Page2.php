<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main_Page</title>
</head>

<body>
<?php
    include_once("connect.php");
    $result = pg_query($conn, "SELECT proid, proname, shopid, img, cateid, price, quantity FROM public.product");
?>
    <div id="content-wrapper">
        <form action="index.php" id="formShowNewProduct">
            <div class="row" id="row">
                <div class="col-sm-5 col-md-6">
                    <form action="" id="form-text" style="border: 1px solid gray; background-color: #efefef">
                    <?php
                        if(pg_num_rows($result)>0){
                        $row = pg_fetch_array($result, NULL ,PGSQL_ASSOC);
                    ?>
                        <img width="200px" height="150px" src="images/<?php echo $row['img']; ?>" alt="Error Picture">
                        <p>
                            <ul>
                                <li>ID:&nbsp;<?php echo $row['proid']; ?></li>
                                <li>Name:&nbsp;<?php echo $row['proname']; ?></li>
                                <li>Type:&nbsp;<?php echo $row['cateid']; ?></li>
                                <li>Shop:&nbsp;<?php echo $row['shopid']; ?></li>
                                <li>Price:&nbsp;<?php echo $row['price']; ?></li>
                                <li>Quantity:&nbsp;<?php echo $row['quantity']; ?></li>
                            <?php
                                }
                                else{
                                    echo ("Error: ".$conn);
                                }
                            ?>
                            </ul>
                        </p>
                        <a href="">
                            <button type="submit" id="cart-btn" onclick="a()">Add to Cart</button>
                        </a>
                    </form>
                </div>
            </div>
        </form>
    </div>
</body>
      <script>
          function a(){
            alert('You just add the product to cart');
          }
      </script>
</html>
