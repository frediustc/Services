<?php
if(!isset($_SESSION['id'])){
    session_start();
}
try {
    $db = new PDO('mysql:host=localhost;dbname=services', 'root', '');
} catch (Exception $e) {
    Die('Erreur : ' . $e->getMessage());
}
