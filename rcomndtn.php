<aside class="recom-slidebar">
	       <h2>Recommended products</h2>
		    <table border="1" color="purple">
			<?php
			$conn2=mysql_connect("localhost","root","")or die("could not set connectn");
			mysql_select_db("shop")or die("could not connect to db now kya karun");
			$max='SELECT MAX(likes),icode,iname,idescriptn,price FROM camera';
         		  $retall=mysql_query($max);
        
            echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

            while( $row=mysql_fetch_array($retall) )
              { 
			   extract($row);
               echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td><a href=\"mobile.php?code=$icode\">details</a></td></tr>";
              }
			  
			  
			  $max='SELECT MAX(likes),icode,iname,idescriptn,price FROM mobile';
         		  $retall=mysql_query($max);
         echo "<table border=\"1\">";
            echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

            while( $row=mysql_fetch_array($retall) )
              { 
			   extract($row);
               echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td><a href=\"mobile.php?code=$icode\">details</a></td></tr>";
              }
			 

			 $max='SELECT MAX(likes),icode,iname,idescriptn,price FROM camera';
         		  $retall=mysql_query($max);
         echo "<table border=\"1\">";
            echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

            while( $row=mysql_fetch_array($retall) )
              { 
			   extract($row);
               echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td><a href=\"mobile.php?code=$icode\">details</a></td></tr>";
              }
        
            mysql_close($conn2);
				
			?>	
		</table>
			<br/>
			 <img src="http://www.wieistmeineip.de/ip-address/" align=""right">	   		
				
				
				
				
				
</aside>

