<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Error</h1>
        <p>Oops! Something went wrong.</p>
        <p>Error Message: <?php echo htmlspecialchars($errorMessage); ?></p>
        <a href="/">Go Back to Upload</a>
    </div>
</body>
</html>
