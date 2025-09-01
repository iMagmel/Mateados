<?php
session_start();
session_destroy();
header("Location: ../vista/iniciosesion/login.php");
exit();
?>