<?php
session_start();
    include_once("connect.php");
    $minId = pg_query($conn, "select min(proId) from public.product");
    $maxId = pg_query($conn, "select max(proId) from punlic.product");
    if(!$minId || !$maxId){
        echo "error" .$minId .$maxId;
    }
    $ramId = rand($minId, $maxId);
    $_SESSION[$Id] = $ramId;
?>