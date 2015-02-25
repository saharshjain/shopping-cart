<?php ob_start(); ?>
<?php
   	 include_once "assembly.css";
	 include_once "top.php";
    ?>
<body class="body">	
   <div class='content'>
          <article class='topcontent'>

<?php
 if(isset($_REQUEST['fname']) AND isset($_REQUEST['lname']) AND isset($_REQUEST['id']) AND isset($_REQUEST['sadd']) AND isset($_REQUEST['pinc']) AND isset($_REQUEST['pwd1']) AND isset($_REQUEST['pwd2'])AND isset($_REQUEST['mobno']) AND isset($_REQUEST['add']) AND isset($_REQUEST['nearloc']) )
{ if($_REQUEST['pwd1']===$_REQUEST['pwd2'])
  {
  $fn=$_REQUEST['fname'];
 $ln=$_REQUEST['lname'];
 $id=$_REQUEST['id'];
 $pwd=SHA1($_REQUEST['pwd1']);
 $add=$_REQUEST['add'];
 $sadd=$_REQUEST['sadd'];
  $pinc=$_REQUEST['pinc'];
 $nearloc=$_REQUEST['nearloc'];
 $mob=$_REQUEST['mobno'];

 echo '<content><h1>Hey <br>MR/MRS '.$fn.' '.$ln.' You have registered successfully</h1><br>click <a href="index.php?flag=cart">HERE</a> to enter in cart</content>';
    
$conn=mysql_connect("localhost","root","")or die("could not set connectn");
 mysql_select_db("shop")or die("could not connect to db");

 {$query="INSERT INTO signup values('$fn','$ln','$id','$pwd','$mob','$add','$nearloc','$sadd','$pinc')";
     mysql_query($query);
 }
 }
else echo '<content><h1>incorrect password</h1></content>';
}
else if(isset($_REQUEST['fname']) AND isset($_REQUEST['lname']) AND isset($_REQUEST['id']) AND isset($_REQUEST['sadd']) AND isset($_REQUEST['pinc']) AND isset($_REQUEST['mobno']) AND isset($_REQUEST['add']) AND isset($_REQUEST['nearloc']) )
    {
	 $fn=$_REQUEST['fname'];
 $ln=$_REQUEST['lname'];
 $id=$_REQUEST['id'];
 $add=$_REQUEST['add'];
 $sadd=$_REQUEST['sadd'];
  $pinc=$_REQUEST['pinc'];
 $nearloc=$_REQUEST['nearloc'];
 $mob=$_REQUEST['mobno'];
 echo '<content>';
 		
 
 $conn=mysql_connect("localhost","root","")or die("could not set connectn");
 mysql_select_db("shop")or die("could not connect to db");
echo $id.$pinc."<br>";

{ $query="UPDATE signup SET  pin ='$pinc' where email like '$id'";
   mysql_query($query)or die('unable update7');
 $query="UPDATE signup SET fnam='$fn' where email like '$id'";
   mysql_query($query)or die('unable update1');
 $query="UPDATE signup SET  lnam='$ln' where email like '$id'";
   mysql_query($query)or die('unable update2');
 $query="UPDATE signup SET mobno='$mob' where email like '$id'";
   mysql_query($query)or die('unable update3');
 $query="UPDATE signup SET addr='$add' where email like '$id'";
   mysql_query($query)or die('unable update4');
 $query="UPDATE signup SET nearpoint='$nearloc' where email like '$id'";
   mysql_query($query)or die('unable update5');
 $query="UPDATE signup SET shipaddrs='$sadd'  where email like '$id'";
   mysql_query($query)or die('unable update6');
  }
 
  
 echo '</content>';
	}
	

else  
{ echo'<content><h1>Any field mising plz fill form again..</h1></content>';
}
?>
   </article>
 </div>  
<?php include"botm.php";?>
	</body>
<?php ob_flush(); ?>