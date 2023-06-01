<?php

$conn=new mysqli('localhost','root','password','acme_may');

if($conn->connect_error)
{
    echo "Connection Failed";
    die;
}


?>