
<?php
include_once "index.php";
if(isset($_COOKIE['name']) AND isset($_COOKIE['pass']))
	{
	
	if(isset($_GET['to']))
		{
			$method=$_GET['to'];
			if($method=='self')
			{
			echo "<div id=\"name_box\">";
			echo "thnx for buying for yourself";
			$conn2=mysql_connect("localhost","root","")or die("could not set connectn");
			mysql_select_db("shop")or die("could not connect to db now kya karun");
			$query='SELECT * FROM signup where email like "'.$_COOKIE['name'].'"';
			echo "<br/>your details are given below :-";
			$x=mysql_query($query) or die ('unable to load this ');
			while( $row=mysql_fetch_array($x) )
				{
				extract($row);
				echo "<br/>Reciever's name =  ".$row[0]." ".$row[1];
				echo "<br/>Reciever's mobile no. =  ".$row[4];
				echo "<br/>Shipping address =  ".$row[5];
				echo "<br/>Land mark =  ".$row[6];
				}
			echo "<br/>Product will be delievered in 4-5 official days<br/>Thank you for shopping with us.<br/>";
			echo "<a href='logout.php' >LOGOUT </a>from here &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href='start.php>Shop again </a>";
			
			
			echo "</div>";	
			}
			else if($method=='gift') 
			{
			echo "<div id=\"name_box\">";
			echo "thnx for gifting the person";
			echo "<br/>SHIPPING INFO";
			echo "<form action=\"finalise.php\" method=\"GET\">";
			echo "<input type=\"text\"  required name=\"sname\" placeholder=\"Sender's complete name\" style=\"margin-top:10px; height:25px; width:300px; \"><br>";
			echo "<input type=\"text\"  required name=\"rname\" placeholder=\"Reciever's complete name\" style=\"margin-top:10px; height:25px; width:300px; \"><br>";
			echo "<input type=\"text\"  required name=\"smobno\" placeholder=\"Sender's mobile number\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
			echo "<input type=\"text\"  required name=\"rmobno\" placeholder=\"Reciever's mobile number\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
			echo "<input type=\"text\"  required name=\"radd\"  placeholder=\"Reciever's address\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
			echo "<input type=\"text\"  required name=\"pinc\" placeholder=\" pincode\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
			echo "<input type=\"text\" name=\"nearloc\" placeholder=\"landmark\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
			echo "<input type=\"submit\"  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\"></input> ";
			echo "</form>";
			echo "<a href='index.php?flag=cart'><button  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\">cancel</button> </a>";

			echo "</div>";
			
			}
		
		}
	
	}
else 
{
	echo "<div id=\"name_box\">";
	echo "Please Login First then only You can make purchases<br> ";
	echo "<a href='login.php'><button  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\">login</button> </a>";
	echo "<a href='index.php?flag=2'><button  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\">signup</button> </a>";
	echo "<a href='index.php?flag=cart'><button  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\">back</button> </a>";
	echo "</div>";
}
	
	


?>