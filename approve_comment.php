<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{		

				$con=mysqli_connect("localhost","root","","fourthwall");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                    $r=mysqli_query($con,"UPDATE comments SET status = ".$_POST["status"]." WHERE id= " . $_POST["id"] . " ") or die("cant write");
						echo "done";
                    }
         }           
?>