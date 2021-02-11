<?php
session_start();
$_SESSION['prihlaseny'] = false;
$_SESSION['meno'] = "";
$_SESSION['userId'] = null;

header("Location: index.php" );
?>
