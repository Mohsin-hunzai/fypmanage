<div class="w3-container">
  <div class="w3-card-2">

    <?php
session_start();
    include '../dbcon.php';   
    $grpNo = $_POST['grpNo'];
    $grade = $_POST['grade'];
   

    
    // $sql= "INSERT INTO `presetationpanel` ( `groupNo`, `supId`, `presentationTitle`, `meetingattend`, `assigndate`, `internalgrade`, `finalgrade`) 
    // VALUES ( '$grpNo','$grpsup', '$grptitle',  '$total', '$newDate','pending', 'pending');";
    // mysqli_query($dbcon, $sql);
   
      $updateasignpresentation = mysqli_query($dbcon, "UPDATE `presetationpanel` SET `finalgrade` = '$grade' WHERE `groupNo` = '$grpNo'");
     
      echo "<script type='text/javascript'>alert('assign Presentation!');</script>";
      echo "<script>document.location='index.php'</script>"; 
     
   
    ?>
  </div>
</div>