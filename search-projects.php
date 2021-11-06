<?php
  //include 'header.php';

?>
<!DOCTYPE html>
<html>
<head>
        <title>CoICT FYPMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="styles/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles/w3.css">
            <link rel="stylesheet" type="text/css" href="styles/style.css">
            <link rel="stylesheet" type="text/css" href="styles/w3-theme-blue-grey.css">
            <link rel="stylesheet" href="fonts/font-awesome.min.css">
    
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
.w3-large,.m3
{
  background-color:#0F74A8;
  color:white;
}
.btn{
  margin-left:60px;
  }
  img{
   margin-right:60px;
}
</style>

</head>
<body>
<div class="w3-top">
 <div class="w3-bar  w3-left-align w3-large w3-padding">
  <button class="w3-button w3-padding w3-white btn" onclick="goBack()"><i class="fa fa-arrow-left w3-margin-right"></i>Back</button>

  <!-- RIGHT SIDE -->
    
  <span onclick="loadUser()" class="w3-bar-item w3-button w3-hide-small w3-right w3-margin-right w3-hover-light-grey" title="My Account"><img src="images/avatar.png" class="w3-circle" style="height:40px;width:40px" alt="Account" title="My Account"></span>
 </div>
</div>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col m3  w3-padding">
      <?php 
        echo "<h2>Project Bank</h2>";   
        // echo "<h4 class=\"w3-col m12\">The Projects Archieve</h4>";  

      ?>
      <br />
    </div>    
    <!-- End Left Column -->
    
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
        <div class="w3-row-padding">
          <div class="w3-col m12">
<!-- *********************************************************************************************** -->
            <div class="w3-container">
              <div class="w3-card-2">



                <div class="search-box">
                    <input class="w3-input" type="text" autocomplete="off" placeholder="Search Project Title..." />
                    <div class="result"></div>
                </div>
              </div>
            </div>
<!-- *********************************************************************************************** -->
      
          </div>
        </div>
      </div>
    </div>
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d5 w3-center">
      <div class="w3-container">
        <p>&copy<?php $yr=getdate(date("U")); echo "$yr[year]";   ?> KIU - All Rights Reserved. </p>
      </div>
</footer>
<script>
function goBack() {
    window.history.back();
}
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>