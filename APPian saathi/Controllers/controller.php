<?php
class FileController {
    public function uploadFile($file) {
        // Define the target directory for uploads
        $targetDir = "public/uploads/";
        $targetFile = $targetDir . basename($file["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile; // Return file path
        } else {
            throw new Exception("Error uploading file.");
        }
    }
}
?>
