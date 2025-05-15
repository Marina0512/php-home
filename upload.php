<?php

$fileDirectore = 'upload/';

if (empty($_POST['file_name'])) {
    header('Location: index.html');
    exit;
}

if (!isset($_FILES['content']) || $_FILES['content']['error'] !== UPLOAD_ERR_OK) {
    header('Location: index.html');
    exit;
}

$fileName = $_POST['file_name'];

$fileExtension = pathinfo($_FILES['content']['name'], PATHINFO_EXTENSION);

$newFileName = $fileName . '.' . $fileExtension;

$filePath = $fileDirectore . $newFileName;

if (move_uploaded_file($_FILES['content']['tmp_name'], $filePath)) {
    echo "Файл успешно загружен!<br>";
    echo "Путь к файлу: " . $filePath . "<br>";
    echo "Размер файла: " . filesize($filePath) . " байт";
} else {
    echo "Ошибка при загрузке файла.";
}

