<?php
require_once '../controllers/FileController.php';
require_once '../controllers/OCRController.php';
require_once '../controllers/MetadataController.php';
require_once '../controllers/ClassifierController.php';
require_once '../controllers/SummaryController.php';
require_once '../models/DocumentModel.php';

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Instantiate required controllers
        $fileController = new FileController();
        $ocrController = new OCRController();
        $metadataController = new MetadataController();
        $classifierController = new ClassifierController();
        $summaryController = new SummaryController();
        $documentModel = new DocumentModel();

        // Handle file upload
        $uploadedFile = $fileController->uploadFile($_FILES['document']);

        // Perform OCR to extract text
        $extractedText = $ocrController->processOCR($uploadedFile);

        // Extract metadata from the text
        $metadata = $metadataController->extractMetadata($extractedText);

        // Classify the document
        $classification = $classifierController->classifyDocument($extractedText);

        // Generate a summary
        $summary = $summaryController->generateSummary($extractedText);

        // Save document details in the database
        $documentId = $documentModel->saveDocument(basename($uploadedFile), $classification, $summary);

        // Return response (for dynamic use or JSON-based frontend)
        header('Content-Type: application/json');
        echo json_encode([
            'document_id' => $documentId,
            'classification' => $classification,
            'summary' => $summary,
            'metadata' => $metadata
        ]);
    } catch (Exception $e) {
        // Handle errors and send response
        header('Content-Type: application/json', true, 500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Invalid request method
    header('HTTP/1.1 405 Method Not Allowed');
    echo "Invalid request method.";
}
?>
