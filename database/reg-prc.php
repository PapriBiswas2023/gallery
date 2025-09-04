<?php 
include('db.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
     $username= $_POST['name'];
     $phone= $_POST['phone'];

    $sql="INSERT INTO `user`(name,phone)VALUES('$username','$phone')";
    
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($result)
    {
        header("Location: ../home/registration.php");
        exit;
        //echo "success";
    }else{
        echo "Error" .mysqli_error($conn);
        //echo "error";
    }
}
?>