<div class="w3-container">
  <div class="w3-card-2">

    <?php

    include '../dbcon.php';   
    $meeting = $_GET['meeting'];
        
    $meetingattendance = mysqli_query($dbcon, "SELECT * FROM meeting WHERE meeting_id=$meeting ") or die(mysqli_error());
    $attendence=mysqli_fetch_array($meetingattendance);
    $Attended = $attendence['Attended'];
      echo "databaseconneted";
    	if ($Attended =="waiting")
      {
        // $atendsql = mysqli_query($dbcon, "UPDATE meeting SET Attended='attended' WHERE meeting_id = '$meeting'") or die(mysqli_error($dbcon));
        $atendsql = mysqli_query($dbcon, "UPDATE `meeting` SET `Attended` = '1' WHERE `meeting`.`meeting_id` = $meeting");
          if($atendsql) { 
            echo "<script type='text/javascript'>alert('meeting attended!');</script>";
            } else { 
              echo "Something went wrong the meeting was not approved";                  
            } 
            echo "<script>document.location='meeting-attendance.php'</script>";            
        }
      elseif ($Attended =="1")  
        { 
               exit();
        }
      elseif ($Attended ==0) 
        { 
              exit();
        }
    ?>
  </div>
</div>