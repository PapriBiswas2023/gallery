<?php
include('db.php');
$sql="SELECT * FROM user WHERE phone='".$_POST['phone']."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==0){
    echo "Your phone number not registered. Please register first.";
    exit;
}else{
    if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $otp = rand(100000, 999999); 
    $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    
    mysqli_query($conn, "DELETE FROM user_otp WHERE phone='$phone'"); 
    $sql = "INSERT INTO user_otp (phone, otp, expiry_time) VALUES ('$phone', '$otp', '$expiry')";
    $result = mysqli_query($conn, $sql);

    if($result){
        
        echo "OTP sent: " . $otp;
    } else {
        echo "Failed to generate OTP";
    }
}
}

?>
