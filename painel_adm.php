<?php
session_start();

if (!isset($_SESSION['username'])) {
    // O usuário não está logado
    header('Location: /login.php');
    exit;
}