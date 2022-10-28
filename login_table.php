<?php
//create server connection
$con = mysql_connect("localhost","id17136481_mygrocery","@V/6O&*aymrKR5H8");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("mygrocery", $con);

  $sql = "CREATE TABLE login (
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (username)
)";


if (mysql_query($sql,$con))
{
  echo "<br />Table payment details created";
}
else
{
  die('<br />Error payment details table: ' . mysql_error());
}

mysql_close($con);
?>
