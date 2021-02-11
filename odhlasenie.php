<?php
session_start();
$_SESSION['prihlaseny'] = false;
$_SESSION['meno'] = "";

header("Location: index.php" );
?>
