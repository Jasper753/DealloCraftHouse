<?php
require "login.php";
unset($_SESSION['SESS_USER_ID']);
unset($_SESSION['SESS_USER_NAME']);
unset($_SESSION['SESS_EMAIL']);
print("YOU HAVE SUCESSFULLY LOGGED OUT!");

?>

<?php
//header("Location: login.html");
?>