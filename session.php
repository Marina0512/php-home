<?php
session_start();

if (isset($_SESSION['counter'])) {
    echo "Третья страница была открыта " . $_SESSION['counter'] . " раза.";
    
} else {
    echo "Срок действия истек.";
}
?>