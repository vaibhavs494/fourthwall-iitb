
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
                    { //print_r($_POST);die(0);
                         $name = $_POST["name"];
                        $email = $_POST["email"];
                        $comment = $_POST["comment"];
                        $for_id = $_POST["for_id"];
                        $for_type=trim($_POST["for_type"]);
                        $r=mysqli_query($con,"INSERT INTO comments ( name,email,comment,for_id,for_type) VALUES ( ' $name','$email', '$comment',' $for_id','$for_type' )") or die("cant write");
                
					echo "done";
                    }
         }           
?>
