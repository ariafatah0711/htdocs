<?php
session_start();
//session_destroy();
unset($_SESSION['MEMBER']);
//landing page
header('Location:index.php?hal=home');
?>
