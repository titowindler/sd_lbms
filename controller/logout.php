<?php

session_unset();
session_destroy();

header("Location:../system/pages/examples/login.php");

?>
