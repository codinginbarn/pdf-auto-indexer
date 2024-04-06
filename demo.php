<?php
$directory = "pdf/"; //path to directory with pdf files
$files = scandir($directory);

echo "<ul>";

if (!class_exists('Imagick')) {
    echo "<li>Imagick extension is not installed on the server. Please install it to display PDF thumbnails.</li>";
} else {
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) == "pdf") {
            $filePath = $directory . $file;

            if (file_exists($filePath)) {
                echo "<li><a href='$filePath' download>$file</a></li>";

                try {
                    $pdf_files = new Imagick();
                    $pdf_files->readImage($filePath . "[0]"); // this read an display image of very first page in pdf
                    $pdf_files->setImageFormat('png');
                    $imageData = $pdf_files->getImageBlob();
                    $base64 = base64_encode($imageData);

                    echo "<img src='data:image/png;base64,$base64' />"; // display base64 image of each PDF
                } catch (ImagickException $e) {
                    echo "<p>Error processing $file: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p>File $file does not exist.</p>";
            }
        }
    }
}

echo "</ul>";
?>
