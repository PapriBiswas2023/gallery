<?php
include('../database/db.php');
$sql = "SELECT * FROM images ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="text-center mb-4">Uploaded Images</h2>
  <div class="text-end mb-3">
    <a href="upload-image.php" class="btn btn-primary">Upload New Image</a>
  </div>
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>SL No.</th>
          <th>Images</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $num> 0): ?>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td>
                <img src="<?= htmlspecialchars($row['filename']) ?>" alt="Image" width="100" height="80" style="object-fit: cover;">
              </td>
              <td><?= htmlspecialchars($row['category']) ?></td>
              <td>
                <a href="edit-from.php?editid=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="edit-upload-prc.php?delid=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this image?')">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        
          <tr>
            <td colspan="4" class="text-center">No images found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
