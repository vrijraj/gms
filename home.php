<?php
    include ("check.php");
?>
<?php
    error_reporting(0);
    //Select Number Books
    //Counting number row
   $sql="SELECT * FROM games_data";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      }

    //=====================================
    
    //Select Issued Books
    //Counting number row
   $sql="SELECT * FROM game_type";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowtype=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      }

  //=====================================

    //Select Books_cat
    //Counting number row
   $sql="SELECT * FROM games_cat";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowcat=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      } 

//=====================================

   
?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    <title>Home | vGMS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <style>
        
        html,
        body {
            
            height: 100%;
        }

    </style>
    

</head>

<body style="">

<!-- Navbar -->
<?php require 'nav.php';?>
<!-- Navbar -->
 
<br>
<!-- Heading -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5" style="background-color:;">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-home animated fadeInDown" aria-hidden="true"></i> Dashboard</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-5 hidden-sm-down" style="background-color:;">
            <img src="/gms/img/gms.png" class="pull-xs-right img-fluid" width="30%">
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Heading -->
          

    
    
    
<div class="container-fluid animated fadeInUp">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="margin-top:0%;padding:0px">
            <hr style="margin-bottom:.5%">
            <section class="col-md-12" style="padding:0px;background-color:white">
                <br>
               
                
                <!--        Slide Bar        -->
                <div class="row">
                    <div class="container-fluid">
                <!--First Tilr-->
                <!--  ==================================   -->
                 <div class="col-md-3" style="padding:0px;">
                    <a href="/gms/showgames" style="color:white">
                        <div class="card hoverable waves-effect hm-white-slight" style="background-color:#0099CC ;margin:3%;padding:3%;background-image:url('img/as.jpg')">
                            <section>
                                <header style="color:white"><h5>Total Games</h5></header>
                                <article><p style="color:white;font-size:28px;" class="center-block"> 

                                    <i class="fa fa-gamepad pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowcount; ?></p>
                                        <br>
                                    <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            </section>
                        </div>
                    </a>
                </div>
                <!--  ==================================   -->                        
                <!--Secont tile                    -->
                <!--  ==================================   -->
               <div class="col-md-3" style="padding:0px;">
                    <a href="/gms/showcat" style="color:white">
                    <div class="card hoverable waves-effect hm-white-slight" style="background-color:#0d47a1 ;margin:3%;padding:3%;background-image:url('img/leaves.jpg')">
                        <section>
                            <header style="color:white"><h5>Total Category</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-tasks pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowcat; ?></p>
                                <br>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                        </section>
                    </div>
                    </a>    
                </div>
                <!--  ==================================   -->                   
                <!--                    Third Tils-->
                <!--  ==================================   -->
                <div class="col-md-3" style="padding:0px;">
                    <a href="/gms/showplatform" style="color:white">
                    <div class="card hoverable waves-effect hm-white-slight" style="background-color:#ff8f00;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Total Game Platform</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-gitlab pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowtype; ?></p>
                                <br>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                        </section>
                    </div>
                    </a>    
                </div>
                <!--  ==================================   -->
                <!--  Forth Tile   -->              
               <div class="col-md-3" style="padding:0px;">
                   <a href="/gms/addGame" style="color:white">
                    <div class="card hoverable waves-effect hm-white-slight" style="background-color:#00b8d4 ;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Add Games</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-calendar-plus-o pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowissue; ?></p>
                                <br>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                        </section>
                    </div>
                    </a>    
                </div>
                <!--  ==================================   -->
                </div>  
                </div>
<!--                   =============================================================================-->
<!--                   ======== Row Complete  ================================================-->
                
                <div class="row">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:2%">
                                <hr>
                                <center><h3 class="h3-responsive">Video Games Management System</h3></center>
                                <hr>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:4%;padding-top:1%;padding-bottom:1%">
                                <center>
                                    <p style="font-size:120%"> Game Management System project can be use for those shopkeeper who are buying PCs,XBOX or Play Station videos Games. Our Project aims at making the task of managing the video games easy.Video Games Management is entering the records of new Games and retrieving the details of book available in the Video Games Stores.</p>
                                </center>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:2%">
                                <hr>
                            </div>
                        </div>
                        
                    </div>   
                </div>  
            </section>
                    
        </div>
        <div class="col-md-1"></div>               
        
    </div>
    
<!--   footer -->
        <?php include"footer.php";?>
<!--   footer -->
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>