<?php
include ("check.php");

?>

<?php
	if($_POST){
		//Assign Variables
        error_reporting(0);
		$bc_name =$_POST['b_cat_name'];
        
        if (!empty($bc_name)) {
		//Create customer update
		$query ="INSERT INTO games_cat (GC_NAME) VALUES ('$bc_name')";
                 if (mysqli_query($db, $query)) {
                            $msg="New Games Category Successfully Added";
                            header('Location: /gms/showcat/'.urlencode($msg).'');
                            exit;
                } 
                else{
                         //echo "Error updating record: " . mysqli_error($db);
                          echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
                          echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                          <center> Error While Inserting!! <u>".mysqli_error($db)
                            ."</u><br>
                          <br><img src='/gms/img/error.png' width='10%'>
                          <h2 style='color:#880e4f '>Your can not Insert Duplicate Value</h2>
                          <a href='/gms/addCat'><button>Go Back</button></a> 
                          </div></center>";
                            echo "<center>";
                            die("<h3>Duplicated value Can not be Inserted</h3>");
                            echo "</center> ";
                    }
        }
        else {
		      echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
              echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
              <center> Error While Inserting!! ".mysqli_error($db)
                ."<br>
            <br><img src='img/error.png' width='10%'>
            <h2 style='color:#880e4f '>Your can not Insert Null Value</h2>
            <a href='/gms/addCat'><button>Go Back</button></a> 
            </div></center>";
                echo "<center>";
                die("<h3>Empty Data Can not be Inserted</h3>");
                echo "</center> ";
            }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Add Game Category | vGMS</title>
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-calendar-plus-o animated fadeInDown" aria-hidden="true"></i> Add Games Category</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-5 hidden-sm-down" style="background-color:;">
            <img src="/gms/img/gms.png" class="pull-xs-right img-fluid" width="30%">
        </div>
        <div class="col-md-1"></div>
    </div>
    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <hr style="margin:0.2%" class="no-print">
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Heading -->
    
    <br>
<!-- Action Menu -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <a href="/gms/showcat" class="btn btn-default " style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Games Category</a>
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>
    
</div> 
<!-- Action Menu -->
<br>
    
    
<!-- Main Content -->
<div class="container-fluid animated fadeInUp">
    <div class="row" >
        <div class="col-md-1"></div>
        <div class="col-md-10" style="background-color:">
            <div class="container-fluid z-depth-3" style="background-color:#fafafa ">
                <div class="row">
                    
                    <div class="col-md-3 z-depth-2  waves-effect" style="padding:0px;background-color:#0099CC;color:white">
                        <img src="/gms/img/bg1.jpg" class="img-fluid">
                        <center>
                            <br>
                            <h5 class="h5-responsive" style="margin:1%">Video Games Management System</h5>
                            <hr>
                        </center>
                    </div>
                    
                    <div class="col-md-9" style="background-color:#fafafa ">
                        <br>
                        <br>
                        <br class="hidden-xs-down">
                        <div class="container">
                            <form action="/gms/addCat" method="post" style="background-color:;padding:0%">
                            <div class="row">
                                <div class="col-md-12">
                                    <form-group>
                                            <label style="">Game Category Name</label>
                                            <input style="" type="text" placeholder="Enter Book Category Name" name="b_cat_name">
                                    </form-group>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Save Game Category</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Main Content -->
    
    
    


<!-- Footer -->
    <?php include "footer.php"; ?>
<!-- Footer -->
    
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="/gms/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/gms/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/gms/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/gms/js/mdb.min.js"></script>

</body>

</html>