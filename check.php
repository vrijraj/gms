<?php
include('connection.php');
session_start();
$user_check=$_SESSION['email'];

$ses_sql =mysqli_query($db,"SELECT 
ad_fname,
ad_lname,
ad_avatar,
ad_email,
ad_id
FROM admin_data WHERE ad_email='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['ad_fname'];
$profile_image=$row['ad_avatar'];
$lname=$row['ad_lname'];
$id=$row['ad_id'];
$email_id=$row['ad_email'];

if(!isset($user_check))
{
header("Location: index.php");
}
?>