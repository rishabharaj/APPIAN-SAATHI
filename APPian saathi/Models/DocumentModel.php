<?php
require_once 'config/config.php';

class DocumentModel {
    private $db;

    public function __construct() {
        $this->db = connectDatabase();
    }

    // Save document metadata
    public function saveDocument($fileName, $classification, $summary, $cloudUrl = null) {
        $stmt = $this->db->prepare("INSERT INTO documents (file_name, classification, summary, cloud_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fileName, $classification, $summary, $cloudUrl);
        if ($stmt->execute()) {
            return $this->db->insert_id; // Return the inserted document ID
        } else {
            throw new Exception("Error saving document: " . $stmt->error);
        }
    }

    // Get document details by ID
    public function getDocumentById($documentId) {
        $stmt = $this->db->prepare("SELECT * FROM documents WHERE id = ?");
        $stmt->bind_param("i", $documentId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
