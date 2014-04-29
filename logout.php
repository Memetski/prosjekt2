<?php
include 'db.php';
session_destroy();
unset($_SESSION['userid']);
unset($_SESSION['username']);
echo '<script type="text/javascript">window.location = "innlogging.php"; </script>';
?>