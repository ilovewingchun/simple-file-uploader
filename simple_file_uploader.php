<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the maximum upload file size from php.ini
$maxFileSize = ini_get('upload_max_filesize');
$maxFileSizeBytes = return_bytes($maxFileSize);
$maxFileSizeMB = round($maxFileSizeBytes / 1024 / 1024);

// Check if a file was submitted
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check if the file size is within the allowed limit
    if ($file['size'] <= $maxFileSizeBytes) {
        // Specify the directory where the file will be saved
        $uploadDirectory = '/var/www/html/samples/upload/';

        // Generate a unique filename
        $filename = uniqid() . '_' . basename($file['name']);

        // Set the final destination path
        $destination = $uploadDirectory . $filename;

        // Attempt to move the uploaded file to the desired directory
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $message = 'File uploaded successfully!';
        } else {
            $message = 'Failed to move the uploaded file.';
        }
    } else {
        $message = 'File size exceeds the allowed limit.';
    }
}

// Function to convert the PHP size format (e.g., '2M', '512K') to bytes
function return_bytes($size)
{
    $unit = strtoupper(substr($size, -1));
    $value = (int) substr($size, 0, -1);

    switch ($unit) {
        case 'K':
            return $value * 1024;
        case 'M':
            return $value * 1024 * 1024;
        case 'G':
            return $value * 1024 * 1024 * 1024;
        default:
            return $value;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple File Uploader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
        }

        h1 {
            font-size: 30px;
            color: #333;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ccc;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            font-size: 18px;
            background-color: #0000FF;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .reset-button {
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            background-color: #FF0000;
            color: white;
        }

        .filename {
            font-size: 30px;
            color: #0000FF;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Simple File Uploader</h1>
    <hr>

    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
        <?php if ($message === 'File uploaded successfully!') : ?>
            <p>Your file has been uploaded successfully.</p>
            <p class="filename">The unique filename is: <?php echo $filename; ?></p>
            <p>Feel free to upload another file now.</p>
        <?php endif; ?>
        <hr>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="file">Please select a file to upload: (max <?php echo $maxFileSizeMB; ?>MB)</label>
        <input type="file" name="file" id="file" onchange="showSelectedFileName(this)">
        <br>
        <input type="submit" value="Upload">
        <input type="button" class="reset-button" value="Reset" onclick="window.location.href=window.location.href">
    </form>

    <script>
        function showSelectedFileName(input) {
            if (input.files && input.files.length > 0) {
                var filename = input.files[0].name;
                var displayElement = document.getElementById('selectedFileName');
                displayElement.textContent = "Selected file: " + filename;
            }
        }
    </script>

    <p id="selectedFileName"></p>
</body>
</html>