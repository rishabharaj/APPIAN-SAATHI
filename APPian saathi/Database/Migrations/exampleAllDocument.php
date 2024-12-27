require_once '../database/connection.php';

$connection = getDatabaseConnection();

$result = $connection->query("SELECT * FROM documents");
while ($row = $result->fetch_assoc()) {
    print_r($row);
}

$connection->close();
