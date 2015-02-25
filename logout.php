<?php ob_start(); ?>
<?php
 include_once "assembly.css";
	 include_once "top.php";
    ?>
	
	<body class="body">	
       <div class='content'>
          <article class='topcontent'>

<?php
if(isset($_GET['signup'])&&$_GET['signup'])
{ header("Location:index.php?flag=2");
}

echo '<content>';
$conn=mysql_connect("localhost","root","")or die("could not set connectn");
 mysql_select_db("shop") or die ("could not find db");
$ses_id = session_id();

 $query="DROP TABLE ".$ses_id;
mysql_query($query);
mysql_close($conn);

session_destroy();
setcookie("name", "", time() - (86400 * 7));
setcookie("pass", "", time() - (86400 * 7));
//unset($crttable,$username);
echo "<meta http-equiv=\"refresh\" content=\"10\">";
echo "you  have successfully logged out <a href='login.php'> click here</a> to login again";
echo '</content>';


?>
</article>
</div>
<?php include"botm.php";?>
	</body>
<?php ob_flush(); ?>