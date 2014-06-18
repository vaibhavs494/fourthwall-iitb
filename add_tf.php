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
                    
                        $name = $_POST["name"];
                        $desc = $_POST["desc"];
                        $content = $_POST["content"];
                        $dated = $_POST["dated"];
                       
                    $r=mysqli_query($con,"INSERT INTO tf ( name,descr,content,dated) VALUES ( ' $name','$desc', '$content',' $dated' )") or die("cant write");
                   
					echo "done";
                    }
         }           
?>
