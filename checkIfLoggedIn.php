<?php
session_start();

try {
    if (isset($_SESSION['user'])) {
        echo $_SESSION['user'];
    }
} catch (Exception $e) {
    echo "false";
}