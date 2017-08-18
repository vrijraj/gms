<?php
    include ("check.php");
?>



<?php
error_reporting(0);
    //Personal Setting
	if (!empty($_POST['submit-per'])){
       // error_reporting(0);
		//Assign Variables
		$username =$_POST['uname'];
		$last_name =$_POST['lname'];
        $email =$_POST['email'];
	
        if (!empty($username) and !empty($last_name) and !empty($email) and !empty($id)) {
		//Create customer update
		$query="UPDATE `admin_data` SET `ad_fname`='$username',`ad_lname`='$last_name',`ad_email`='$email' WHERE ad_id=$id";
                 if (mysqli_query($db, $query)) {
                            $msg="Profile Successfully Updated";
                            echo $msg;
                            header('Location: /gms/profile/'.urlencode($msg).'');
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
                          <a href='/gms/profile'><button>Go Back</button></a> 
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
            <h2 style='color:#880e4f '>Your can not Insert Null Value ss</h2>
            <a href='/gms/profile'><button>Go Back</button></a> 
            </div></center>";
                echo "<center>";
                die("<h3>Empty Data Can not be Inserted</h3>");
                echo "</center> ";
            }
    }
?>

<?php
error_reporting(0);
    //pass setting
	if (!empty($_POST['submit-pass']))
    {
        //error_reporting(0);
		//Assign Variables
		$current_pass =md5(mysqli_real_escape_string($db,stripslashes($_POST['cpass'])));
		$new_pass =$_POST['npass'];
        $confirm_pass =$_POST['conpass'];
        
        if($new_pass==$confirm_pass)
        {
            //Query for getting password
            $query ="SELECT ad_id FROM admin_data where ad_pass='$current_pass'";
            $result = $db->query($query) or die($db->error.__LINE__);
            if($result = $db->query($query)){
                //Fetch object array
                while($row = $result->fetch_assoc()) {
                    $pas_id = $row['ad_id'];
                    echo $pas_id;
                }
                
                if($id==$pas_id)
                {       $new_pass =md5(mysqli_real_escape_string($db,stripslashes($_POST['npass'])));
                        $query = "UPDATE admin_data SET ad_pass='$new_pass' WHERE ad_id=$id";
                        if (mysqli_query($db, $query)) {
                                $msg="Password Successfully Updated";
                                header('Location: /gms/profile/'.urlencode($msg).'');
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
                              <a href='/gms/profile'><button>Go Back</button></a> 
                              </div></center>";
                              echo "<center>";
                              die("<h3>Duplicated value Can not be Inserted</h3>");
                              echo "</center> ";
                        }
                }
                else
                {
                    echo"<script>alert('Password is not valid')</script>";
                }
            }
            else
            {
                echo "<script>alert('Password Not Found')</script>";
            }
            
        }
        else
        {
            echo "<script>alert('New password not same')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Manage Profile | vGMS</title>
    <link rel="shortcut icon" href="/gms/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/gms/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/gms/css/mdb.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Coustom JS    -->
    <script>
        function asd()
        {
        document.getElementById('hide-on').style.display='none';
            
        }
        function pop()
        {
            confirm("Are u want to Delete ?");
        }  
    </script>
    <script>
    $(document).ready(function(){
        
        $("#section_pass").hide();
       
        // First Button
        $('#perb').on('click', function(){
            $('#section_pass').hide().removeClass("animated fadeIn");
            $('#section_per').show().addClass("animated fadeIn");
            $('#perb').addClass("active");
            $('#chgpass').removeClass("active");
            
            
        });
        //S Secound Button
        $('#chgpass').on('click', function(){
            $('#section_per').hide().removeClass("animated fadeIn");
            $('#section_pass').show().addClass("animated fadeIn");
            $('#chgpass').addClass("active");
            $('#perb').removeClass("active");
        });
    });
    </script>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-modx animated fadeInDown" aria-hidden="true"></i> Manage Profile</h4>
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

<!-- Get Notification Showing data -->
<div class="container-fluid animated flipInX">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($_GET['msg'])){
			echo '<div id="hide-on" class="msg card no-print" style="background-color:#00C851;color:white;padding:.5%;opacity:0.8"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;'.$_GET['msg'].'   
           <button type="button" class="close" aria-label="Close" onclick="asd()">
  <span aria-hidden="true">&times;</span>
</button></div>';
            }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Get Notification Showing data -->
    
    
<!-- Manage Content -->
<div class="container-fluid animated fadeInUp">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="">
            <div class="container-fluid z-depth-3" style="background-color:#fafafa ">
                <div class="row">
                    
                    <div class="col-md-3 z-depth-3" style="padding:2%;background-color:#cfd8dc">
                        <br>
                        <img src="<?php echo $profile_image ?>" class="img-thumbnail center-block" width="80%">
                        <hr>
                        <center><h4 style=""><?php echo $login_user." ".$lname; ?></h4></center>
                        
                         <hr>
                        <button style="margin-left:0px;color:whit" type="button" class="btn btn-block btn-sm btn-info waves-effect active" id="perb"><i class="fa fa-user left"></i> Personal Setting</button>
                                    
                        <button style="margin-left:0px;color:whit" id="chgpass" type="button" class="btn btn-block btn-sm btn-info waves-effect"><i class="fa fa-lock left"></i> Change Password</button>
                        <br>
                        <hr>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="container">
                            <div class="row">
                                <!--       Personal Setting    -->
                                <div class="col-md-12" style="margin-top:3%;margin-bottom:2%;background-color:;color:whit" id="section_per">
                                    <div class="container">
                                       <form method="post" action="/gms/profile">
                                        <div class="row">
                                            <div class="col-md-12" style="padding:1%;background-color:transparent">
                                                <h4><i class="fa fa-user" aria-hidden="true"></i> Personal Setting</h4>
                                                <hr style="color:whit;background-color:whit;height:.1px">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                <p style="font-size:12px;color:whit;margin:0px">
                                                    <b>Username :</b></p>
                                                <input type="text" required value="<?php echo $login_user; ?>" name="uname" >
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                <p style="font-size:12px;color:whit;margin:0px">
                                                    <b>Last Name :</b></p>
                                                <input type="text" required value="<?php echo $lname; ?>" name="lname" > 
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                <p style="font-size:12px;color:whit;margin:0px">
                                                    <b>Email :</b></p>
                                                <input type="text" required value="<?php echo $email_id; ?>" name="email" > 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                <button type="submit" class="btn btn-success" style="margin-left:0px" name="submit-per"
                                                        value="Save My Account">Save My Account</button>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12" style="padding:1%">
                                                <hr>
                                            </div>
                                        </div>
                                        
                                        </form> 
                                    </div>
                                </div>
                                <!--       Personal Setting    -->
                                
                                <!--       Password Setting    -->
                                <div class="col-md-12" style="margin-top:2%;color:whit" id="section_pass">
                                    <div class="container">
                                       <form method="post" action="/gms/profile" >
                                            <div class="row">
                                                <div class="col-md-12" style="padding:1%;background-color:">
                                                    <h4><i class="fa fa-lock" aria-hidden="true"></i> Change Password</h4>
                                                    <hr style="color:whit;background-color:whit;height:.1px">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                    <p style="font-size:12px;color:#880e4f;margin:0px;color:whit">
                                                        <b>Current Passowrd :</b></p>
                                                    <input type="text" required placeholder="Enter Current Password" name="cpass">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                    <p style="font-size:12px;color:#880e4f;margin:0px;color:whit">
                                                        <b>New Password :</b></p>
                                                    <input type="text" required placeholder="Enter New Password" name="npass">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                    <p style="font-size:12px;color:#880e4f;margin:0px;color:whit">
                                                        <b>Confirm Password :</b></p>
                                                    <input type="text" required required placeholder="Enter Confirm Password" name="conpass" > 
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2" style="padding:.5%">
                                                    <button type="submit" class="btn btn-success" style="margin-left:0px" name="submit-pass" value="Change My Password">Change My Password</button>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" style="padding:1%">
                                                    <hr>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <!--       Password Setting    -->
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>  
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- Manage Content -->
    
    
<!-- footer -->
    <?php include "footer.php";?>
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


</body>

</html>