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
                        $author = $_POST["author"];
                        $content = $_POST["content"];
                        $dated = $_POST["dated"];
                        $type = $_POST["type"];
                    $r=mysqli_query($con,"INSERT INTO reviews ( name,author,content,dated,type) VALUES ( ' $name', '$author' , '$content',' $dated', " . $type . " )") or die("cant write");
					echo "done";
                    }
         }           
?>
