<?php
session_start();
unset($_SESSION['user']['username']);
session_destroy();
header("location: index.php?Message=" . "successfully logged out!!");
?>

