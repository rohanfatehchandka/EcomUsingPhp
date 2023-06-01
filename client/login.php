<?php

include_once '../shared/connection.php';

session_start();


$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];


$cmd="select * from users where username='$username' and password='$password'";

echo "cmd=$cmd";

$sql_obj=mysqli_query($conn,$cmd);

$row_count=mysqli_num_rows($sql_obj);

if($row_count==0)
{
    $_SESSION['login_status']='failed';

    echo "<h3>Invalid credentials</h3>
    <br>
    <a href='login.html'>Try Again</a>";
    die;
}

echo "<h1>Login Success </h1>";

$_SESSION['login_status']='success';
$_SESSION['username']=$username;
$_SESSION['mobile']=$mobile;
$_SESSION['cart']=array();

header('location:view_products.php');

?>