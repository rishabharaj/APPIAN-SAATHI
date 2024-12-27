<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Results</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Processing Results</h1>
        <h3>Classification: </h3>
        <p><?php echo htmlspecialchars($classification); ?></p>
        <h3>Summary: </h3>
        <p><?php echo htmlspecialchars($summary); ?></p>
        <h3>Metadata:</h3>
        <ul>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($metadata['name']); ?></li>
            <li><strong>Date:</strong> <?php echo htmlspecialchars($metadata['date']); ?></li>
            <li><strong>Amount:</strong> <?php echo htmlspecialchars($metadata['amount']); ?></li>
        </ul>
        <a href="/">Upload Another Document</a>
    </div>
</body>
</html>
