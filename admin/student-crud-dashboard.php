<?php
 include '../header.php';   
    if (!($_SESSION['id']) ){
    header('location:../student/index.php');
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
.heading
{
  font-size:24px;
  font-weight:bold;
}
  </style>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
  <!-- The Grid -->
    <div class="w3-row-padding">
                  <div class="w3-col m12">
                      <div class="w3-card-2 w3-white">
                      <div class="w3-container w3-padding">
                          <h5 class="w3-center heading">STUDENT</h5>
                      </div>
                      </div>
                  </div>
                  </div>
  <div class="w3-row-padding w3-margin-top">
  <div class="w3-card-2 w3-round w3-col m4  " style="margin-bottom: 14px;">
    <div class="w3-white w3-animate-left">
      <a  href="create-student.php">
      <button   class=" stu-nav-btn w3-btn-block w3-center-align "  style="color: white !important;background-color:#6F2C79">
        <i class="fa fa-pencil fa-fw w3-margin-right " style="color: white;"></i><br>
       CREATE </button>
</a>
        
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4 ">
    <div class="w3-white  w3-animate-right">
      <a href="update-student.php">
      <button class=" stu-nav-btn w3-btn-block  w3-center-align"  style="color: white !important;background-color:#F44336"><i class="fa fa-edit fa-fw w3-margin-right" style="color: white;"></i><br>
      EDIT </button>
      </a>
      </div>
      </div>
      <div class="w3-card-2 w3-round w3-col m4  " style="margin-bottom: 14px;">
    <div class="w3-white w3-animate-left">
      <a  href="delete-student.php">
      <button   class=" stu-nav-btn w3-btn-block  w3-center-align "  style="color: white !important;background-color:#129049;">
        <i class="fa fa-eraser fa-fw w3-margin-right " style="color: white;"></i><br>
       DELETE </button>
</a>
        
      </div>
      </div>
      
  </div>
 
</div>  
  



<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

