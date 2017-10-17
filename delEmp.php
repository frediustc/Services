<?php
require_once('inc/db.php');
$del = $db->prepare('DELETE FROM users WHERE id = ?');
$del->execute(array($_GET['id']));
header('location: viewEmp.php');
 ?>
