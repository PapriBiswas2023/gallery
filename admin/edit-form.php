<?php 
include('../database/db.php');
if (isset($_GET['editid'])) {
    $editid = intval($_GET['editid']);
    $sql = "SELECT * FROM images WHERE id = $editid LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
} else {
    echo "Invalid request.";
    exit();
}

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
            <form action="../database/edit-upload-prc.php" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="category" class="form-label">Category</label>
                <input class="form-control" type="text" name="category" id="category" value="<?=$row['category']?>" required>
              </div>
              <div class="mb-4">
                <label class="form-label">Current Image</label><br>
                <img src="<?= htmlspecialchars($row['filename']) ?>" id="filename" name="filename"  alt="Current Image" width="100" height="80" style="object-fit: cover;">
              </div>
              <div class="mb-4">
                <label for="filename" class="form-label">Choose an image</label>
                <input class="form-control" type="file" name="filename" id="filename" accept="image/*"  required>
              </div>
              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
                <input type="hidden" name="editid" id="editid" value="<?= $row['id'] ?>">
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
