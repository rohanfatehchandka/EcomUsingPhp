<!DOCTYPE html>
<html lang="en">
<head>

<style>
    .cart-text
    {
        top:-10px;
        right:-10px;
        background-color:red;
        width:25px;
        height:25px;
        border-radius:50%;
    }
    
    .user
    {
        font color: white ;
        font font-family: "times new roman" ;

    }
</style>

</head>
<body>
    
</body>
</html>

<?php

session_start();
if( ! isset($_SESSION['login_status']))
{
    echo "<h3> Login First";
    die;
}

$login_status=$_SESSION['login_status'];

if($login_status=="failed")
{
    echo "<h3> Unauthorised Atempt to Login";
    die;
}
$username=$_SESSION['username'];
$localcart=$_SESSION['cart'];
$cart_count=count($localcart);

echo "<div class='d-flex justify-content-between py-3 bg-primary'> 

    <div class='user'>Hi $username  </div>

    <a href='viewcart.php'>
    <button class='btn btn-success position-relative'> 
        <i class='fa fa-shopping-cart'> </i>   
        <span class='cart-text position-absolute'>$cart_count</span> 
    </button>
    </a>

    <div> 
        <button class='btn btn-danger'>
            <a href='logout.php' class='bg-danger text-white'>
                 <i class='fa fa-sign-out'> </i>  
            </a>    
        </button>
    </div>

</div>"

?>