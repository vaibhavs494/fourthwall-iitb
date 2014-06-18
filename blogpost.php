<!DOCTYPE html>
<html>
<head>
    <title>Fourthwall | IITB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />
    <link rel="stylesheet" href="css/compiled/blogpost.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
     
     <?php include 'nav-bar static.php'; ?>
    
    <div id="blog_post">
        <div class="container">
            <div class="section_header">
            </div>

        <?php
                    error_reporting(0);
                    $con=mysqli_connect("localhost","root","","fourthwall");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                       // $result = mysqli_query($con,"SELECT * FROM events WHERE id= " . $id) or die('cant fetch data');
    
                        $results = mysqli_query($con,"SELECT * FROM ".$_GET["type"]." WHERE ID = ".$_GET['id']) or die('cant fetch data');
                        //$results = mysqli_query($con,"SELECT * FROM ".$_GET['type']." WHERE ID=".$_GET['id']) or die('cant fetch data');
                        $row = mysqli_fetch_array($results);
                        
                    }

            //  selecting main pic
                    $files = scandir('img/'.$_GET["type"].' pics');
                    
                    foreach($files as $file) 
                    {

                         if($file=='.' || $file == '..') continue; //if system files skip
                          $n=0;
                          
                          $picid=explode('.', $file);
                          
                          if(trim($picid[0])==$_GET['id']."@1")
                          {
                            $mainpic=$file;
                            break;
                          }
                    }
            echo '
            <div class="row">
                <div class="col-sm-8">
                    <img id="main_pic" class="post_pic img-responsive" src="img/'.$_GET["type"].' pics/'.$mainpic.'" />

                    <div class="post_content">
                        <h2>'.$row["name"].'</h2>
                        <span class="date">'.$row["dated"].'</span>
                        <p>
                          '.$row['content'].'
                        </p>
                        ';
                        
                        if($_GET["type"]=="reviews")
                        {    
                            echo '
                            <div class="author_box">
                                <div class="author">'.$row["author"].'</div>
                                <div class="area">author</div>
                            </div> ';
                        }
                    
                    echo '
                    </div>

                    <div class="comments">
                        <h4>Comments</h4>
                        ';
                        $did=$_GET['id'];
                        $dtype=$_GET["type"];

                    $comments = mysqli_query($con,"SELECT * FROM comments WHERE for_id = $did AND for_type = '".$dtype."' ") or die('cant fetch data');
                       
                   // print_r($comments);
                    foreach ($comments as $crow) {
                     //print_r($comment);
                     // $crow = mysqli_fetch_array($comment); 
                        if ($crow["status"]==1 ) {
                            
                        
                        echo'
                            <div class="comment">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="img/user-display.png" class="img-circle author_pic" />
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="name">
                                            '.$crow["name"].'
                                            
                                        </div>
                                        <div class="date">
                                            '.$crow["time"].'
                                        </div>
                                        <div class="response">
                                           '.$crow["comment"].'
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        ';

                    }
                };
                
                echo '

                    </div>
                    
                    <div class="new_comment">
                        <h4>Add Comment</h4>
                        <form action="#" method="post" id="new_comment_form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Name" name="name" class="form-control"/>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Email" name="email" class="form-control"/>
                                    <input type="hidden" placeholder="Email" name="for_id" value="'.$_GET["id"].'"/>
                                    <input type="hidden" placeholder="Email" name="for_type" value="'.$_GET["type"].'"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea placeholder="Comments" rows="7" name="comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#" id="add_cmt" class="btn send">Add comment</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                ';
                
                echo'
                <!-- SideBar -->
                <div class="col-sm-4">
                    <div class="sidebar">
                        
                        
                        <div class="box">
                            <div class="sidebar_header">
                                <h4>Related Pics</h4>
                            </div>
                            <ul class="recent_photos">
                                ';
                    
                    $files = scandir('img/'.$_GET["type"].' pics');
                    
                    foreach($files as $file) 
                    {

                         if($file=='.' || $file == '..') continue; //if system files skip
                          $n=0;
                          
                          $picid=explode('@', $file);
                          
                          if(trim($picid[0])==$_GET['id'])
                          {
                            echo'
                                        <li>
                                            <a href="javascript:void(0);" ><img class="blog_pic" src= "img/'.$_GET["type"].' pics/'.$file.'"></a></li>
                                ';                            
                              
                          }      
                    }
                    echo '
                            </ul>
                        </div>

                        <div class="box last">
                            <div class="sidebar_header">
                                <h4>Recent Posts</h4>
                            </div>';
                    
                    $recent_posts = mysqli_query($con,"SELECT * FROM events ORDER BY dated ASC") or die('cant fetch data');
                    $n=0;
                    foreach ($recent_posts as $prow) {
                       
                   // $prow = mysqli_fetch_array($post);
                     
                     //  selecting main pic
                    $files = scandir('img/events pics');
                    
                    foreach($files as $file) 
                    {

                         if($file=='.' || $file == '..') continue; //if system files skip
                          
                          
                          $picid=explode('.', $file);
                          
                          if(trim($picid[0])==$prow["ID"]."@1")
                          {
                            $mainpic1=$file;
                            break;
                          }
                    }

                    echo ' 
                            <div class="recent">
                            <a href="blogpost.php?type=events&id='.$prow["ID"].'">
                                <span>
                                    <img src="img/events pics/'.$mainpic1.'" alt="">
                                </span></a> 
                                <p>'.$prow["descr"].'</p>
                               
                            </div>
                            
                        
                        ';
                        $n++;
                        if($n==2)break;
                    }
                    
                    echo '

                    </div>
                    </div>
                </div>
            </div>
        </div>  ';
    mysqli_close($con);
    ?>

    <!-- starts footer -->
    <?php include 'footer.php'; ?>
    <!--       -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

     <script type="text/javascript">
     <?php  echo' $("#'.$_GET["type"].'").addClass("active");'; ?>

        $(".blog_pic").click(function(){
            
            
            $("#main_pic").attr('src', $(this).attr('src'));
        });

        $("#add_cmt").click(function(){
           
            jQuery.ajax({
                url:"add_comment.php",
                type:"POST",
                data:$("#new_comment_form").serializeArray(),
              
              success:function(data){
                
                document.getElementById("new_comment_form").reset();
                alert(data);
                //alert("the comment is pending for approvel");
                                    },
              error:function()
                {
                    alert("error commenting");
                }
            });
      
            //document.getElementById("add_form").reset();
            return false;
        });
        
    </script>
</body>
</html>