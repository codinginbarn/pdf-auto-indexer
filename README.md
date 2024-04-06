# pdf-auto-indexer
## Automatically index PDF files from a directory with links and create thumbnail

This code is a basic PHP script that prepares a list of PDF files in a specific directory, If Imagick class is available, it generates base64 thumbnail image of the PDF files.
If the Imagick extension is not installed, it will display a message "Imagick extension is not installed on the server. Please install it to display PDF thumbnails." and it will continue listing the names of PDF files without the corresponding thumbnail images.

At this point, really not useful without Imagick extension.
