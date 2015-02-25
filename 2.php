<?php ob_start(); ?>

<?php
 include_once "assembly.css";
	 include_once "top.php";
    ?>
	
	<body class="body">	
       <div class='content'>
          <article class='topcontent'>

<?php

if(isset($_COOKIE['name']) AND isset($_COOKIE['pass']))
{ echo "<content>";
  echo "<a href='index.php?flag=cart&prch=1'>CLICK </a>TO select PAYMENT option ";
 echo "</content>";
}
 else if(isset($_POST['username']) AND isset($_POST['password']))
{ // session_start();
   $username= $_POST['username'];
   $password = SHA1($_POST['password']);


    if($username && $password)
      {
          $conn=mysql_connect("localhost","root","")or die("could not set connectn");
           mysql_select_db("shop") or die ("could not find db");
           $query = mysql_query("SELECT * FROM signup WHERE email='$username'");
           $numrows = mysql_num_rows($query);
       
	   if ($numrows!=0)
         {
           while($row=mysql_fetch_assoc($query))
            {  $dbusername = $row['email'];
               $dbpassword=$row['pass'];
            }

		    //to check if username and password match
         if($username==$dbusername&&$password==$dbpassword)
            { 
                setcookie('name',$username,time() + (86400 * 7));
                setcookie('pass',$password,time() + (86400 * 7));
                $conn=mysql_connect("localhost","root","")or die("could not set connectn");
                mysql_select_db("shop") or die ("could not find db");
                $rep=array('@','.');
                $tabname=str_replace($rep,"",$username);

              //  $query="CREATE TABLE ".$tabname."(icode varchar(10),iname varchar(20),idescriptn varchar(50),price int(5),quantity int(100))";
                static $check=1;
            if($check==1)
             {    
               $check++;
               echo '<content>';
              // mysql_query($query); //or die("nai banunga table mein");
               mysql_close($conn);
                echo '<br/><br/>you r logged in!<a href="index.php?flag=cart">clickhere</a> to enter to ur cart';
            $_SESSION['username']=$username;
			
			$query="ALTER TABLE goods ADD PRIMARY KEY(icode)";
            mysql_query($query);
			
			$ses_id = session_id();
			$query="insert into ".$tabname."* from".$ses_id;
	        mysql_query($query);
      ?>
	
<?php	  
			echo '</content>';
               
              }
            }
         else {  echo"<content>incorrect password</content>";  }
	      } 
    else {echo "<content>that user does not exist</content>";}
    }
else {echo "<content>please enter a username and password</content>";}
}
else
{ echo "<content>";
 echo 'login or sign up into your account<br><br><a href="login.php">Click here to Login</a>';
 
 echo "</content>";
 }
 ?>
   </article>
</div>
 <?php ob_flush(); ?>