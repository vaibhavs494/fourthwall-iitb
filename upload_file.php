<?php
$n=1;
                  $con=mysqli_connect("localhost","root","","fourthwall");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();

                    }
                    else
                    {
                      $result = mysqli_query($con,"SELECT MAX(ID) FROM ".$_REQUEST['cat'].";") or die('cant fetch data');
                      foreach ($result as $idm) {
                         break;
                      }
                     $id=$idm["MAX(ID)"];
                    }
//print_r($_FILES);echo"<br><br>";
$count = count($_FILES['file']);

for($i=0; $i<=$count; $i++) {

  if (isset($_FILES['file']['size'][$i]))
    {
      $allowedExts = array("gif", "jpeg","JPEG","JPG", "jpg", "png");
      $temp = explode(".", $_FILES['file']["name"][$i]);
      $extension = end($temp);
      if (in_array($extension, $allowedExts) )
        {
        if ($_FILES['file']["error"][$i] > 0)
          {
          $msg= "Return Code: " . $_FILES['file']["error"][$i] . "<br>";
          }
        else
          {
          echo "Upload: " . $_FILES['file']["name"][$i] . "<br>";
          echo "Size: " . ($_FILES['file']["size"][$i] / 1024) . " kB<br>";
         
         //chmod( $_FILES['file']["tmp_name"], 0777 );
           $path="img/" . $_REQUEST['cat'].' pics/';
         
         if( move_uploaded_file($_FILES['file']["tmp_name"][$i],
            $path . $id . "@".$n.".". $extension))
            { $msg= "<br>  sucessfully Added";}
          else
          {
          $msg= "   cant upload";
          }
            
          }
        }
      else
        {
        echo "Invalid file". $extension;
       
        }
      $n++;
        }
}
 
echo "looped".$n;
// header("Location:admin-acess.php?msg=".$msg)
?>