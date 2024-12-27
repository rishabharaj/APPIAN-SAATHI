<?php
require_once '../services/OCRService.php';

use PHPUnit\Framework\TestCase;

class OCRControllerTest extends TestCase {
    public function testOCRProcessing() {
        $ocrService = new OCRService();

        // Mock PDF file
        $mockFilePath = __DIR__ . '/mock/test.pdf';

        // Simulate OCR process
        $extractedText = $ocrService->processWithTesseract($mockFilePath);

        $this->assertNotEmpty($extractedText, "Extracted text should not be empty.");
    }
}
?>
