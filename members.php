<?php

session_start();
if(isset($_SESSION['username']))
{
echo "<font size='4'>welcome ",$_SESSION['username']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href='logout.php'>logout</a></font>";
}
else
die("<font size='5'>you must be logged in to start shopping</font>");

?>