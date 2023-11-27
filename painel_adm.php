<?php
session_start();

if (!isset($_SESSION['adm_name'])) {
    // O usuário não está logado
    header('Location: /login.php');
    exit;
}