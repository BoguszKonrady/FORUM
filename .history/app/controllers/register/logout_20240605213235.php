<?php
include '/var/www/html/db.php';

session_unset();
session_destroy();
echo "<script type='text/javascript'>window.location.href = '/views/dashboard.php';</script>";
exit();