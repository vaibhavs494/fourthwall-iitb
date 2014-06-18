<?php
if( $_GET['sub'] != 'all')
                    {

                        header( "refresh:1;url=index.php" );
                        die("invalid request .... ");
                    }
?>
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

    <link rel="stylesheet" href="css/compiled/index2.css" type="text/css" media="screen" />    
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />    
    <link rel="stylesheet" href="css/compiled/blog.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="pull_top">
    
    <?php include 'nav-bar fixed.php'; ?>

    <section id="feature_slider" class="lol">
        <!-- 
            Each slide is composed by <img> and .info
            - .info's position is customized with css in index.css
            - each <img> parallax effect is declared by the following params inside its class:
            
            example: class="asset left-472 sp600 t120 z3"
            left-472 means left: -472px from the center
            sp600 is speed transition
            t120 is top to 120px
            z3 is z-index to 3
            Note: Maintain this order of params

            For the backgrounds, you can combine from the bgs folder :D
        -->
        <article class="slide" id="showcasing" style="background: url('img/backgrounds/piya.jpg') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="img/slides/scene1/macbook.png" />
            <div class="info">
                <h2><font face="Vivaldi">Piya Behrupiya</font></h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('img/backgrounds/by.jpg') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="img/slides/scene1/macbook.png" />
            <div class="info">
                <h2><font face="AR DECODE">By George</font></h2>
            </div>
        </article>
        <article class="slide" id="tour" style="background: url('img/backgrounds/some.jpg') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="img/slides/scene1/macbook.png" />
            <div class="info">
				<h2><font face="Edwardian Script ITC">Sometimes</font></h2>
			</div>
        </article>
        <article class="slide" id="responsive" style="background: url('img/backgrounds/rang.jpg') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="img/slides/scene1/macbook.png" />
            <div class="info">
                <h2>
                    <font face="Brush Script Std">Aaj Rang Hai</font>
				</h2>                
            </div>
        </article>        
    </section>

     <div id="blog">
        <div class="container">
            <div class="section_header">
               <!-- <h3>Events</h3>-->

                <input type="text" class="search-query form-control" placeholder="Search">
            </div>

            <?php
                    //error_reporting(0);
                
                if ((!isset($_GET['pagenum'])) || (!is_numeric($_GET['pagenum'])) || ($_GET['pagenum'] < 1)) { $pagenum = 1; } 
                else { $pagenum = $_GET['pagenum']; } 
                    
                    $subt=$_GET['sub'];
                    
                    $dbhost = 'localhost'; 
                    $dbuser = 'root'; 
                    $dbpass = ''; 
                    $db = 'fourthwall'; 
                    $connect_db = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die(mysql_error()); 
                    mysql_select_db ( $db, $connect_db ) or die(mysql_error()); 

                       
                       // $result = mysqli_query($con,"SELECT * FROM events WHERE id= " . $id) or die('cant fetch data');
                        if($_GET["sub"]=="all")
                        {$result = mysql_query("SELECT * FROM tf") or die('cant fetch data');}
                        else
                        {$result = mysql_query("SELECT * FROM tf WHERE type = $subt") or die('cant fetch data');}
                      
                        $rows = mysql_num_rows($result);

                        $page_rows = 9;  

                        $last = ceil($rows/$page_rows);  
                        if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; } 

                        
                        $max = ($pagenum - 1) * $page_rows; 

                        if($_GET["sub"]=="all")
                        $result2 = mysql_query("SELECT  * from tf where ID > $max order by ID asc limit $page_rows") or die(mysql_error());  
                        else
                        $result2 = mysql_query("SELECT  * from tf where ID > $max AND type = $subt order by ID asc limit $page_rows") or die(mysql_error());  
                        
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
                                        $files = scandir('img/tf pics');
                                        
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
                                                    <a href="blogpost.php?type=tf&id='. $row["ID"] .'">
                                                        <img src="img/tf pics/'.$mainpic.'" alt="" class="img-responsive" />
                                                    </a>
                                                </div>
                                                <div class="text">
                                                    <h5><a href="blogpost.php?type=tf&id='. $row["ID"] .'">'. $row["name"].'</a></h5>
                                                    <span class="date">'. $row["dated"] .'</span>
                                                    <p>
                                                    ' . substr($row["descr"], 0,150) ."...". '</p>
                                                </div>
                                                <div class="author_box">
                                                    <h6> fourthwall </h6>
                                                    
                                                </div>
                                                <a class="plus_wrapper" href="blogpost.php?type=tf&id='. $row["ID"] .'">
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
    <footer id="footer">
        <div class="container">
            <div class="row sections">
                
                <div class="col-sm-4 recent_posts">
                    <h3 class="footer_header">
                        Find us on FB
                    </h3>
                    
                    <div class="fb-like-box" data-href="https://www.facebook.com/Fourth.Wall" data-width="313" data-height="320" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                </div>
               <?php
               $review_c= substr($review['content'],0,190) . " ... ";
              echo ' 
                <div class="col-sm-4 testimonials">
                    <h3 class="footer_header">
                        REVIEWS
                    </h3>
                    <div class="wrapper">
                        <div class="quote">
                            <span>“</span>
                                                          Achcha laga dekh ke ki IIT-Bombay students jo kal ke engineers hai, itne interested hai Theatre aur Drama mein. Iska shrey inke teachers ko aur inke seniors ko jaata hai. All the best, FourthWall and aage achcha kaam karte raho!
                            <span></span>
                        </div>
                        <div class="author">
                            <img src="img/reviews pics/ns2.jpg" />
                            <div class="name">Nawazzudin Siddiqui</div>
                            <div class="info">
                                 Actor- Theatre and Films, NSD Alumni
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
                
                <div class="col-sm-4 contact">
                    <h3 class="footer_header">
                        Calender
                    </h3>
                    
                </div>
            </div>
            
            <div class="row credits">
                <div class="col-md-12">
                    <div class="row social">
                        <div class="col-md-12">
                            <a href="index.html#" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            <a href="index.html#" class="twitter">
                                <span class="socialicons ico2"></span>
                                <span class="socialicons_h ico2h"></span>
                            </a>
                            <a href="index.html#" class="gplus">
                                <span class="socialicons ico3"></span>
                                <span class="socialicons_h ico3h"></span>
                            </a>
                            
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-md-12">
                            © 2014 Nithin Murali and Ranveer Aggarwal . All rights reserved.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    <script type="text/javascript" src="js/index-slider.js"></script>	

    <script type="text/javascript">
        $("#tfest").addClass("active");
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>