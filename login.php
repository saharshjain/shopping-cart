<?php ob_start(); ?>
<?php
   	 include_once "assembly.css";
	 include_once "top.php";
    ?>
<body class="body">	
   <div class='content'>
          <article class='topcontent'>

<?php
if(isset($_COOKIE['name']) AND isset($_COOKIE['pass']) AND $_COOKIE['name'] AND $_COOKIE['pass'])
{ if(isset($_GET['check'])&&$_GET['check']==1)
     echo "<content>you have already logged in as ".$_COOKIE['name']."<br/>Do some shopping buddy<br/><br><br> you have <a href='logout.php?signup=1' >LOGOUT </a> first to sign up</content>";
  else
     echo "<content>you have already logged in as ".$_COOKIE['name']."<br/>Do some shopping buddy<br/><br> you can <a href='logout.php' >LOGOUT </a>from here</content>";

}
else if(isset($_GET['check'])&&$_GET['check']==1)
{  header("location:http://localhost/shopping/index.php?flag=2");
}
else
{
	  echo "<content><form action='2.php' method='POST'><input type ='text' name='username' placeholder='Enter user id'><br>";
      echo "<input type ='password' name='password' placeholder=\"Enter Password\"><br>";
      echo "<input type ='submit'value='login'><br></form></content>";				
}
?>

    </article>
</div>
<?php include"botm.php";?>
	</body>
<?php ob_flush(); ?>