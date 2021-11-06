<?php 


  $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
  $user_row = mysqli_fetch_array($result);

  $regNo =  $user_row['regNo']; 
?>
<style>
  .w3-theme-d1
  {
    background-color:#795548 !important ;
  }
  .stu-nav-btn
{
  
  font-size: 15px;
  font-weight: 600;
  padding: 20px 0px 0px 0px;
  height:100px;
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
 
 font-size: 30px;
 margin-bottom:30px ;
 
}
.heading
{
  font-size:24px;
  font-weight:bold;
}
  </style>
<br>
<div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
        <h4 class="w3-center heading">Student Dashboard</h4>
         <!--p class="w3-center"><img src="../images/avatar6.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p-->
         <hr>
         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Name:</strong> <?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName'] ?> </p>
         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Reg:</strong> <?php echo $user_row['regNo'];  ?></p>

         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Course:</strong>  <?php echo $user_row['course']; ?></p >
        </div>
      </div>
      <br />


      <!-- new code -->

      <div class="w3-row-padding">
  <div class="w3-card-2 w3-round w3-col m4  " style="margin-bottom: 14px;">
    <div class="w3-white w3-animate-left">
      <a  href="projectidea.php">
        <button   class=" stu-nav-btn w3-btn-block  w3-center-align "  style="color: white !important;background-color:#EF3779">
          <i class="fa fa-tasks fa-fw w3-margin-right" style="color: white;"></i>
        PROJECT IDEA</button>
      </a>
        
    </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4 ">
    <div class="w3-white  w3-animate-right">
      <a href="pastproject.php">
      <button class=" stu-nav-btn w3-btn-block  w3-center-align"  style="color: white !important;background-color:#F39120"><i class="fa fa-file fa-fw w3-margin-right" style="color: white;"></i>
      PAST PROJECTS</button>
      </a>
      </div> 
      </div>
      <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
      <button onclick="myFunction('Demo1')" class=" stu-nav-btn w3-btn-block  w3-center-align" style="background-color:#74944A;"><i class="fa fa-file-o fa-fw w3-margin-right"></i>
     SYNOPSIS</button>
        <div id="Demo1" class="w3-hide w3-container">          
            <p>
              <?php 
              #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
              $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE studentid = '$regNo'") or die(mysqli_error());

              $concept_note = mysqli_fetch_array($studentconcept);
              $concept_num_row = mysqli_num_rows($studentconcept);
              if($concept_num_row > "0") {
                echo "You submitted a Synopsis. <br />";

                  $approval = $concept_note['approval'];

                  if($approval == 'approved') {
                    echo "It has been APPROVED.";
                  }
                  else if ($approval == 'disapproved') {
                    echo "It has been REJECTED";
                  ?>
                    <br />
                    <a href="conceptnote.php"><button class="w3-btn w3-btn-block w3-grey" >Submit Another Concept</button></a>
                    <br 
                <?php
                  }
                  else
                  {
                    echo "It is waiting approval";
                  }
                  

              } else {  ?>
                <br/>
                <a href="conceptnote.php"><button class="w3-btn w3-btn-block " >Submit Concept</button></a>
                <br />
              <?php } 
                
              ?>
            </p>
        </div>
      </div>
      </div>
    </div>
    <div class="w3-row-padding">
  <div class="w3-card-2 w3-round w3-col m4" style="margin-bottom: 14px;">
    <div class="w3-white  w3-animate-left">
      <button onclick="myFunction('Demo2')" class=" stu-nav-btn w3-btn-block w3-red w3-center-align " style="background-color:#F15A21;"><i class="fa fa-users fa-fw w3-margin-right"></i>
       GROUPS</button>
        <div id="Demo2" class="w3-hide w3-container">
           <?php 
            #$sqlgroup = "SELECT grpNo FROM members WHERE regNo='$get_user'";
            $sqlgrp = mysqli_query($dbcon, "SELECT grpNo FROM members WHERE regNo='$get_user'") or die(mysqli_error());
            $group_row = mysqli_fetch_array($sqlgrp);
            $num_row = mysqli_num_rows($sqlgrp);
            $groupNo = $group_row['grpNo'];


            if ($num_row > 0) {
              #var_dump($group_row);

              #$group_row =;
              echo "<p>Your group number is ". $group_row['grpNo'] . "</p>" ;
               $groupNo = $group_row['grpNo'];

              $supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
              $supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error());
              $sup_row = mysqli_fetch_array($supIdsql);

              $supervisor = $sup_row['fName']." ".$sup_row['lName'];
              echo "Your supervisor is ".$supervisor;
            } 
            else { ?>
              <br />
              <a href="suggestgroup.php"><button class="w3-btn w3-btn-block w3-grey" >Suggest Group</button></a>
              <br />
            <?php } 


            ?>
        </div>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
      <button onclick="myFunction('Demo3')" class=" stu-nav-btn w3-btn-block  w3-center-align" style="color: white !important;background-color:#00AFBA;"><i class="fa fa-file-o fa-fw w3-margin-right" style="color:white;" ></i>
      REPORT</button>
        <div id="Demo3" class="w3-hide w3-container">        
          <p>
              <a href="studentreports.php">
              <button class="w3-btn-block w3-grey w3-left-align" ><i class="fa fa-save fa-fw w3-margin-right"></i> View Submitted Report </button>
              </a>
          </p>
          <p>
            <a href="submitreport.php"><button class="w3-btn-block w3-grey w3-left-align" ><i class="fa fa-upload fa-fw w3-margin-right"></i> Upload New Report </button></a>
          </p>
      
      
        </div>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
    <a href="meetingdetails.php">
     <button class=" stu-nav-btn w3-btn-block w3-center-align" style="background-color:#8B7C66;"><i class="fa fa-file-text fa-fw w3-margin-right"></i>MEETINGS</button>
    </a>  
            
      </div>
      </div>
    </div>
    <div class="w3-row-padding "style="margin-bottom: 14px;">
    <div class="w3-card-2 w3-round w3-col m4  " style="margin-bottom: 14px;">
    <div class="w3-white w3-animate-left">
      <a  href="student-presentation-panel.php">
        <button   class=" stu-nav-btn w3-btn-block  w3-center-align "  style="color: white !important;background-color:#6F2C79">
          <i class="fa fa-users fa-fw w3-margin-right " style="color: white;"></i>
        PRESENTATION PANEL</button>
      </a>
        
    </div>
      </div>
<div class="w3-card-2 w3-round w3-col m4">
    <div class="w3-white  w3-animate-right">
    <a  href="marks.php">
     <button class=" stu-nav-btn w3-btn-block  w3-center-align"style="background-color: #129049">
       <i class="fa fa-file-text fa-fw w3-margin-right"></i> MARKS
      </button>
            </a>
      
      </div>
      </div>

     
    </div>
     
         
<script type="text/javascript">
     
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
  function loadSupervisors() {
  xhttp.open("GET", "../functions/supervisor.php", true);
    xhttp.send();
  }
  function studentReports() {
      xhttp.open("GET", "../functions/student-reports.php", true);
      xhttp.send();
  }
  function uploadReport() { 
  xhttp.open("GET", "submitreport.php", true);
    xhttp.send();
  }
  function submitConcept() {
  xhttp.open("GET", "conceptnote.php", true);
    xhttp.send();
  }
  function astorojects() {
  xhttp.open("GET", "pastprojects.php", true);
    xhttp.send();
  }
function suggestGroup() {
  xhttp.open("GET", "suggestgroup.php", true);
    xhttp.send();
  }
</script>