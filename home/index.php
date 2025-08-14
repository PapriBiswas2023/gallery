<?php 
include('../database/db.php');
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql= "SELECT * FROM images";
if(!empty($search)) {
    $searchEscaped = mysqli_real_escape_string($conn, $search);
    $sql .= " WHERE filename LIKE '%$searchEscaped%' OR category LIKE '%$searchEscaped%'";
    
}
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gallery</title>
</head>
<body class="bg-light">
    <div class="container mt-4">
    <h2 class="text-center mb-4">Image Gallery</h2>

   
    <form class="d-flex justify-content-center mb-4" method="GET" action="">
        <input class="form-control w-50 me-2" type="text" name="search" placeholder="Search images..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-3 mb-4">';
                echo '  <div class="card shadow-sm">';
                echo '    <img src="'.$row['filename'].'" class="card-img-top fixed-img" alt="'.htmlspecialchars($row['filename']).'">';
                echo '    <div class="card-body text-center">';
                echo '      <p class="card-text">'.htmlspecialchars($row['category']).'</p>';
                echo '     <a href="download.php?file=' . urlencode($row['filename']) . '" download class="btn btn-success btn-sm">Download</a> ';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>No images found for "<strong>' . htmlspecialchars($search) . '</strong>"</p></div>';
        }
        ?>
    </div>
</div>
        
    
</body>
</html>