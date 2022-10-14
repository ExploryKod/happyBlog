<?php

try {
    $pdo = new PDO('mysql:host=database;dbname=data;charset=utf8', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
