<?php 

include '../dbcon.php';

//$role = $_SESSION['role'];
$supId  = $_SESSION['id'];

?>
<style>
  .stu-nav-btn
{
  
  font-size: 15px;
  font-weight: 600;
  padding:60px;
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
 
 font-size: 40px;
 margin-bottom:30px ;
 
}
.box{
  margin-bottom: 10px;
}
</style>


<div class="w3-row-padding">
  <!--   <div class="w3-col m6">     
      <div class="w3-card-2  ">
        <div class="w3-white w3-animate-left">
      <button onclick="myFunction('Demo1')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-users fa-fw w3-margin-right"></i><br>
       GENERAL INFORMATION</button>
        <div id="Demo1" class="w3-hide w3-container">
           <?php 
          $grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error());
          $grouprows = mysqli_num_rows($grpsql) ;   
          echo "<p>You are supervising ".$grouprows." group(s). </p>";
        ?>
        </div>
      </div>
    </div>
    </div> -->

    <!-- <div class="w3-col m6">     
      <div class="w3-card-2  ">
           <div class="w3-white w3-animate-left">
      <button onclick="myFunction('Demo2')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-users fa-fw w3-margin-right"></i><br>
       ONGOING ACTIVITIES</button>
        <div id="Demo2" class="w3-hide w3-container">
            <?php
               
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE supervisor = '$get_user'") or die(mysqli_error());
            $concept_num_row = mysqli_num_rows($studentconcept);

            if($concept_num_row > "0") { 
                 
                echo "<p>You have concept notes to review. </p>";
            } 
            else { 
                echo "You don't have any concept notes to review. <br />";
            } 

           
          ?>
        </div>
      </div>

       
          
        </div>
    </div> -->
</div> 

<!-- new -->
<div class="w3-row-padding box">
  <div class="w3-card-2 w3-round w3-col m4 ">
    <div class="w3-white w3-animate-left">
    <a href="supervisor-concepts.php">
      <button onclick="myFunction('Demo1')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-file fa-fw w3-margin-right"></i><br>
       APPROVED SYNOPSIS</button>
          </a>
        
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
    <a href="supervisor-groups.php">
      <button onclick="myFunction('Demo2')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-users fa-fw w3-margin-right"></i><br>
      APPROVED GROUPS</button>
      <a/>
      </div>
      </div>
       <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
    <a href="arrangemeeting.php">
      <button  class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-comments fa-fw w3-margin-right"></i><br>
      ARRANGE MEETING</button> </a>
       
      </div>
      </div>
    </div>

    <div class="w3-row-padding">
  <div class="w3-card-2 w3-round w3-col m4 ">
    <div class="w3-white w3-animate-left">
      <a href="meeting-attendance.php">
          <button  class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-copy fa-fw w3-margin-right"></i><br>
            MEETING ATTENDENCE  
          </button>
      </a>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
      <a href="check.php">
      <button onclick="myFunction('Demo5')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-folder fa-fw w3-margin-right"></i><br>
      SUBMITTED REPORTS</button>
          </a>
        <!-- <div id="Demo5" class="w3-hide w3-container">
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
        </div> -->
      </div>
      </div>
       <div class="w3-card-2 w3-round w3-col m4">
         <a>
    <div class="w3-white  w3-animate-right">
      <a href="presentation-panel.php">
      <button class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align"><i class="fa fa-columns fa-fw w3-margin-right"></i><br>
      PRESENTATION PANEL</button>
      </a>
     
      </div>
      </div>
    </div>










