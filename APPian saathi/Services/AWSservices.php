<?php
require 'vendor/autoload.php'; // Ensure AWS SDK is installed via Composer

use Aws\S3\S3Client;

class AWSService {
    private $s3;
    private $bucketName = "YOUR_BUCKET_NAME";

    public function __construct() {
        $this->s3 = new S3Client([
            'version' => 'latest',
            'region' => 'YOUR_REGION',
            'credentials' => [
                'key' => 'YOUR_AWS_ACCESS_KEY',
                'secret' => 'YOUR_AWS_SECRET_KEY'
            ]
        ]);
    }

    public function uploadFile($filePath, $key) {
        try {
            $result = $this->s3->putObject([
                'Bucket' => $this->bucketName,
                'Key' => $key,
                'SourceFile' => $filePath
            ]);
            return $result['ObjectURL']; // Return the URL of the uploaded file
        } catch (Exception $e) {
            throw new Exception("Failed to upload file to S3: " . $e->getMessage());
        }
    }

    public function generatePresignedUrl($key, $expiry = '+1 hour') {
        try {
            $cmd = $this->s3->getCommand('GetObject', [
                'Bucket' => $this->bucketName,
                'Key' => $key
            ]);
            $request = $this->s3->createPresignedRequest($cmd, $expiry);
            return (string) $request->getUri(); // Return presigned URL
        } catch (Exception $e) {
            throw new Exception("Failed to generate presigned URL: " . $e->getMessage());
        }
    }
}
?>
