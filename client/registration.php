<?php

include_once '../shared/connection.php';

$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

if($password1!=$password2)
{
    echo "<h3>Mismatched Password</h3>";
    die;
}


 $cmd="select * from users where username='$username'";

 echo "<br> cmd=$cmd";

 $sql_obj=mysqli_query($conn,$cmd);

 $row_count=mysqli_num_rows($sql_obj);

 if($row_count>0)
 {
     echo "<h3>$username already exists<br> Try another username</h3>     <br>
     <a href='registration.html'>Register Again<a>";
     die;
 }
$cmd="insert into users(username,mobile,password) values('$username','$mobile','$password1')";
echo "<br> cmd=$cmd";


$sql_result=mysqli_query($conn,$cmd);
if($sql_result)
{
    header('location:login.html');
}
else
{
    echo "<h3>$username already exists<br> Try another username</h3>
    <br>
    <a href='registration.html'>Register Again<a>";
    die;
}








?>