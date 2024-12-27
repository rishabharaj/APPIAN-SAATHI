<?php
class DigiLockerService {
    private $apiEndpoint = "https://api.digilocker.gov.in"; // Example endpoint
    private $apiKey = "YOUR_DIGILOCKER_API_KEY";

    public function fetchDocument($documentId) {
        $url = $this->apiEndpoint . "/documents/" . $documentId;

        $headers = [
            "Authorization: Bearer " . $this->apiKey,
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode === 200) {
            return json_decode($response, true); // Return document details
        } else {
            throw new Exception("Failed to fetch document from DigiLocker.");
        }
    }
}
?>
