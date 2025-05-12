<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    $filename = "downloaded_file.txt";

    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    echo $text;
    exit;
} else {
    echo "Error: 'text' parameter is missing in the GET request.";
}
?>