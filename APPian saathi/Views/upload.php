<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Document Processor</h1>
        <form action="/routes/routes.php" method="POST" enctype="multipart/form-data">
            <label for="document">Upload your document (PDF):</label>
            <input type="file" name="document" id="document" accept=".pdf" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
