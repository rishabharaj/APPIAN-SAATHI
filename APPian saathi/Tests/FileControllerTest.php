<?php
require_once '../controllers/FileController.php';

use PHPUnit\Framework\TestCase;

class FileControllerTest extends TestCase {
    public function testFileUpload() {
        $fileController = new FileController();

        // Simulate file upload
        $mockFile = [
            'name' => 'test.pdf',
            'tmp_name' => __DIR__ . '/mock/test.pdf',
            'error' => 0,
            'size' => 1024
        ];

        // Mock destination directory
        $uploadPath = $fileController->uploadFile($mockFile);

        $this->assertFileExists($uploadPath, "File should be uploaded successfully.");
    }
}
?>
