<?php
// Set relative directory where images are stored
$imageDirectory = "images/";

// Check if the directory exists
if (is_dir($imageDirectory)) {
    // Get all image files from the directory
    $imageFiles = array_diff(scandir($imageDirectory), array('.', '..'));

    // Filter only image files
    $imageFiles = array_filter($imageFiles, function($file) use ($imageDirectory) {
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
        $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($fileExtension, $validExtensions) && is_file($imageDirectory . $file);
    });
} else {
    $error = "The image directory does not exist.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Basic CSS for the gallery */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            width: 90%;
            max-width: 1200px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
    width: 100%;
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Ensures the image covers the box without stretching */
    display: block;
    border-radius: 8px;
    transition: opacity 0.3s ease;
}


        .gallery-item:hover img {
            opacity: 0.8;
        }

        .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 8px;
        }

        .gallery-item:hover .overlay {
            opacity: 1;
        }

        .overlay-text {
            font-size: 24px;
        }
    </style>
</head>
<body>

<div class="gallery-container">
    <?php
    // Check if images are found and display them
    if (isset($imageFiles) && count($imageFiles) > 0) {
        foreach ($imageFiles as $image) : ?>
            <div class="gallery-item">
                <img src="<?php echo $imageDirectory . $image; ?>" alt="Gallery Image">
                <div class="overlay">
                    <div class="overlay-text">View Image</div>
                </div>
            </div>
        <?php endforeach;
    } else {
        echo "<p>No images found in the gallery.</p>";
    }
    ?>
</div>

</body>
</html>
