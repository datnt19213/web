<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="Products.css">
    <link rel="stylesheet" href="Administrator.css">
</head>

<script language="javascript">
    function deleteConfirm() {
        if(confirm("Are you sure to delete this product?")){
            return true;
        }
        else{
            return false;
        }
    }
</script>
<?php
    include_once("connect.php");
    if(isset($_GET["function"])=="del"){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            pg_query($conn, "DELETE FROM public.product where proid='$id'");
        }
    }
    ?>
<body>
    <div id="wrapper">
        <form action="" id="data-aud" method="GET">
            <p id="txt-PaU">Products and Delete</p><br>
            <div id="table">
                <table id="tb-data">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Type</th>
                        <th>ShopID</th>
                        <th>PublisherID</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $sqll = pg_query($conn, "SELECT * FROM public.product") or die .$conn;
                        if(pg_num_rows($sqll)>0){
                            while($result = pg_fetch_assoc($sqll)){
                    ?>
                    <tr id="boxdata">
                        <td id="boxdata"><?php echo $result['proid']; ?></td>
                        <td id="boxdata"><?php echo $result['proname']; ?></td>
                        <td id="boxdata"><?php echo $result['cateid']; ?></td>
                        <td id="boxdata"><?php echo $result['shopid']; ?></td>
                        <td id="boxdata"><?php echo $result['pubid']; ?></td>
                        <td id="boxdata"><img src="images/<?php echo $result['img']; ?>" alt="Error image"></td>
                        <td id="boxdata"><?php echo $result['price']; ?></td>
                        <td id="boxdata"><?php echo $result['quantity']; ?></td>
                        <td id="boxdata">
                            <a href="?page=del&&function=del&&id=<?php echo $result["proid"]; ?>" id="btn-edit" onclick="return deleteConfirm()">
                                <input type="button" name="btndelete" value="Delete" id="edit-func">
                            </a>
                        </td>
                    </tr>
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
                </table>
            </div>
        </form>
    </div>
</body>
</html>
