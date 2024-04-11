<?php //Logs user out of session
session_start();
session_unset();
session_destroy();
header("Location: ../../index.php");
exit();
