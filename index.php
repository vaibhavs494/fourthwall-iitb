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

    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />    
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />    

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
        <article class="slide" id="showcasing" style="background: url('img/backgrounds/FourthWall.jpg') repeat-x top center;">
            <img class="asset left-30 sp400 t120 z1" src="img/slides/scene1/macbook.png" / >
            <div class="info">
                <h2>Welcome to the Dramatics Club of IIT-Bombay</h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('img/backgrounds/warm.jpg') repeat-x top center;">
            <div class="info">
                <h2>Express your innermost emotions...</h2>
            </div>
            <img class="asset left-400 sp300 t200 z1" src="img/slides/scene2/parmar.jpg" />
            <img class="asset left-210 sp400 t180 z2" src="img/slides/scene2/ranjan.jpg" />
            <img class="asset left60 sp500 t275 z3" src="img/slides/scene2/mansi.jpg" />
        </article>
        <article class="slide" id="responsive" style="background: url('img/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-550 sp300 t120 z3" src="img/slides/scene3/streetplay.jpg" />
            <!--img class="asset left-190 sp400 t10 z2" src="img/slides/scene4/css3.png" /-->
            <div class="info">
                <center>
                <h2>
                    ..and make the world </n>
                </h2>
                <h2>
                    <big><strong> YOUR STAGE </strong></big>
                </h2>
		</center>                
            </div>
        </article>        
        <article class="slide" id="tour" style="background: url('img/backgrounds/silver-thumb.jpg') repeat-x top center;">
            <img class="asset left-350 sp1000 120 z3" src="img/slides/scene4/wordle.png" />
            <!--img class="asset left-365 sp900 t270 z4" src="img/slides/scene3/iphone.png" />
            <img class="asset left-350 sp750 t135 z2" src="img/slides/scene3/desktop.png" />
            <img class="asset left-185 sp800 t220 z1" src="img/slides/scene3/macbook.png" /-->
            <div class="info">
                <center>
                <h2>What all can you do?</h2>
                <a href="events.php?sub=all">Tour With Us</a>
                </center>
            </div>
        </article>
    
        </section>

            <?php
                    $con=mysqli_connect("localhost","root","","fourthwall");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                       // $result = mysqli_query($con,"SELECT * FROM events WHERE id= " . $id) or die('cant fetch data');
    
                        $recent_posts = mysqli_query($con,"SELECT * FROM events ORDER BY dated DESC") or die('cant fetch data');
                        $recent_review = mysqli_query($con,"SELECT * FROM reviews ORDER BY dated DESC") or die('cant fetch data');
                        //$results = mysqli_query($con,"SELECT * FROM ".$_GET['type']." WHERE ID=".$_GET['id']) or die('cant fetch data');
                        $r_row = array("","","","");
                        $n=0;
                        foreach ($recent_posts as $post) {
                            $r_row[$n] = $post;
                            
                            $n++;

                            if($n==4)
                            break;
                        }
                        foreach ($recent_review as $review) {
                            break;
                        }
                        
                    }

                    $files = scandir('img/events pics');
                                        
                                        foreach($files as $file) 
                                        {

                                             if($file=='.' || $file == '..') continue; //if system files skip
                                             
                                              $picid=explode('.', $file);
                                              
                                              if(trim($picid[0])==$r_row[0]["ID"]."@1")
                                              {
                                                $mainpic[0]=$file;
                                                
                                              }
                                              if(trim($picid[0])==$r_row[1]["ID"]."@1")
                                              {
                                                $mainpic[1]=$file;
                                                
                                              }
                                              if(trim($picid[0])==$r_row[2]["ID"]."@1")
                                              {
                                                $mainpic[2]=$file;
                                                
                                              }
                                              if(trim($picid[0])==$r_row[3]["ID"]."@1")
                                              {
                                                $mainpic[3]=$file;
                                                
                                              }
                                        }
           
    echo '
    <div id="features">
        <div class="container">
            <div class="section_header">
                <h3>Upcoming Event</h3>
            </div> 
            <div class="row feature">
                <div class="col-sm-6">
                    <img src="img/events pics/'.$mainpic[0].'" class="img-responsive" />
                </div>
                <div class="col-sm-6 info">
                    <h3>
                        '.$r_row[0]["name"].'
                    </h3>
                    <p>
                        '.$r_row[0]["descr"].'
                    </p>
                </div>
            </div>
        </div>
    </div> 
   
    <div id="showcase">
        <div class="container">
            <div class="section_header">
                <h3>Recent Events</h3>
            </div>            
            <div class="row feature_wrapper">
                <!-- Features Row -->
                <div class="features_op1_row">
                    
                    <!-- Feature -->
                    <div class="col-sm-4 feature first">
                        <div class="img_box">
                            <a href="blogpost.php?type=events&id='. $r_row[1]["ID"] .'">
                                <img src="img/events pics/'.$mainpic[1].'">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6>'.$r_row[1]["name"].'</h6>
                            <p>
                                '.$r_row[1]["descr"].'
                            </p>
                        </div>
                    </div>
                    <!-- Feature -->
                    <div class="col-sm-4 feature">
                        <div class="img_box">
                            <a href="blogpost.php?type=events&id='. $r_row[2]["ID"] .'">
                                <img src="img/events pics/'.$mainpic[2].'">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6>'.$r_row[2]["name"].'</h6>
                            <p>
                                '.$r_row[2]["descr"].'
                            </p>
                        </div>
                    </div>
                    <!-- Feature -->
                    <div class="col-sm-4 feature last">
                        <div class="img_box">
                            <a href="blogpost.php?type=events&id='. $r_row[3]["ID"] .'">
                                <img src="img/events pics/'.$mainpic[3].'">
                                <span class="circle"> 
                                    <span class="plus">&#43;</span>
                                </span>
                            </a>
                        </div>
                        <div class="text">
                            <h6>'.$r_row[3]["name"].'</h6>
                            <p>
                               '.$r_row[3]["descr"].'
                            </p>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    ';
     ?>
    <!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row sections">
                
                <div class="col-sm-4 recent_posts">
                    <h3 class="footer_header">
                        Find us on FB
                    </h3>
                    
                    <div class="fb-like-box" data-href="https://www.facebook.com/Fourth.Wall" data-width="313" data-height="400" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
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
                        Calendar
                    </h3>
                    <iframe src="https://www.google.com/calendar/embed?title=Dramatics%20IIT-Bombay&amp;height=500&amp;wkst=1&amp;bgcolor=%23666666&amp;ctz=Asia%2FCalcutta" style=" border-width:0 " width="400" height="400" frameborder="0" scrolling="no"></iframe>
                    
                </div>
            </div>
            
            <div class="row credits">
                <div class="col-md-12">
                    <div class="row social">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/groups/fourthwall" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            <a href="https://twitter.com/FourthWallIITB" class="twitter">
                                <span class="socialicons ico2"></span>
                                <span class="socialicons_h ico2h"></span>
                            </a>
                            <a href="https://gymkhana.iitb.ac.in/~cultural" class="gymkhana">
                                <span class="socialicons ico3"></span>
                                <span class="socialicons_h ico3h"></span>
                            </a>
                            
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-md-12">
                            Created by <a href="https://www.facebook.com/imnithinm">Nithin Murali</a> and <a href="https://www.facebook.com/ranveeraggarwal">Ranveer Aggarwal</a>. </n> Maintained by Team <a href="about-us.php">FourthWall</a>
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
        $("#home").addClass("active");
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