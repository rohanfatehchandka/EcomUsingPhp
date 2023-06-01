
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card-head
        {
            width:300px;
            
            
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
            width:inherit;
            height:200px;
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
    </style>
</head>
<body>
    
</body>
</html>


<?php

include '../shared/boot.html';

include_once '../shared/connection.php';

$sql_obj=mysqli_query($conn,"select * from products");

$total_rows=mysqli_num_rows($sql_obj);

echo "<div class='d-flex flex-wrap justify-content-start'>";

for($i=0;$i<$total_rows;$i++)
{
    $row=mysqli_fetch_assoc($sql_obj);

    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];

    echo "    
            <div class='m-4 card card-head' >
                 <img class='card-img-top card-img' src='$impath' >
                <div class='card-body'>
                    <h4 class='m-0 card-title'>$name</h4>
                    <p class='m-0 card-price text-danger'> 
                        <span class='rupee'>Rs.</span> $price</p>
                    <p class='m-0 card-text'>$details</p>
                    <a href='deletepdt.php?pid=$pid' class='btn btn-danger'>
                        <i class='fa fa-trash'> </i>
                    </a>
                </div>
            </div>
    ";
    
}

echo "</div>";




?>