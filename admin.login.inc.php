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

<h1> Admin LOG IN </h1>
<form action="adminlogin.php" method="POST">
  <input type="text" name="aid" placeholder="Adminname">
  <input type="password" name="pwd" placeholder="Password">
  <button type="submit" name="login">Log IN</button>
</form>
</body>
</html>