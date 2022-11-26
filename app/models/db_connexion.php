<?php
// https://github.com/John-Bob-DIRIENZO/correction_jeu_combat_W2
try {
    $pdo = new PDO('mysql:host=database;dbname=data;charset=utf8', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
