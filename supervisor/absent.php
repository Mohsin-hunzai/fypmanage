<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$meeting = $_GET['meeting'];

      $meetingattendence = mysqli_query($dbcon, "SELECT * FROM meeting  ") or die(mysqli_error());
    	$attendence=mysqli_fetch_array($meetingattendence);
    	// $Attended = $attendence['Attended'];
      $Attended = "waiting";

    	if ($Attended =="waiting")
        {
          $disapprovesql = mysqli_query($dbcon, "UPDATE meeting SET Attended=0 WHERE meeting_id = '$meeting'") or die(mysqli_error($dbcon));
          if($disapprovesql) { 
            echo "<script type='text/javascript'>alert('missed the meeting!');</script>";
            
            } else { 
              echo "Something went wrong ";                  
            } 
            echo "<script>document.location='meeting-attendance.php'</script>";
        }
      elseif ($Attended ==1)  
        { 
          exit();
        }
      elseif ($Attended ==0) 
        { 
          exit();
        }
        else{
          echo "<script type='text/javascript'>alert('error');</script>";
        }
    ?>
  </div>
</div>
