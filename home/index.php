<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
        $search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
        $images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        $found = false;

        foreach ($images as $img) {
            $filename = strtolower(basename($img));
            if (empty($search) || strpos($filename, $search) !== false) {
                echo '<div class="col-md-3 mb-4">';
                echo '  <div class="card shadow-sm">';
                echo '    <img src="'.$img.'" class="card-img-top" alt="'.$filename.'">';
                echo '    <div class="card-body text-center">';
                echo '      <p class="card-text">'.htmlspecialchars($filename).'</p>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
                $found = true;
            }
        }

        if (!$found) {
            echo '<div class="col-12 text-center"><p>No images found for "<strong>' . htmlspecialchars($search) . '</strong>"</p></div>';
        }
        ?>
    </div>
</div>
        
    
</body>
</html>