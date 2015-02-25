<?php




$conn2=mysql_connect("localhost","root","")or die("could not set connectn");
          mysql_select_db("shop")or die("could not connect to db now kya karun");
          $liker='SELECT * FROM camera where icode like "c_1"';
          $retall=mysql_query($liker);
          while( $rowing=mysql_fetch_array($retall) )
           {
		     extract($rowing);
             $pre=$likes;
			echo $pre;
			$pre=$pre+1;
			echo "<br/><br/>".$pre;
		
           }
			
			
			?>