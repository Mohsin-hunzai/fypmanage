<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }
  

?>
<style>
  #main
  {
    background-color:#0F74A8 !important;
    margin-top:20px;
    padding-bottom:230px;
    margin-bottom:50px
  }
  </style>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:90%;margin-top:38px">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col m3 ">
      <div id="main">
        <div class="w3-row-padding  ">
          <div class="w3-col m12 ">
            
          </div>
        </div>
              
        <?php include '../functions/announcements.php'; ?>
      </div>
    </div>
    <!-- End Left Column -->
    
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <?php include 'stu-nav.php';     ?>
      <br />
    </div>  
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

