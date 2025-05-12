<?php
session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

$_SESSION['counter']++;

if ($_SESSION['counter'] % 3 == 0) {
    header("Location: session_display.php");
    exit;
}

echo "Эта страница была открыта " . $_SESSION['counter'] . " раза.  Перенаправление после 3 раза.";
?>