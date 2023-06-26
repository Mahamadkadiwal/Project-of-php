<!-- favicon -->
<link rel="icon" type="image/png" href="image/favicon.jpg">
<?php
session_start();
session_destroy();
header("location:login.php");
