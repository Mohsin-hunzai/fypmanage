<!DOCTYPE html>
<head>
		<title>CoICT FYPMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" type="text/css" href="../styles/w3.css">
			<link rel="stylesheet" type="text/css" href="../styles/style.css">
			<link rel="stylesheet" type="text/css" href="../styles/w3-theme-blue-grey.css">
			<link rel="stylesheet" href="../fonts/font-awesome.min.css">
      < <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
.w3-bar{
  background-color:#0F74A8 !important;
  line-height: 30px;
}
.w3-theme-d4
{
  background-color:#0F74A8!important ;
}
.w3-theme-d4 i{
  font-size: 40px;

}
.w3-bar-item
{
 line-height: 20px;
}
.logo{
    height: 35px;
    width: 35px;
    border-radius: 50%;
    margin-left: 80px;
    margin-top:-20px;
}
.notifi-container{
  position: absolute;
    /* background-color: red; */
    right: 154px;
    margin-top: -47px;
    width:70px
}
.notifi-container ul:hover .glyphicon{
  /* background-color: black; */
  /* color:red;
  background-color:red; */
}
.nav-position{
      position: relative;
}

</style>


</head>
<?php 
  include 'session.php';
  include ('dbcon.php'); 
?>

<body class="w3-theme-l5" onload="">
<!-- Navbar -->
<div class="w3-top">
  
  
     
   
 <div class="w3-bar w3-blue w3-left-align w3-large w3-padding nav-position">
  <img class="logo" src="../images/download.jpg">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-small w3-hover-white w3-large " href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>

  <!-- RIGHT SIDE -->
    <a href="../logout.php" title="Logout"><button class="w3-bar-item w3-btn w3-small w3-hide-small w3-right w3-hover-white">Logout</button></a>
  <span onclick="loadUser()" class="w3-bar-item w3-button w3-hide-small w3-right w3-margin-right w3-hover-light-grey" title="My Account"><img src="../images/avatar.png" class="w3-circle" style="height:40px;width:40px" alt="Account" title="My Account"></span>
  <!-- <span onclick="notfication()" class="w3-bar-item w3-button w3-hide-small w3-right w3-margin-right w3-hover-light-grey" title="notification"><img src="../images/nc.jpg" class="w3-circle" style="height:30px;width:30px" alt="Account" title="notfication"></span> -->
<div class="container notifi-container">
<ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:28px;color:white;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
</div>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-navblock w3-blue w3-large w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
<ul class="w3-ul">
  <li onclick="loadUser()" class="w3-hover-white" title="My Account">My Account</li>
  
  <li class="w3-hover-white"><a class="" href="../logout.php"><i class="fa fa-user"></i> Logout</a></li>
</ul>

</div>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();

 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

