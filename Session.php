<?php
        session_start();
?>
        
<?php
    $_SESSION["UserName"] = $usCheck['Username'];
    $_SESSION["AdminName"] = $adCheck['AdminName'];
?>