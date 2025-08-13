<?php 
include('../database/db.php');
$sql="SELECT * FROM images ORDER BY id DESC";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Image</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100 justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center">
            <h4>Upload Image</h4>
          </div>
          <div class="card-body bg-white">
            <?php if($num>0):?>
              <?php while($row=mysqli_fetch_assoc($result)):?>
            <form action="../database/upload-prc.php" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="category" class="form-label">Category</label>
                <input class="form-control" type="text" name="category" id="category" required>
              </div>
              <div class="mb-4">
                <label for="image" class="form-label">Choose an image</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
              </div>
              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
              </div>
            </form>
            <?php endwhile;?>
            <?php endif;?>
          </div>
          <div class="card-footer text-center">
            <a href="index.php" class="btn btn-link">Back to Gallery</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
