<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$studentid = $_GET['studentid'];
        
      $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote where `studentid`='$studentid' ") or die(mysqli_error());
    	$concept_note=mysqli_fetch_array($studentconcept);
    	$reccomended = $concept_note['reccomended'];

    	if ($reccomended =="")
        {
          $disapprovesql = mysqli_query($dbcon, "UPDATE conceptnote SET reccomended='no' WHERE studentid = '$studentid'") or die(mysqli_error($dbcon));
          if($disapprovesql) { 
            echo "<script type='text/javascript'>alert('recomend Group is rejected!');</script>";
            
            } else { 
              echo "Something went wrong ";                  
            } 
            echo "<script>document.location='supervisor-concepts.php'</script>";
        }
      elseif ($reccomended =="yes")  
        { 
               exit();
        }
      elseif ($reccomended =="no") 
        { 
              exit();
        }
    ?>
  </div>
</div>
