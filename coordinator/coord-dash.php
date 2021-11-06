<?php 

include '../dbcon.php';


//$role = $_SESSION['role'];
$supId  = $_SESSION['id'];
    $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
    $concept_num_row = mysqli_num_rows($studentconcept);
    $concept_array = mysqli_fetch_array($studentconcept);

    $grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error());
    $grouprows = mysqli_num_rows($grpsql) ; 

    $result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysql_error());
  //$user_row = mysqli_fetch_array($result);
    $student_row = mysqli_num_rows($result);

?>
<style>
.w3-theme-d1
{
  background-color: #795548!important;
  
}
.group{
  margin-bottom:50px;
}

.stu-nav-btn
{
  
  font-size: 15px;
  font-weight: 600;
  padding: 40px;
  letter-spacing: 0.1em;
  transition: all .2s ease-in-out;
 
   

 }
 .stu-nav-btn:hover
 {
  background-color: #795548;
  transform: scale(1.04); 
   filter: brightness(100%);
   

 }
 .stu-nav-btn i{
 
 font-size: 60px;
 margin-bottom:30px ;
  box-shadow: 0 8px 16px 0 rgb(10 0 0 / 20%), 0 6px 20px 0 rgb(10 0 0 / 19%);


 
}
.box{
  margin-bottom: 10px;
}






</style>
<div class="w3-row-padding box">
  <div class="w3-card-2 w3-round w3-col m6 ">
    <div class="w3-white w3-animate-left">
      <button onclick="myFunction('Demo1')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-info-circle fa-fw  w3-margin-right"></i><br>
       GENERAL INFORMATION</button>
        <div id="Demo1" class="w3-hide w3-container">
          <?php 
           echo "<p>There are ".$grouprows." group(s). </p>";
           echo "<p>".$concept_num_row." synopsis have been submitted. </p>";
           echo "<p>There are ".$student_row." students in the system. </p>";
          ?>
        </div>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m6">
    <div class="w3-white  w3-animate-right">
      <button onclick="myFunction('Demo2')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-tasks fa-fw w3-margin-right"></i><br>
      PROJECTS</button>
        <div id="Demo2" class="w3-hide w3-container">
            <?php
             if($concept_num_row > "0") { 
              $reccomendation = $concept_array['reccomended'];
              $approval = $concept_array['reccomended'];

              if (($reccomendation="yes") && ($approval="waiting")) {
                
                echo "<p>There are several synopsis to be reviewed  </p>";
              } else {
                
                echo "<p>All synopsis have been reviewed. </p>";
              }
              } 
            else { 
                echo "<p>There are no submitted synopsis </p>";
            } 
          ?>
        </div>
      </div>
      </div>
    </div>
    <div class="w3-row-padding">
  <div class="w3-card-2 w3-round w3-col m6 group">
    <div class="w3-white  w3-animate-left">
      <button onclick="myFunction('Demo3')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-users fa-fw w3-margin-right"></i><br>
       GROUPS &amp; USERS</button>
        <div id="Demo3" class="w3-hide w3-container">
          <?php 
           echo "<p>There are ".$grouprows." group(s). </p>";
           echo "<p>".$concept_num_row." synopsis have been submitted. </p>";
           echo "<p>There are ".$student_row." students in the system. </p>";
          ?>
        </div>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m6">
    <div class="w3-white  w3-animate-right">
      <button onclick="myFunction('Demo4')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-file fa-fw w3-margin-right"></i><br>
      EVALUATION</button>
        <div id="Demo4" class="w3-hide w3-container">
         
         
          <?php
            
                echo "<p>Evaluation Activities havent been scheduled yet. </p>";
            
          ?>
      
      
        </div>
      </div>
      </div>
    </div>
