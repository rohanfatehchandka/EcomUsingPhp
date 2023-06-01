<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .car
        {
            font size:20px;
            font color:red;
        }
    </style>
</head>
<body>
    
</body>
</html>




<?php




    $pid=$_GET['pid'];

    session_start();
    $localcart=$_SESSION['cart'];
    
        if(in_array($pid,$localcart))
        {       
            echo "<div class='car'></div> item already in cart";
        }
        else
        {
            array_push($localcart,$pid);
            $_SESSION['cart']=$localcart;
            header('location:view_products.php');
        }
?>