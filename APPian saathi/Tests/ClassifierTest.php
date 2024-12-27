<?php
require_once '../controllers/ClassifierController.php';

use PHPUnit\Framework\TestCase;

class ClassifierTest extends TestCase {
    public function testDocumentClassification() {
        $classifierController = new ClassifierController();

        // Simulated extracted text
        $text = "This is an invoice for the purchase of goods.";

        // Simulate classification
        $classification = $classifierController->classifyDocument($text);

        $this->assertEquals('Invoice', $classification, "The classification should correctly identify the document as an Invoice.");
    }
}
?>
