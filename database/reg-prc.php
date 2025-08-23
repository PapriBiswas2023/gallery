<?php 
include('db.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
    echo $username= $_POST['name'];
    echo $phone= $_POST['phone'];

    echo $sql="INSERT INTO `user`(name,phone)VALUES('$username','$phone')";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($result)
    {
        header("Location: ../home/registration.php");
        echo "success";
    }else{
        echo "error";
    }
}
?>