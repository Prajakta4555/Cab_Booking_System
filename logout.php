<?php
setcookie("user", "", time() - 10);
header("Location: ./login.html");
?>