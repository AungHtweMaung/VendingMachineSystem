<?php

function adminAuth() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }


    if ($_SESSION['role'] !== 'admin') {
        // redirect to previous page
        $previous = $_SERVER['HTTP_REFERER'] ?? '/'; // fallback to home page
        header("Location: $previous");
        exit;
    }

}
