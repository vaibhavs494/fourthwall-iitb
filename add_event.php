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
                        $type = $_POST["type"];
                    $r=mysqli_query($con,"INSERT INTO events ( name,descr,content,dated,type) VALUES ( ' $name','$desc', '$content',' $dated', " . $type . " )") or die("cant write");
                   
					echo "done";
                    }
         }           
?>
