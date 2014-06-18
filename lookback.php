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

    <link rel="stylesheet" href="css/compiled/about.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />
    <link rel="stylesheet" href="css/lib/flexslider.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
    <?php include 'nav-bar static.php'; ?>
    
    <div id="aboutus">
        <div class="container">
            <div class="section_header">
                <h3>A Look Back</h3>
            </div>
            <div class="row">
                
                <div class="col-xs-10">
                   
                    <div class="flexslider">
                        <ul class="slides">
                        <?php
                             $files = scandir('img/gallery');
                    
                                foreach($files as $file) 
                                {
                                     if($file=='.' || $file == '..') continue; //if system files skip
                                      $n=0;
                                      
                                     echo'
                                     <li>
                                    <img src="img/gallery/'.$file.'"></li>
                                    ';
                                }
                            
                        ?>
                     </ul>
                    </div>

                   <!-- 
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                              <img src="img/about/slide1.jpg" />
                            </li>
                            <li>
                              <img src="img/about/slide2.jpg" />
                            </li>
                            <li>
                              <img src="img/about/slide3.jpg" />
                            </li>
                        </ul>
                    </div>
                -->

                </div>
            </div>
        </div>
    </div>

    
    <!-- starts footer -->
    <?php include 'footer.php'; ?>
    <!--       -->

    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script type="text/javascript" src="js/flexslider.js"></script>
    
    <script type="text/javascript">
        $("#lookback").addClass("active");
    </script>
</body>
</html>