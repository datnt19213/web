<?php
    $conn = pg_connect("postgres://xwvuuaheggvwsz:dd95a6c76f8fdbe8d2915f1439925cd11b0453de08a8b9328391e4bb68297d83@ec2-34-225-66-116.compute-1.amazonaws.com:5432/d9b4bma62hmc2s");
    if(!$conn){
        die .$conn;
    }
?>
