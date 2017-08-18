<?php
include ("check.php");
error_reporting(0);
//error_reporting(0);
//Getting Game Catergory
$query ="SELECT GC_NAME,GC_ID FROM games_cat";
//Get results
$result = $db->query($query) or die($mysqli->error.__LINE__);


//query for GMAE SIZE LIST name
$query1 ="SELECT GSD_NAME,GSD_ID FROM games_size_data";
//Get results
$result1 = $db->query($query1) or die($mysqli->error.__LINE__);


//query for GMAE TYPE LIST name
$query6 ="SELECT GT_NAME,GT_ID FROM game_type";
//Get results
$result6 = $db->query($query6) or die($mysqli->error.__LINE__);

//================================================================================

$b=$_GET['id'];

//echo $b;
	//Create customer select query
	$query2 ="SELECT G_NAME,G_SIZE,GC_ID,GSD_ID,GT_ID FROM games_data WHERE G_ID = $b";
    $result2 = $db->query($query2) or die($mysqli->error.__LINE__);
	if($result2 = $db->query($query2)){
		//Fetch object array
		while($row = $result2->fetch_assoc()) {
			$X = $row['G_NAME'];
            $Y = $row['G_SIZE'];
            $p = $row['GC_ID'];
            $q = $row['GSD_ID'];
            $r = $row['GT_ID'];
		}
		//Free Result set
		$result2->close();
	}
?>


<?php
error_reporting(0);
    //error_reporting(0);
    //Getting Book Category
	$query3 ="SELECT GC_NAME FROM games_cat WHERE GC_ID = $p";
    $result3 = $db->query($query3) or die($mysqli->error.__LINE__);
	if($result3 = $db->query($query3)){
		//Fetch object array
		while($row = $result3->fetch_assoc()) {
			$Book_cat_name = $row['GC_NAME'];
		}
		//Free Result set
		$result3->close();
	}


    //Getting Book Author
    $query4 ="SELECT 
                GSD_NAME FROM games_size_data WHERE GSD_ID = $q";
    $result4 = $db->query($query4) or die($mysqli->error.__LINE__);
	if($result4 = $db->query($query4)){
		//Fetch object array
		while($row = $result4->fetch_assoc()) {
			$Book_auth = $row['GSD_NAME'];
		}
		//Free Result set
		$result4->close();
    }

    //Getting Games Type Name
    $query5 ="SELECT GT_NAME FROM game_type WHERE GT_ID = $r";
    $result5 = $db->query($query5) or die($mysqli->error.__LINE__);
	if($result5 = $db->query($query5)){
		//Fetch object array
		while($row = $result5->fetch_assoc()) {
			$GT_NAME = $row['GT_NAME'];
		}
		//Free Result set
		$result5->close();
    }
?>

