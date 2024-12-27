require_once '../database/connection.php';

$connection = getDatabaseConnection();

$stmt = $connection->prepare("INSERT INTO documents (file_name, classification, summary) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fileName, $classification, $summary);
$stmt->execute();

echo "Document ID: " . $connection->insert_id;
$stmt->close();
$connection->close();
