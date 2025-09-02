<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #7ea9d4ff;
    }
.marquee {
  width: 100%;
  overflow: hidden;
  white-space: nowrap;   
  box-sizing: border-box;
}
    .marquee span {
  display: inline-block;
  font-size: 2rem;
  font-weight: 700;
  padding-left: 100%;        
  will-change: transform;
  animation: marquee 10s linear infinite;
}

@keyframes marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}

.marquee span:hover { animation-play-state: paused; }
    
</style>
<body>
    <div class="marquee">
      <span>Login Here</span>
    </div>
    <form class="container mt-5" style="max-width: 500px; background-color: #f8f9fa; padding: 20px; border-radius: 5px;" method="POST" 
          action="../database/login-prc.php">

  <div class="mb-3">
    <label for="Phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number here">
  </div>

   <div class="mb-3">
        <label for="otp" class="form-label">Enter OTP</label>
        <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP here">
      </div>
  
  <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="sendOtp()">Send OTP</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
</form>

<script>
function sendOtp() {
    let phone = document.getElementById("Phone").value;
    if(phone === "") {
        alert("Please enter phone number");
        return;
    }

    
    fetch("../database/send-otp.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "phone=" + phone
    })
    .then(res => res.text())
    .then(data => {
        alert(data); 
    });
}
</script>
</body>
</html>