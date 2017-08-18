<?php
include ("check.php");
error_reporting(0);
$b=mysqli_real_escape_string($db,stripslashes($_GET['id']));

//echo $b;
	//Create customer select query
	$query ="SELECT GT_NAME FROM game_type WHERE GT_ID = $b";
    $result = $db->query($query) or die($mysqli->error.__LINE__);
	if($result = $db->query($query)){
        
		//Fetch object array
		while($row = $result->fetch_assoc()) {
			$a = $row['GT_NAME'];
		}
		//Free Result set
		$result->close();
	}
    else
    {
        echo "Invalid";
    }
?>


<?php
error_reporting(0);
	if(!empty($_POST['submit'])){
		//Assign GET Variable
		$id = $_GET['id'];
	
		//Assign Variables
		$bc_name =$_POST['b_cat_name'];
		
        if (!empty($id) and !empty($bc_name))
        {
            $query = "UPDATE game_type SET GT_NAME='$bc_name' WHERE GT_ID=$id";
            if (mysqli_query($db, $query)) {
                            $msg="Game Platform Successfully Updated";
                            header('Location: /gms/showplatform/'.urlencode($msg).'');
                            exit;
                } 
                else{
                          echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
                          echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                          <center> Error While Inserting!! <u>".mysqli_error($db)
                            ."<s/u><br>
                          <br><img src='/gms/img/error.png' width='10%'>
                          <h2 style='color:#880e4f '>Your can not Insert Duplicate Value</h2>
                          <a href='/gms/editplatform/".$id."'><button>Go Back</button></a> 
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
                <a href='/gms/editplatform/".$id."'><button>Go Back</button></a> 
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
    
    <title>Edit Category | vGMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-edit animated fadeInDown" aria-hidden="true"></i> Edit Games Platform</h4>
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
                    <a href=" /gms/showplatform" class="btn btn-default btn-sm" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Games Platform</a>
                </li>
            </ul>
        </div>
    </div>    
</div> 
<!-- Action Menu -->
<br>
          

<div class="container animated slideInUp">
    <div class="row">
        <div class="col-md-12 " style="margin-top:0%;"> 
           <div class="container z-depth-3" style="background-color:#fafafa">
                <div class="row" style="">
                    <div class="col-md-5 z-depth-3" style="padding:0%;background-color:#fafafa;color:whste">
                        <img src="/gms/img/bg.jpg" class="img-fluid" width="100%">
                         <center>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5 class="h5-responsive" style="margin:1%">Video Games Management System</h5>
                            
                            <hr>
                        </center>
                    </div>
                    <div class="col-md-7" style="padding:0%;background-color:;margin:0px;padding-top:3%">
                        
                    <form method="post" action="/gms/editplatform/<?php echo $b;?>"   style="background-color:;padding:4%">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:">
                                        <form-group>
                                            <label class="disabled" for="fbc" style="margin:0px">Game Platform ID</label>
                                            <input type="text" id="fbc" class="form-control" value="<?php echo $b ?>" disabled name="b_cat_id" style="margin-top:0px">
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Game Platform Name</label>
                                            <input type="text" value="<?php echo $a ?>" name="b_cat_name">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                       <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit" value="Save Book Category">Save Games Platform</button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <p style="font-size:80%;margin-bottom:.5%;color:#ff4444">* You cant not Update Platform Id. If you want to update platform Id then you need to grant Permission.</p>
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


    
    <script>
function myFunction() {
    window.print();
}
</script>
</body>

</html>