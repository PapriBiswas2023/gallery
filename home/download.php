<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); 
    $path = __DIR__ . "/../assests/upload/" . $file;

    if (file_exists($path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Length: ' . filesize($path));
        flush();
        readfile($path);
        exit;
    } else {
        echo "File not found.";
    }
}
?>
