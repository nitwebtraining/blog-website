<?php

define('BASE_URL', 'http://localhost:8000/');

require_once __DIR__ . '/backend/includes/db_connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
