<?php
include('db.php');

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $otp = rand(100000, 999999); // 6-digit OTP
    $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    
    mysqli_query($conn, "DELETE FROM user_otp WHERE phone='$phone'"); // remove old OTP
    $sql = "INSERT INTO user_otp (phone, otp, expiry_time) VALUES ('$phone', '$otp', '$expiry')";
    $result = mysqli_query($conn, $sql);

    if($result){
        
        echo "OTP sent: " . $otp;
    } else {
        echo "Failed to generate OTP";
    }
}
?>
