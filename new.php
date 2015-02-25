 <?php
                  $conn=mysql_connect("localhost","root","")or die("could not set connectn");
				  mysql_select_db("test1") or die ("could not find db");  
			      
				  $q="CREATE TABLE yoyo(ordno int(5),order varchar(1000))";
     			  mysql_query($q);
				  
				  ?>