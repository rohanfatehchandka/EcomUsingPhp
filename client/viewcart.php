<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card-head
        {
            width:200px;
            
            
            box-shadow: -8px 6px 16px 0px rgba(46,48,46,1);
        }
        .card-head:hover
        {
            /* transform:rotate(360deg); */
            box-shadow: -8px 6px 16px 0px rgba(89,78,146,1);
            transition:0.1s all;
        }
        .card-img
        {
            width:100px !important;
            height:100px;
        }
        .card-price
        {
            font-size:22px;
            font-weight:900;
        }
        .rupee
        {
            font-size:18px;
            color:grey;
        }
        .price-input
        {
            border:none;
            font-size:36px;
            background-color:transparent;
        }
    </style>
</head>
<body>
    
</body>
</html>



<?php

include '../shared/boot.html';
include '../shared/connection.php';

session_start();
$localcart=$_SESSION['cart'];

$pid_str=implode(",",$localcart);

$cmd="select * from products where pid in ($pid_str)";

$sql_obj=mysqli_query($conn,$cmd);

$total_rows=mysqli_num_rows($sql_obj);



echo "<div class='d-flex '>";


echo "<div class='w-75'>";

$total=0;
for($i=0;$i<$total_rows;$i++)
{
    $row=mysqli_fetch_assoc($sql_obj);

    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];
    $total+=$price;

    echo "    
            <div class='d-flex'>
                 <img class='card-img-top card-img' src='$impath' >
                <div class='card-body'>
                    <h4 class='m-0 card-title'>$name</h4>
                    <p class='m-0 card-price text-danger'> 
                        <span class='rupee'>Rs.</span> $price</p>
                    <p class='m-0 card-text'>$details</p>
                    
                </div>
            </div>
    ";
    
}

echo "</div>";


echo "<div class='w-25 bg-success'>

        <form method='post' action='placeorder.php'>

            <h2>Total price in Rs</h2>
            <input name='total' class='price-input' readonly value='$total'>
            <textarea name='address' class='mt-3 form-control' placeholder='Delivery address'></textarea>
            <input class='mt-3 btn btn-primary' type='submit' value='Place Order'>

        </form>
    </div>";

echo "</div>";





?>