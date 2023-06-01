<?php

include_once '../shared/connection.php';

$name=$_POST['name'];
$details=$_POST['details'];
$price=$_POST['price'];

$fileobj=$_FILES['imfile'];

date_default_timezone_set('Asia/Kolkata');

$unique_path='../images/'.date('d_m_y_h_i_s').'.jpg';
move_uploaded_file($fileobj['tmp_name'],$unique_path);


$cmd="insert into products(name,details,price,impath) 
                  values('$name','$details',$price,'$unique_path')";

echo "Cmd=$cmd <br>";
$sql_result=mysqli_query($conn,$cmd);


if($sql_result)
{
    echo "Product Uploaded successfully!";
    header('location:upload_products.html');
}
else
{
    echo "Error in Uploading Products";
}



?>