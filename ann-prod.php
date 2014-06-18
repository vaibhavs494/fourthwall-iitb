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
        <article class="slide" id="showcasing" style="background: url('img/backgrounds/1.jpg') repeat-x top center;">
            <img class="asset left-30 sp600 t120 z1" src="img/slides/scene1/macbook.png" />
            <div class="info">
                <h2></h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('img/backgrounds/2.jpg') repeat-x top center;">
            <div class="info">
                <h2></h2>
            </div>
        </article>
        <article class="slide" id="tour" style="background: url('img/backgrounds/3.jpg') repeat-x top center;">
            <div class="info">
                <h2></h2>
            </div>
        </article>
        <article class="slide" id="responsive" style="background: url('img/backgrounds/4.jpg') repeat-x top center;">
            <div class="info">
                <h2>
                </h2>                
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
    
                        $recent_posts = mysqli_query($con,"SELECT * FROM events ORDER BY dated ASC") or die('cant fetch data');
                        $recent_review = mysqli_query($con,"SELECT * FROM reviews ORDER BY dated ASC") or die('cant fetch data');
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
 ?>    


                        <div style="margin-left:12%;margin-right:12%"><p>The Drama is not dead yet. Its aroma lives and so lives its soul to 
						ameliorate. Where long span of parting can’t be a reason of surcease, we exemplify <b>‘Fourth Wall’</b>.It brings to you another big event from its store called <b>‘Annual productions’</b>, commonly known as <b>ANN PROD</b>.</p>

						<p>Having started in 2005 as a part of theater festival, Ann prod is a stage which has witnessed greatest plays of the institute. This year, it is scheduled as a 2 day event comprising of  6 brilliant plays and a streetplay on electricity. Every play in its own unique way challenges the throne of grandeur. The motivation of ensuring a primary check on quality justifies the reason of not keeping Ann Prod as a competition. It explicitly provides a platform where best talents of the institute can be exhibited.</p>

						<p>Theater is a verb before it is a noun, an act before it is a place. Every year in the month of January, playwrights foregather to contribute back their best with everything what they have learnt here. It’s time when they let off the debt. All renowned or passed out actors from the institute whom we ever have heard of, have gained their fame and excelled in their genre right from this stage. Be it the countrywide acclaimed ‘Naali K Kutte’ or still performing ‘Jaago Jaago Jaago’, Ann prod stage has given them all. On an experimental basis, this Ann Prod presents to you a special performance by juniors to give them an opportunity so as to nurture their talent out of an amateur act. </p>

						<p>In the end of the line, we hereby promise you one more year of magnificent <b>‘Annual Productions’</b>. The very place to display your endowments is set. All we need to conserve is the charismatic spirit of excellence. Hopefully in this journey of Ann Prod you not only gain a wonderful experience to cherish but also travel to a new dimension of Dramatics.</p>
						<br>
						P.S: Keep watching this space to check on updates or further announcements on Annual Productions."
						</div>				
                   
           
    
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
                            © 2014 nithin murali and Ranveer agarval . All rights reserved.
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
        $("#annprod").addClass("active");
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