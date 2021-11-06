<?php

if (!($_SESSION['id']) ){
header('location:../index.php');
exit();

}
?>



<div class="w3-card-2 w3-round w3-white">
        <div class="w3-center w3-container">
         <h4 class="">Coordinator Dashboard</h4>
         <hr>
         <p><i class="fa fa-person fa-fw "></i> Name: <?php echo "Syed Najam Ul Hassan" ?></p>
        </div>
      </div>
      <br>
        <!--Concept Notes -->
      <div class="w3-card-2 w3-round">
            <div class="w3-white">

            <?php 
            $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());

            $concept_note = mysqli_fetch_array($studentconcept);
            $concept_num_row = mysqli_num_rows($studentconcept);
            if($concept_num_row > "0") { ?>
                <a href="viewconcepts.php"><button class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i> Approve Synopsis</button></a>
                <?php } 
            else { 
                ?>
              <button class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i>No submitted synopsis.</button> <br />
            <?php
            } 
              
            ?> 
      
        </div>
      </div><br>
      <!-- approve groups -->
        <div class="w3-card-2 w3-round">
        <div class="w3-white ">  
              <a href="approve-groups.php"><button  class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Approve Groups</button></a>            
        </div>
      </div>
      <br />

      <!-- view groups -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <a href="groups.php"><button class="w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>View Groups </button></a>
          
          </div>
        </div>
        <br />

        <!-- assign supervisor -->
         <div class="w3-card-2 w3-round">
        <div class="w3-white">
               <a href="assign-supervisor.php"><button class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-user fa-fw w3-margin-right"></i> Assign Supervisors</button></a>
        </div>
      </div>
      <br /> 

      <!-- meeting reports -->
       <div class="w3-card-2 w3-round">
        <div class="w3-white">
               <a href="assign-for-presentation.php"><button class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-comments fa-fw w3-margin-right"></i> Assign for presention</button></a>
        </div>
      </div>
      <br /> 
      <!-- complete project -->
       <div class="w3-card-2 w3-round">
        <div class="w3-white">
               <a href="assign-supervisor.php"><button class="w3-btn w3-btn-block w3-dark-blue w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>Complete Project</button></a>
        </div>
      </div>
      <br /> 

<!-- project archive -->
     <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <a href="../search-projects.php"><button id="" class="w3-btn-block w3-dark-blue w3-left-align" ><i class="fa fa-file-text fa-fw w3-margin-right"></i> Project Archieve</button></a>
        </div>
      </div>
      <br>   

