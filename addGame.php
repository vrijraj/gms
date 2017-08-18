<?php
include ("check.php");
error_reporting(0);
//query for Book Category
$query ="SELECT 
			 GC_NAME,
             GC_ID
			 FROM games_cat ORDER BY GC_NAME";
	//Get results
	$result = $db->query($query) or die($mysqli->error.__LINE__);

//query for author name
$query1 ="SELECT 
			 GSD_NAME,
             GSD_ID
			 FROM games_size_data";
	//Get results
	$result1 = $db->query($query1) or die($mysqli->error.__LINE__);

// Query for Game Type
$query2="SELECT GT_ID,GT_NAME FROM game_type";
//Get results
$result2 = $db->query($query2) or die($mysqli->error.__LINE__);


?>
<?php
	if($_POST){
        error_reporting(0);
		//Assign Variables
        $g_name =$_POST['g_name'];
        $g_size =$_POST['g_size'];
        $g_size_unit =$_POST['g_size_unit'];
        $gc_id =$_POST['gc_name'];
        $gt_id =$_POST['gt_name'];
		
	   
        if (!empty($g_name) and !empty($g_size) and !empty($g_size_unit) and !empty($gc_id)) {
		//Create customer update
		$query="INSERT INTO `games_data`(`G_NAME`, `GC_ID`, `G_SIZE`, `GSD_ID`,`GT_ID`) VALUES ('$g_name',$gc_id,$g_size,$g_size_unit,$gt_id)";
                 if (mysqli_query($db, $query)) {
                            $msg="New Games Successfully Added";
                            echo $msg;
                            header('Location: /gms/showgames/'.urlencode($msg).'');
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
                          <a href='/gms/addGame'><button>Go Back</button></a> 
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
            <br><img src='/gms/img/error.png' width='10%'>
            <h2 style='color:#880e4f '>Your can not Insert Null Value</h2>
            <a href='/gms/addGame'><button>Go Back</button></a> 
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
    
    <title>Add Games | vGMS</title>
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/gms/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/gms/css/mdb.min.css" rel="stylesheet">
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-calendar-plus-o animated fadeInDown" aria-hidden="true"></i> Add Games</h4>
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
                    <a href="/gms/showgames" class="btn btn-default" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Games</a>
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
                        <img src="/gms/img/editg.jpg" class="img-fluid hidden-sm-down" height="50%">
                        <img src="/gms/img/lib.jpg" class="img-fluid hidden-md-up" height="50%">
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
                            <form action="/gms/addGame" method="post" style="background-color:;padding:0%">
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <form-group>
                                            <label style="">Game Name</label>
                                            <input style="" type="text" placeholder="Enter Game Name" name="g_name">
                                    </form-group>
                                </div>
                            </div>
                             
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <form-group>
                                            <label style="">Game Size</label>
                                            <input style="" step="0.1" type="number" placeholder="Enter Game Size" name="g_size">
                                    </form-group>
                                </div>
                                
                                <div class="col-md-6">
                                    <form-group>
                                            
                                            <label>Game Size Unit</label><br>
                                            <select class="mdb-select" name="g_size_unit">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result1->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result1->fetch_assoc()){

                                                            $output='<option value='.$row['GSD_ID'].'>'.$row['GSD_NAME'].'</option>';
                                                                 echo $output;
                                                             }
                                                    } else {
                                                        echo "Sorry, no customers were found";
                                                    }
                                                    ?>
                                            </select>     
                                    </form-group>
                                </div>
                            </div>
                              
                        
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <form-group>
                                            <br>
                                            <label>Game Category</label><br>
                                            <select class="mdb-select" name="gc_name">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result->fetch_assoc()){

                                                            $output='<option value='.$row['GC_ID'].'>'.$row['GC_NAME'].'</option>';
                                                                 echo $output;
                                                             }
                                                    } else {
                                                        echo "Sorry, no customers were found";
                                                    }
                                                    ?>
                                    
                                            </select>     
                                    </form-group>
                                </div> 
                            </div>
                                
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <form-group>
                                            <br>
                                            <label>Game Type</label><br>
                                            <select class="mdb-select" name="gt_name">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result2->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result2->fetch_assoc()){

                                                            $output='<option value='.$row['GT_ID'].'>'.$row['GT_NAME'].'</option>';
                                                                 echo $output;
                                                             }
                                                    } else {
                                                        echo "Sorry, no customers were found";
                                                    }
                                                    ?>
                                    
                                            </select>     
                                    </form-group>
                                </div> 
                            </div>
                             
                                
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Save Game Category</button>
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
    

    
<!-- footer -->
    <?php include"footer.php"; ?>
<!-- footer -->
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


    
    <script>
function myFunction() {
    window.print();
}
</script>
</body>

</html>