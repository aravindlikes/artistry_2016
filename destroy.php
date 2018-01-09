<?php
session_start();
if(isset($_SESSION["code"]))
{
//unset($_SESSION["code"]);
session_destroy();
header("Location: thankyou.html");
}
?>