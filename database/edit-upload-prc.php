<?php 
include('../database/db.php');
// for edit


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editid'])) {
    $editid = $_POST['editid'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    
    if (!empty($_FILES['filename']['name'])) {
        $imageName = basename($_FILES['filename']['name']);
        $targetDir = "../assests/upload/";
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['filename']['tmp_name'], $targetFile)) {
            $sql = "UPDATE images SET category='$category', filename='$targetFile' WHERE id='$editid'";
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        
        $sql = "UPDATE images SET category='$category' WHERE id='$editid'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// for DELETE
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = "DELETE FROM images WHERE id='$delid'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
