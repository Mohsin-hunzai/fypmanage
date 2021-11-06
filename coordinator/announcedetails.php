<?php
  include '../dbcon.php';
  include '../header.php';

  if (!($_SESSION['id']) ){
// header('location:../index.php');
exit();

}

$get_user = $_SESSION['id'];

#$sql = "SELECT * FROM student WHERE regNo = $get_user";
$result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error());
$user_row = mysqli_fetch_array($result);
?>
<style>
    .m3
    {
        background-color:#0F74A8;
        padding: 30px;
    }
    .card
        {
                background-color:#0F74A8 !important;
                color:white;
        }
        .card-head
        {
                background-color:#0F74A8 ;
                color:white;
                
        }
        h6
        {
                font-size:14px;
        }
</style>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <?php
        include 'coord-nav.php';
      ?>
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
      
        <div class="w3-row-padding">
          <div class="w3-col m12">    
            <?php include 'announce.php'; ?> 
            
         </div>
        </div> 
    <br />
        <div class="w3-row-padding">
          <div class="w3-col m12">     
            <!-- include '../functions/annoucementdelete.php';  -->
            <?php 
$sql = "SELECT * FROM announcement  WHERE `postBy`='$get_user' ORDER BY time DESC ";

$result = mysqli_query($dbcon,$sql) or die(mysqli_error());;
$row = mysqli_fetch_array($result);
do {
?>


<div class="w3-container w3-card-2  w3-round w3-margin card"><br>

        <span class="w3-right w3-opacity"><?php echo "Posted at ".$row['time'] ;?></span>
        <h4><?php echo $row['title'];?></h4>
        <p><?php echo $row['description']; 
        ?></p>
          <form action="" method="POST" >

<button style="background-color:#0F74A8;" onclick="delete()" type="submit"  class=" w3-btn "  name="delete" ><i class="fa fa-pencil"></i>  delete</button> 
</form>
        
 </div>
 
 <?php
  } while ($row = mysqli_fetch_array($result));
  
 ?>
         </div>
        </div> 
        </div>
        
      </div>
      
    <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>


<script>
  function delete(){
   <?php 
    $delete = mysqli_query($dbcon, "DELETE FROM `announcement` WHERE `announcement`.`id` = $get_user ") or die(mysqli_error($dbcon));
   ?>
  }
     var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
function loadDoc() {
  xhttp.open("GET", "../supervisor.php", true);
    xhttp.send();
  }
    
  

function manageStudents() {
    xhttp.open("GET", "../functions/manage-student.php", true);
    xhttp.send();
  }
</script>
<!-- Footer -->
<?php
  include '../footer.php';
?>

</body>
</html> 
