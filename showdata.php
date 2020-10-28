<?php
require 'dbh.inc.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>Show data</title>
<style type="text/css">
table{
    border-collapse: collapse;
    width: 100%;
    text-align: left;

}
</style>
</head>
<body>
<table>
<tr>
<th>NAME</th>
<th>EMAIL</th>
<th>Slot</th>
</tr>
<br>
<?php
$sql="SELECT * from students;";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr><td>".$row["uidUsers"]."</td><td>".$row["emailUsers"]."</td><td>".$row["slot"]."</td></tr><br>";


    }
}

?>
</table>










</body>


</html>
