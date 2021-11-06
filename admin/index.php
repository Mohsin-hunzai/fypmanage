<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }
  

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
  padding: 60px;
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
 
}
  </style>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:90%;margin-top:100px">    
  <!-- The Grid -->
  
  <div class="w3-row-padding w3-margin-top ">
  <div class="w3-card-2 w3-round w3-col m4 " style="margin-bottom: 14px;">
    <div class="w3-white w3-animate-left">
      <a  href="supervisor-crud-dashboard.php">
      <button   class=" stu-nav-btn w3-btn-block w3-purple w3-center-align "  style="color: white !important;background-color:#6F2C79 !important">
        <i class="fa fa-users fa-fw w3-margin-right " style="color: white;"></i><br>
        SUPERVISOR </button>
</a>
        
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4 ">
    <div class="w3-white  w3-animate-right">
      <a href="student-crud-dashboard.php">
      
      <button class=" stu-nav-btn w3-btn-block w3-green w3-center-align"  style="color: white !important;background-color:#129049 !important"><i class="fa fa-user fa-fw w3-margin-right" style="color: white;"></i><br>
      STUDENT</button>
      </a>
      </div>

      </div>
      <div class="w3-card-2 w3-round w3-col m4 ">
        <div class="w3-white  w3-animate-right">
        <a href="coordinator-external.php">
        
         <button class=" stu-nav-btn w3-btn-block  w3-center-align"  style="color: white !important;background-color:#F44336 !important"><i class="fa fa-user fa-fw w3-margin-right" style="color: white;"></i><br>
          COORDINATOR</button>
        </a>
      </div>

  </div>

  <!-- End Grid -->
</div>  
</div>
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

