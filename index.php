<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>register!</title>
</head>
<body>
<h1>Registration form</h1>
<form action = "signup.inc.php" method="POST">
<input type="text"  name="uid" placeholder="Username">

<input type="text"  name="mail" placeholder="E-mail">
<input type="text"  name="slotlist" placeholder="Slot">


<button type="submit" name="Register">Register</button>
<br>
<br>

<a href="admin.login.inc.php" class="login">Admin LOG IN</a>


</form>
</body>

</html>