<?php
  include '../dbcon.php';
  include '../session.php';
  
  include '../header.php';
  $student = $_SESSION['id'];

?>
<style>
  .heading
  {
    font-size:24px;
    font-weight:bold;
  }
  </style>
    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
        <!-- The Grid -->
        <div class="w3-row">
            <div id="main">
                    
                <div class="w3-row-padding">
                <div class="w3-col m12">
                    <div class="w3-card-2 w3-white">
                    <div class="w3-container w3-padding">
                        <h5 class="w3-center heading">SUBMIT REPORT</h5>
                    </div>
                    </div>
                </div>
                </div>

            <br />
            
            <div class="w3-row-padding">
            <div class="w3-col m12">
                <div class="w3-card-2 w3-white">  
                <div class="w3-container w3-padding"> 

                <div class="w3-card-2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="" enctype="multipart/form-data">
              <br />
              <input type="file" name="report" class="w3-input" placeholder="Choose File" onchange="readURL(this)" required>
              <span id="reportname" class="w3-hide"></span>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="review" class="" required> Submit Proposal</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="chapterOne" class=""> Submit - Chapter 1 </label>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="chapterTwo" class="" > Submit - Chapter 2</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="progress-report" class="" > Submit - Progress Report </label>
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="chapterthree-four" class="" > Submit - Chapter 3-4-5</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="final-report" class="" > Submit - Final Report</label> 
              <br />

              <label class="w3-label"><input type="radio" name="report_type" value="presetation-report" class="" > Submit - Presentation</label> 
              <br />

              <br />
              <button type="" name="submit" onclick="" class="w3-padding w3-btn-block w3-dark-blue">Submit Report</button>
            </form>
		
        </div>
        </div>
                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
        </div> 
    </div>  


    <br>

    <!-- Footer -->


    <?php include '..\footer.php'; ?>
    
<?php
if (isset($_POST['submit'])) {

  //$report = $_POST['report'];
  $report_type = $_POST['report_type'];

//Fetch the project Id for insertion
  $groupsql = mysqli_query($dbcon, "SELECT grpNo FROM members WHERE regNo = '$student'");
  $groupArray = mysqli_fetch_array($groupsql);
  $groupNo = $groupArray['grpNo'];

  $projectsql = mysqli_query($dbcon, "SELECT projectId FROM project WHERE grpNo = '$groupNo'"); 
  $projectArray = mysqli_fetch_array($projectsql);
  $projectId = $projectArray['projectId'];

  if ($report_type == "review") {
  	include '../functions/review-reports.php';

  	$sql = "UPDATE `progressreport` SET review = '$target_file' WHERE projectId = $projectId";
  	$insert = mysqli_query($dbcon, $sql);

  } 
  else 
  {
  	include '../functions/finalsub-reports.php';

  	if ($report_type == "chapterOne") {
  		$sql = "UPDATE `progressreport` SET chapterOne = '$target_file' WHERE projectId = '$projectId'";
  	} 
  	if ($report_type == "chapterTwo") {
		$sql = "UPDATE `progressreport` SET chapterTwo = '$target_file' WHERE projectId = '$projectId'";
  	}
  	if ($report_type == "progress-report") {
  		$sql = "UPDATE `progressreport` SET progressReport = '$target_file' WHERE projectId = '$projectId'";
  	} 
  	if ($report_type == "chapterthree-four") {
		$sql = "UPDATE `progressreport` SET chapterThreeFour = '$target_file' WHERE projectId = '$projectId'";
  	}
  	if ($report_type == "final-report") {
		$sql = "UPDATE `progressreport` SET finalReport = '$target_file' WHERE projectId = '$projectId'";
  	}
  	if ($report_type == "presetation-report") {
		$sql = "UPDATE `progressreport` SET presetationReport = '$target_file' WHERE projectId = '$projectId'";
  	}

  	$insert = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
  	
  }
 
if (($insert = true) && ($uploadOk == 1)) { ?>
    <script>
    alert('Report Successfully Submitted.');
   window.location = 'index.php';
    </script>
  <?php 
  } else { var_dump($insert); var_dump($uploadOk); ?>
    
    <script>
    alert('Something went wrong your report was not submitted.');
//   window.location = 'index.php';
    </script>    
  <?php
 
      }

    } //isset Submit

  ?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#reportname').attr('src', e.target.result);
                    $('#reportname').addClass("w3-show")
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>



