<?php
session_start();
include('db.php');

if(isset($_POST['phone']) && isset($_POST['otp'])){
    $phone = $_POST['phone'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM user_otp WHERE phone='$phone' AND otp='$otp' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if(strtotime($row['expiry_time']) > time()){
            
            $_SESSION['phone'] = $phone;
            mysqli_query($conn, "DELETE FROM user_otp WHERE phone='$phone'");

            header("Location: ../home/index.php");
            exit();
        } else {
            echo "OTP expired. Please request again.";
        }
    } else {
        echo "Invalid OTP. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
