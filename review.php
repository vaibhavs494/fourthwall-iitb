<!DOCTYPE html>
<html>
<head>
    <title>Fourthwall | IITB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
   <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    
    <link rel="stylesheet" href="css/compiled/features.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
      
    <?php include 'nav-bar static.php'; ?>

    <div id="features" class="features_page">
        <div class="container">
            <!-- Feature Wrapper -->
            <div class="feature_wrapper option1">
                <div class="section_header">
                    <h3>REVIEWS</h3>
                </div>

            <?php
                
                if ((!isset($_GET['pagenum'])) || (!is_numeric($_GET['pagenum'])) || ($_GET['pagenum'] < 1)) { $pagenum = 1; } 
                else { $pagenum = $_GET['pagenum']; } 
                    
                    $subt=$_GET['sub'];
                    if($subt!=1 && $subt != 2 && $subt != 'all')
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
                        {$result = mysql_query("SELECT * FROM reviews") or die('cant fetch data');}
                        else
                        {$result = mysql_query("SELECT * FROM reviews WHERE type = $subt") or die('cant fetch data');}
                      
                        $rows = mysql_num_rows($result);

                        $page_rows = 4;  

                        
                        $last = ceil($rows/$page_rows);  

                       
                        if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; } 

                        
                        $max = ($pagenum - 1) * $page_rows; 

                        if($_GET["sub"]=="all")
                        $result2 = mysql_query("SELECT  * from reviews where ID > $max order by ID asc limit $page_rows") or die(mysql_error());  
                        else
                        $result2 = mysql_query("SELECT  * from reviews where ID > $max AND type = $subt order by ID asc limit $page_rows") or die(mysql_error());  
                        
                        echo '<!-- review Row -->
                            <div class="row feature last">';

                        //This is where you show your results 
                        while($row = mysql_fetch_array( $result2 ))  
                        {  

                                   // $result = mysqli_query($con,"SELECT * FROM reviews WHERE ID = " . $num) or die('cant fetch data');

                                    //$row = mysqli_fetch_array($result);
                                   //  selecting main pic
                                        $files = scandir('img/reviews pics');
                                        
                                        foreach($files as $file) 
                                        {

                                             if($file=='.' || $file == '..') continue; //if system files skip
                                              $n=0;
                                              
                                              $picid=explode('.', $file);
                                              
                                              if(trim($picid[0])==$row["ID"]."@1")
                                              {
                                                $mainpic=$file;
                                                break;
                                              }
                                        }
                                    $review= substr($row['content'],0,300) . " ... ";

                                    echo '
                                        <!-- Post -->
                                        <div class="row feature ">
                                            <div class="col-sm-6 pic-left">
                                                <img src="img/reviews pics/'.$mainpic.'" class="pull-left img-responsive" />
                                            </div>
                                            <div class="col-sm-6 info info-right">
                                                <h3>
                                                    <img src="img/features-ico2.png" />
                                                    '.$row["name"].'
                                                </h3>
                                                <p>
                                                '.$review.'<a href="blogpost.php?type=reviews&id='.$row["ID"].'">continue reading</a>' .'
                                                </p>
                                            </div>                    
                                        </div>
                                        <br><br>';
                                            $mainpic=" ";
                                    
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
        $("#reviews").addClass("active");
    </script>
</body>
</html>