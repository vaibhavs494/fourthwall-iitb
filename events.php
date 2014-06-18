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

    
    <link rel="stylesheet" href="css/compiled/blog.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
      
    <?php include 'nav-bar static.php'; ?>

    <div id="blog">
        <div class="container">
            <div class="section_header">
                <h3>Events</h3>

                <input type="text" class="search-query form-control" placeholder="Search">
            </div>

            <?php
                    error_reporting(0);
                
                if ((!isset($_GET['pagenum'])) || (!is_numeric($_GET['pagenum'])) || ($_GET['pagenum'] < 1)) { $pagenum = 1; } 
                else { $pagenum = $_GET['pagenum']; } 
                    
                     $subt=$_GET['sub'];
                    ;
                    if( $subt != 'all')
                    {

                        header( "refresh:1;url=index.php" );
                        die("invalid request .... ");
                    }

                    $dbhost = 'localhost'; 
                    $dbuser = 'root'; 
                    $dbpass = ''; 
                    $db = 'fourthwall'; 
                    $connect_db = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die(mysql_error()); 
                    mysql_select_db ( $db, $connect_db ) or die(mysql_error()); 

                       
                       // $result = mysqli_query($con,"SELECT * FROM events WHERE id= " . $id) or die('cant fetch data');
                        if($_GET["sub"]=="all")
                        {$result = mysql_query("SELECT * FROM events") or die('cant fetch data');}
                        else
                        {$result = mysql_query("SELECT * FROM events WHERE type = $subt") or die('cant fetch data');}
                      
                        $rows = mysql_num_rows($result);

                        $page_rows = 9;  

                        $last = ceil($rows/$page_rows);  
                        if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; } 

                        
                        $max = ($pagenum - 1) * $page_rows; 

                        if($_GET["sub"]=="all")
                        $result2 = mysql_query("SELECT  * from events where ID > $max order by dated desc limit $page_rows") or die(mysql_error());  
                        else
                        $result2 = mysql_query("SELECT  * from events where ID > $max AND type = $subt order by dated desc limit $page_rows") or die(mysql_error());  
                        
                        echo '<!-- Post Row -->
                                    <div class="row post_row">';
                        $num=1;
                        
                        while($row = mysql_fetch_array( $result2 ))  
                        {  

                                   // $result = mysqli_query($con,"SELECT * FROM reviews WHERE ID = " . $num) or die('cant fetch data');

                                    //$row = mysqli_fetch_array($result);
                                   //  selecting main pic
                            if($num==4||$num==7)
                            {
                                echo '<!-- Post Row -->
                                    <div class="row post_row">';
                            }
                                        $files = scandir('img/events pics');
                                        
                                        foreach($files as $file) 
                                        {

                                             if($file=='.' || $file == '..') continue; //if system files skip
                                             
                                              $picid=explode('.', $file);
                                              
                                              if(trim($picid[0])==$row["ID"]."@1")
                                              {
                                                $mainpic=$file;
                                                break;
                                              }
                                        }
                                    $review= substr($row['content'],0,255) . " ... ";

                                    echo '
                                        <!-- Post -->
                                        <div class="col-sm-4">
                                            <div class="post">
                                                <div class="img">
                                                    <a href="blogpost.php?type=events&id='. $row["ID"] .'">
                                                        <img src="img/events pics/'.$mainpic.'" alt="" class="img-responsive" />
                                                    </a>
                                                </div>
                                                <div class="text">
                                                    <h5><a href="blogpost.php?type=events&id='. $row["ID"] .'">'. $row["name"].'</a></h5>
                                                    <span class="date">'. $row["dated"] .'</span>
                                                    <p>
                                                    ' . substr($row["descr"], 0,150) ."...". '</p>
                                                </div>
                                                <div class="author_box">
                                                    <h6> fourthwall </h6>
                                                    
                                                </div>
                                                <a class="plus_wrapper" href="blogpost.php?type=events&id='. $row["ID"] .'">
                                                    <span>&#43;</span>
                                                </a>
                                            </div></div>';
                                            $mainpic="";
                                        $num++;              
                                     //echo $num;
                                     if($num==4||$num==7)
                                    {
                                        echo '
                                            </div>';
                                    }     
                                             
                               }
                            echo '</div>';
                              //first page, and to the previous page. 
                            

                            if($last==1)
                            {
                                    echo'
                                        <div class="paginator-container">
                                            <ul class="pager">
                                            <li class="previous disabled"><a href="#">&larr; Previous</a></li>
                                            <li class="next disabled"><a href="">Next &rarr;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
                            }
                           else if ($pagenum == 1)
                            { 
                                 echo'
                                        <div class="paginator-container">
                                            <ul class="pager">
                                            <li class="previous disabled"><a href="#">&larr; Previous</a></li>
                                            <li class="next"><a href="'.$_SERVER['PHP_SELF'].'?pagenum='.($pagenum+1).'&sub='.$subt.'">Next &rarr;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
                            }  
                            else  if($pagenum==$last)
                            { 
                            echo'
                                        <div class="paginator-container">
                                            <ul class="pager">
                                            <li class="previous"><a href="'.$_SERVER['PHP_SELF'].'?pagenum='.($pagenum-1).'&sub='.$subt.'">&larr; Previous</a></li>
                                            <li class="next disabled"><a href="#">Next &rarr;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>'; 
                            }
                            else
                            {
                                echo'
                                        <div class="paginator-container">
                                            <ul class="pager">
                                            <li class="previous"><a href="'.$_SERVER['PHP_SELF'].'?pagenum='.($pagenum-1).'&sub='.$subt.'">&larr; Previous</a></li>
                                            <li class="next"><a href="'.$_SERVER['PHP_SELF'].'?pagenum='.($pagenum+1).'&sub='.$subt.'">Next &rarr;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
                            }
             
?>


    <!-- starts footer -->
    <?php include 'footer.php'; ?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    <script type="text/javascript">
        $("#events").addClass("active");
    </script>
</body>
</html>