<?php
include('db.php');
if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $category = $_POST['category'];
        $image = $_FILES['image'];

    
        if(empty($category)) {
            die("Category is required.");
        }

       
        if($image['error'] !== UPLOAD_ERR_OK) {
            die("Error uploading image.");
        }

        
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if(!in_array($image['type'], $allowedTypes)) {
            die("Invalid image type. Only JPG, PNG, and GIF are allowed.");
        }

       
        $uploadDir = '../assests/upload/';
        $uploadFile = $uploadDir . basename($image['name']);

        if(move_uploaded_file($image['tmp_name'], $uploadFile)) {
        
           echo  $sql ="INSERT INTO `images` (filename,category) VALUES ('$uploadFile','$category')";
            $result=mysqli_query($conn, $sql);
            if($result) {
                header("Location: ../admin/index.php");
                exit();
            } else {
                die("Database insert failed: " . mysqli_error($conn));
            }
        } else {
            die("Failed to move uploaded file.");
        }
    } 
?>