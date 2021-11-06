
<?php

  if (!($_SESSION['id']) ){
  header('location:../index.php');
  exit();
}

  $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysql_error());
  $user_row = mysqli_fetch_array($result);
?>  
<style>
  .w3-btn-block
  {
    padding: 20px;
   
  }
  .w3-theme-d1
  {
    background-color: #795548 !important;
  }
</style>  
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Supervisor's Dashboard</h4>
         
         <hr>
         <p class="w3-center"> Name: <?php echo $user_row['fName']." ".$user_row['lName'] ?> </p>
         
        </div>
      </div>
      <br />
      <!-- gernalinfo -->
       <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-info-circle fa-fw w3-margin-right"></i>General Information</button>
          <div id="Demo3" class="w3-hide w3-container">
           <?php 
            $supId=$user_row['empId'] ;
          $grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error());
          $grouprows = mysqli_num_rows($grpsql) ;  
          echo "<p>You are supervising ".$grouprows." group(s). </p>";
        ?>
        </div>
          
          </div>
        </div>
        <br />

        <!-- SHARE PROJECT IDIEAS -->
        <div class="w3-card-2">
        <div class="w3-white">
          <a href="share-project-idea.php">
          <button  class="w3-btn-block w3-dark-blue w3-left-align">
            <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i>Share Project Ideas
          </button>
          </a>
        </div>
        </div></br>


        <!-- activities -->
           <div class="w3-card-2">
        <div class="w3-white">
          <button onclick="myFunction('Demo4')" class="w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-angle-double-right fa-fw w3-margin-right"></i>Ongoing Activities</button>
          <div id="Demo4" class="w3-hide w3-container">
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
        <br />

        
  