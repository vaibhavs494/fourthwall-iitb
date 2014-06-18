
<?php 
        session_start();

    if (!isset($_SESSION["role"]))
        {   

             echo " <script> alert('u dont have enough previalges');</SCRIPT>";
             header ("Location: signin.php?err=fail");
             die(0);
        }
        else
        {
            
            if( $_SESSION['role']!="admin" )
            {
                if($_SERVER["REQUEST_METHOD"] == "POST" )
                {  
                    if($_POST["id"]=="admin" && $_POST["pass"]=="imadmin")
                    {
                        $_SESSION["role"]="admin";
                    }
                    else
                    {
                        echo " u dont have enough previalges";
                        header ("Location: signin.php?err=fail");
                        die(0);
                    }
                }
                else
                {
                    echo " u dont have enough previalges";
                        header ("Location: signin.php?err=fail");
                        die(0);
                }  
            

            }
        }    

 ?>

<html>
<head>
	<title>Fourthwall | IITB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/admin-acess.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
    <?php
        
             include 'nav-bar static.php'; 
            
            echo'


            <div class="tabpan">
             <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#sectionA">ADD Event</a></li>
                <li><a href="#sectionB">ADD Review</a></li>
                <li><a href="#sectionD">tf event</a></li>
                <li><a href="#sectionC">Allow Comments</a></li>
                
            </ul>
            
            <div class="tab-content">
                
                <div id="sectionA" class="tab-pane fade in active">
                    
                    <div class ="add_event">
                        <h2 class="head">Add an Event</h2>
                        <form  name="add_event_form" id="add-event-form" action="#" method="POST" role="form">
                                        <div id="add_event1">
                                                            
                                                            <div class="event-error alert alert-danger" style="display: none;">
                                                               <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Error!</strong> A problem has been occurred while submitting your data.
                                                            </div>

                                                            <div class="event-sucess alert alert-success" style="display: none;">
                                                                <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Success!</strong> Event has been added successfully.
                                                            </div>
                                                            
                                                            <div class="form-group"id="heading_grp" >
                                                                <label class="description" for="element_D_1">Heading </label>
                                                                <div>
                                                                    <input class="form-control " id="name" requird  name="name"  type="text" maxlength="255"  style="width:40%;" required x-webkit-speech/> 
                                                                </div> 
                                                            </div>  

                                                            <div class="form-group" id="desc_grp" >
                                                                <label class="description"  for="element_2">desc </label>
                                                                <div>
                                                                    <textarea class="form-control" required name="desc" id="short_story" rows="3" cols="50"  dir="auto" aria-label="  " required></textarea>
                                                                </div> 
                                                            </div>

                                                            <div class="form-group"id="long_story_grp" >
                                                                <label class="description" for="element_D_3" >Content </label>
                                                                <div>
                                                                    <textarea class="form-control" name="content" required rows="8" cols="50" id="long_story" dir="auto" aria-label="  " required></textarea>
                                                                </div> 
                                                            </div>

                                                            <!--
                                                            <div class="form-group"id="type_grp" >
                                                                <label class="description" for="element_D_3" >type </label>
                                                                <div>
                                                                    <select class="form-control" name="type" style="max-width:18em;">
                                                                        <option value="1" >Sophie Prod</option>
                                                                        <option value="2" >Freshiezzia</option>
                                                                        <option value="3" >Fourthwall orientiation</option>
                                                                    </select>
                                                                </div> 
                                                            </div>
                                                            -->

                                                            <div class="form-group"id="expiry_grp" >
                                                                <label class="description" for="element_D_4">Event date </label>
                                                                <div>
                                                                    <input  id="expiry_date"  name="dated"  type="date" required  /> 
                                                                    <span id="expiry_error" class="error"></span>
                                                                </div> 
                                                            </div> 
                                                            
                                                    
                                                            <br>
                                                            
                                                            <sdrt gfgtdiv class="form-group"id="li_6" >
                                                                <div>
                                                                    <input type="hidden" name="cat" value="events">
                                                                    <input type="submit" class="btn btn-primary"  id="add" value="Add">
                                                                </div>
                                                            </div> 
                        </form>
                                                        
                                                    </div>
                                                    <br>
                                                            <form id="event-upload-form" action="upload_file.php" method="post" enctype="multipart/form-data">
                                                                <div class="uploader form-group"  id="uniform-file" style="width:16em;">
                                                                  <label class="description">Select Image </label>
                                                                        <div id="file">
                                                                                <input type="file" class="form-control" name="file[]" required>
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="hidden" name="cat" value="events">
                                                                                
                                                                            </div>
                                                                </div>
                                                            </form>    
                                                        
                       
                    </div>

               
                
                <div id="sectionB" class="tab-pane fade">
                    <div class ="add_event">
                        <h2 class="head">Add an Review</h2>
                        <form  name="add_review_form" id="add-review-form" action="#" method="POST" role="form">
                                        <div id="add_event1">
                                                            
                                                            <div class="review-error alert alert-danger" style="display: none;">
                                                               <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Error!</strong> A problem has been occurred while submitting your data.
                                                            </div>

                                                            <div class="review-sucess alert alert-success" style="display: none;">
                                                                <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Success!</strong> Review has been added successfully.
                                                            </div>
                                                            
                                                            <div class="form-group"id="heading_grp" >
                                                                <label class="description" for="element_D_1">name </label>
                                                                <div>
                                                                    <input class="form-control " id="name"  name="name"  type="text" maxlength="50"  style="width:40%;" required x-webkit-speech/> 
                                                                </div> 
                                                            </div>  

                                                            <div class="form-group"id="heading_grp" >
                                                                <label class="description" for="element_D_1">Author </label>
                                                                <div>
                                                                    <input class="form-control " id="name"  name="author"  type="text" maxlength="50"  style="width:40%;" required x-webkit-speech/> 
                                                                </div> 
                                                            </div>  

                                                            

                                                            <div class="form-group"id="long_story_grp" >
                                                                <label class="description" for="element_D_3" >Content </label>
                                                                <div>
                                                                    <textarea class="form-control" name="content" rows="8" cols="50" id="long_story" dir="auto" aria-label="  " required></textarea>
                                                                </div> 
                                                            </div>

                                                            <div class="form-group"id="type_grp" >
                                                                <label class="description" for="element_D_3" >type </label>
                                                                <div>
                                                                    <select class="form-control" name="type" style="max-width:18em;">
                                                                        <option value="1" >Professional Plays</option>
                                                                        <option value="2" >Institute Plays</option>
                                                                        
                                                                    </select>
                                                                </div> 
                                                            </div>

                                                            <div class="form-group"id="expiry_grp" >
                                                                <label class="description" for="element_D_4">review date </label>
                                                                <div>
                                                                    <input  id="expiry_date"  name="dated"  type="date" required  /> 
                                                                    <span id="expiry_error" class="error"></span>
                                                                </div> 
                                                            </div> 
                                                            
                                                            
                                                            <br>
                                                            
                                                            <div class="form-group"id="li_6" >
                                                                <div>
                                                                    
                                                                    <input type="submit" class="btn btn-primary" style="min-width: 15em;" id="add" value="Add">
                                                                </div>
                                                            </div>
                                                    </form>
                                                     
                                                    </div>
                                                    <br>
                                                            <form role="form" id="review-upload-form" action="upload_file.php" method="post" enctype="multipart/form-data">
                                                                <div class="uploader form-group"  id="uniform-file" style="width:16em;">
                                                                    <label class="description">Select Image </label>
                                                                        <div id="file">
                                                                                <input type="file" class="form-control" name="file[]" required>
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="hidden" name="cat" value="reviews">
                                                                                
                                                                        </div>
                                                                </div>
                                                            </form>   
                        
                    </div>

                </div>

                <div id="sectionD" class="tab-pane fade">
                    
                    <div class ="add_event">
                        <h2 class="head">Add an TF Event</h2>
                        <form  name="add_tf_form" id="add-tf-form" action="#" method="POST" role="form">
                                        <div id="add_event1">
                                                            
                                                            <div class="tf-error alert alert-danger" style="display: none;">
                                                               <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Error!</strong> A problem has been occurred while submitting your data.
                                                            </div>

                                                            <div class="tf-sucess alert alert-success" style="display: none;">
                                                                <!--<a href="#" class="close" data-dismiss="alert">&times;</a>-->
                                                                <strong>Success!</strong> tf has been added successfully.
                                                            </div>
                                                            
                                                            <div class="form-group"id="heading_grp" >
                                                                <label class="description" for="element_D_1">Heading </label>
                                                                <div>
                                                                    <input class="form-control " id="name" requird  name="name"  type="text" maxlength="255"  style="width:40%;" required x-webkit-speech/> 
                                                                </div> 
                                                            </div>  

                                                            <div class="form-group" id="desc_grp" >
                                                                <label class="description"  for="element_2">desc </label>
                                                                <div>
                                                                    <textarea class="form-control" required name="desc" id="short_story" rows="3" cols="50"  dir="auto" aria-label="  " required></textarea>
                                                                </div> 
                                                            </div>

                                                            <div class="form-group"id="long_story_grp" >
                                                                <label class="description" for="element_D_3" >Content </label>
                                                                <div>
                                                                    <textarea class="form-control" name="content" required rows="8" cols="50" id="long_story" dir="auto" aria-label="  " required></textarea>
                                                                </div> 
                                                            </div>

                                                        <!-- <div class="form-group"id="type_grp" >
                                                                <label class="description" for="element_D_3" >type </label>
                                                                <div>
                                                                    <select class="form-control" name="type" style="max-width:18em;">
                                                                        <option value="1" >Sophie Prod</option>
                                                                        <option value="2" >Freshiezzia</option>
                                                                        <option value="3" >Fourthwall orientiation</option>
                                                                    </select>
                                                                </div> 
                                                            </div> -->

                                                            <div class="form-group"id="expiry_grp" >
                                                                <label class="description" for="element_D_4">Event date </label>
                                                                <div>
                                                                    <input  id="expiry_date"  name="dated"  type="date" required  /> 
                                                                    <span id="expiry_error" class="error"></span>
                                                                </div> 
                                                            </div> 
                                                            
                                                            <br>
                                                            
                                                            <div class="form-group"id="li_6" >
                                                                <div>
                                                                    <input type="hidden" name="cat" value="tf">
                                                                    <input type="submit" class="btn btn-primary"  id="add" value="Add">
                                                                </div>
                                                            </div> 
                        </form>
                                                        
                                                    </div>
                                                    <br>
                                                            <form id="tf-upload-form" action="upload_file.php" method="post" enctype="multipart/form-data">
                                                                <div class="uploader form-group"  id="uniform-file" style="width:16em;">
                                                                    <label class="description">Select Image </label>
                                                                        <div id="file">
                                                                                <input type="file" class="form-control" name="file[]" required>
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="file" class="form-control" name="file[]" >
                                                                                <input type="hidden" name="cat" value="tf">
                                                                                
                                                                            </div>
                                                                </div>
                                                            </form>    
                                                        
                       
                    </div>

                </div>

                
                <div id="sectionC" class="tab-pane fade">
                    <h3>Comments</h3>
                    ';

                    $con=mysqli_connect("localhost","root","","fourthwall");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                    $comments = mysqli_query($con,"SELECT * FROM comments WHERE status= -1") or die('cant fetch data');
                    }
                   // print_r($comments);
                    $cn=0;
                    foreach ($comments as $crow) {
                     //print_r($comment);
                     // $crow = mysqli_fetch_array($comment); 
                       // print_r($crow["status"]);
                        if ($crow["status"]== -1 ) {
                            $cn++;
                            echo '
                            <div class="panel panel-primary comment_panel">
                                <div class="panel-heading">
                                    <h1 class="panel-title">'.$crow["name"].'</h1>
                                </div>
                                <div class="panel-body">'.$crow["comment"].'
                                <br>
                                email:'.$crow["email"].'<br>
                                time:'.$crow["time"].'
                                </div> 
                                
                                <div class="panel-footer clearfix">
                                    <div class="pull-right">
                                        <input type="hidden" name="comment_id" value="'.$crow["id"].'">
                                        
                                        <a href="#" id="approv" class="btn btn-success approve">approve</a>
                                        <a href="#" class="btn btn-danger dont">Dont</a>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                if($cn==0){

                    echo'
                        <h4 style="left:5%;position:relative;">No comments for review</h4>
                    ';
                }
            
            echo '
                </div>
            
           </div>  
            </div> 
        </div>       
        <script  type="text/javascript">
        $(".approve").click(function(){
            $(this).parent().parent().parent().css("display","none");
            jQuery.ajax({
                url:"approve_comment.php",
                type:"POST",
                data:{id: $(this).siblings(":input").val() ,status:1},
              
              success:function(data){
               
                                    },
              error:function()
                {
                    alert("some error cant approve");
                }
            });
        });

        $(".dont").click(function(){
            $(this).parent().parent().parent().css("display","none");
            jQuery.ajax({
                url:"approve_comment.php",
                type:"POST",
                data:{id: $(this).siblings(":input").val() ,status:0},
              
              success:function(data){
               
                                    },
              error:function()
                {
                    alert("some error ");
                }
            });
        });

        </script>';
        echo '
    <div class="container">
        
            <a href="logout.php" class="btn btn-info btn-lg" style="width:200px;position: relative;left:39%">logout</a>
      
   </div>';

            
        include 'footer.php'; 
            
        //}
       mysqli_close($con);
    ?>

    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    <script type="text/javascript">
            $(document).ready(function(){ 
                $("#myTab a").click(function(e){
                    e.preventDefault();
                    $(this).tab("show");
                });
            });
    </script>
    
    <script type="text/javascript">
        
        function validate()
        {
            var h = document.forms["add_review_form"]["name"].value;
            var s = document.forms["add_review_form"]["author"].value;
            var l = document.forms["add_review_form"]["content"].value;
            
            document.forms["add_review_form"]["name"].value = h.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_review_form"]["author"].value = s.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_review_form"]["content"].value = l.replace(new RegExp("\'", 'g'), ' ');
        
            return true;
        }
        
        
        $("#add-review-form").submit(function(){

        if(validate()){

            jQuery.ajax({
                url:"add_review.php",
                type:"POST",
                data:$("#add-review-form").serializeArray(),
              
              success:function(data){
                 $("#review-upload-form").delay(300).submit();
                
                document.getElementById("add-review-form").reset();
                $('.review-sucess').css('display','block');
                $("html, body").animate({ scrollTop: 0 }, 300);
                                    },
              error:function()
                {   
                    $('.review-error').css('display','block');
                }
            });

            
            
        }
        
            //document.getElementById("add_form").reset();
            return false;
        });
        
    </script>

    <script type="text/javascript">
        
        function validate()
        {
            var h = document.forms["add_event_form"]["name"].value;
            var s = document.forms["add_event_form"]["desc"].value;
            var l = document.forms["add_event_form"]["content"].value;
            
            document.forms["add_event_form"]["name"].value = h.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_event_form"]["desc"].value = s.replace(new RegExp("\'", 'g'), ' ');
            l = l.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_event_form"]["content"].value = l.replace(new RegExp("\\n", 'g'), '<br>');
        
            return true;
        }
        
        
        $("#add-event-form").submit(function(){
            
        if(validate()){
          
            jQuery.ajax({
                url:"add_event.php",
                type:"POST",
                data:$("#add-event-form").serializeArray(),
              
              success:function(data){
                $("#event-upload-form").delay(300).submit();
                
                document.getElementById("add-event-form").reset();
                $('.event-sucess').css('display','block');
                $("html, body").animate({ scrollTop: 0 }, 300);
                                    },
              error:function()
                {
                    $('.event-error').css('display','block');
                }
            });

            
        }
        
            //document.getElementById("add_form").reset();
            return false;
        });
        
    </script>
 
 <script type="text/javascript">
        
        function validate()
        {
            var h = document.forms["add_tf_form"]["name"].value;
            var s = document.forms["add_tf_form"]["desc"].value;
            var l = document.forms["add_tf_form"]["content"].value;
            
            document.forms["add_tf_form"]["name"].value = h.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_tf_form"]["desc"].value = s.replace(new RegExp("\'", 'g'), ' ');
            l = l.replace(new RegExp("\'", 'g'), ' ');
            document.forms["add_tf_form"]["content"].value = l.replace(new RegExp("\\n", 'g'), '<br>');
        
            return true;
        }
        
        
        $("#add-tf-form").submit(function(){
            
        if(validate()){
          
            jQuery.ajax({
                url:"add_tf.php",
                type:"POST",
                data:$("#add-tf-form").serializeArray(),
              
              success:function(data){
                alert(data);
                $("#tf-upload-form").delay(300).submit();
                
                document.getElementById("add-tf-form").reset();
                $('.tf-sucess').css('display','block');
                $("html, body").animate({ scrollTop: 0 }, 300);
                                    },
              error:function()
                {
                    $('.tf-error').css('display','block');
                }
            });

            
        }
        
            //document.getElementById("add_form").reset();
            return false;
        });
        
    </script>

</body>
</html>