<!--Updation Script-->
<?php
error_reporting(0);
	if($_POST){
		//Assign GET Variable
		$id = $_GET['id'];
	    
		//Assign Variables
	echo	$g_name =$_POST['g_name']; echo "<br>";
     echo   $g_size =$_POST['g_size']; echo "<br>";
      echo  $g_size_unit =$_POST['g_size_unit']; echo "<br>";
      echo  $gc_id =$_POST['gc_name']; echo "<br>";
        echo    $gt_id =$_POST['gt_name']; echo "<br>";
        

        if (!empty($g_name) and !empty($g_size) and !empty($g_size_unit) and !empty($gc_id) and !empty($gt_id))
		{
            $query = "UPDATE games_data SET G_NAME='$g_name', G_SIZE='$g_size',GSD_ID=$g_size_unit, GC_ID=$gc_id,GT_ID=$gt_id WHERE G_ID=$id";
            if (mysqli_query($db, $query)) {
                            $msg="Game Successfully Updated";
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
                          <a href='/gms/editGame/".$id."'><button>Go Back</button></a> 
                          </div></center>";
                          echo "<center>";
                          die("<h3>Duplicated value Can not be Inserted</h3>");
                          echo "</center> ";
                    }
        }
        else
        {
                echo"<center><h2 style='margin-top:5%;color:#1a237e'>Error</h2></center>";
                echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                <center> Error While Updating!! " // mysqli_error($db).
                    ."<br>
                <br><img src='/gms/img/error.png' width='10%'>
                <h2 style='color:#880e4f '>Your can not Update Null Value</h2>
                <a href='/gms/editGame/".$id."'><button>Go Back</button></a> 
                </div></center>";
                    echo "<center>";
                    die("<h3>Empty Data Can not be Updated</h3>");
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
    
    <title>Edit Games | vGMS</title>
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
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6" style="background-color:;">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-edit animated fadeInDown" aria-hidden="true"></i> Edit Games</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-6 hidden-sm-down" style="background-color:;">
            <img src="/gms/img/gms.png" class="pull-xs-right img-fluid" width="30%">
        </div>
    </div>
    <hr style="margin:0.2%" class="no-print">
</div>
<!-- Heading -->
    
<br>
<!-- Action Menu -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <a href="/gms/showbooks" class="btn btn-default btn-sm" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Games</a>
                </li>
            </ul>
        </div>
    </div>    
</div> 
<!-- Action Menu -->
<br>
    
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="">
           <div class="container z-depth-3"> 
                <div class="row" style="">
                     <div class="col-md-5 waves-effect z-depth-3" style="padding:0%;background-color:#0099CC;color:white">
                        <img src="/gms/img/editg.jpg" class="img-fluid hidden-sm-down" width="100%">
                        <img src="/gms/img/editg.jpg" class="img-fluid hidden-md-up" width="100%">
                         <center class="fluid hidden-sm-down">
                            <br style="margin-bottom:.5%">
                            <p style="font-size:130%;margin-top:0px"><i class="fa fa-edit" style="" aria-hidden="true"></i> Edit Book </p>
                            <h5 class="h5-responsive hidden-sm-down" style="margin:1%">Library Management System</h5>
                            <br class="hidden-sm-down">
                            <hr class="hidden-sm-down">
                        </center>
                    </div>
                    
                    <div class="col-md-7" style="padding:0%;background-color:;margin:0px;padding-top:3%">
                        <form method="post" action="/gms/editGame/<?php echo $b;?>"   style="background-color:;padding:4%">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:">
                                        <form-group>
                                            <label class="disabled" for="as">Game ID</label>
                                            <input type="text" id="as" value="<?php echo $b ?>" disabled name="b_id" >
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Game Name</label>
                                            <input type="text" value="<?php echo $X ?>" name="g_name">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-5 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Game Size</label>
                                            <input type="text" value="<?php echo $Y ?>" step="0.1" name="g_size">
                                        </form-group>
                                    </div>
                                    
                                    <div class="col-md-5 " style="background-color:;margin-top:%">
                                        <form-group>
                                            <br>
                                            <label>Size Unit</label><br>
                                            <select class="mdb-select" name="g_size_unit">
                                                <option value="<?php echo $q; ?>" selected><?php echo $Book_auth  ?></option>
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
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%">
                                        <form-group>
                                            <br>
                                            <label>Game Category</label><br>
                                            <select class="mdb-select" name="gc_name">
                                                <option value="<?php echo $p; ?>" selected><?php echo $Book_cat_name;?></option>
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
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%">
                                        <form-group>
                                            <br>
                                            <label>Game Type</label><br>
                                            <select class="mdb-select" name="gt_name">
                                                <option value="<?php echo $r; ?>" selected><?php echo $GT_NAME;?></option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result6->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result6->fetch_assoc()){

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
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                       <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Update Games</button>
                                    </div>
                                </div>
                                
                                 <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%;color:">
                                       <p style="font-size:80%;margin-bottom:.5%;color:#ff4444">* You can not Update Game Id. If you want to update Game Id then you need to grant Permission.</p>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </form>
                        
                    </div>
                    
               </div> 
               
               
           </div>
                
                  
        </div>
    </div>                  
</div>
    

<!--  Footer  -->
    <?php include"footer.php"; ?>
<!--  Footer  -->
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