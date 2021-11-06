<div class="w3-container">
  <div class="w3-card-2">

    <?php
session_start();
    include '../dbcon.php';   
    $grpNo = $_POST['grpNo'];
    $dat = $_POST['dat'];
    $grptitle=$_POST['tt'];
    $grpsup=$_POST['grpsup'];
    $total=$_POST['total'];
    $newDate = date("Y-m-d", strtotime($dat));

    
    $sql= "INSERT INTO `presetationpanel` ( `groupNo`, `supId`, `presentationTitle`, `meetingattend`, `assigndate`, `internalgrade`, `finalgrade`) 
    VALUES ( '$grpNo','$grpsup', '$grptitle',  '$total', '$newDate','pending', 'pending');";
    mysqli_query($dbcon, $sql);
    if($sql) { 
      $updateasignpresentation = mysqli_query($dbcon, "UPDATE `presetationpanel` SET `assignpresentation` = 'yes' WHERE `groupNo` = '$grpNo'");
     
      echo "<script type='text/javascript'>alert('assign Presentation!');</script>";
      echo "<script>document.location='assign-for-presentation.php'</script>"; 
      } else { 
        echo "Something went wrong the Presention not assigned";                  
      } 
   
    ?>
  </div>
</div>