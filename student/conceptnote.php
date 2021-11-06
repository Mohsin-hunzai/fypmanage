<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }

    $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
  $user_row = mysqli_fetch_array($result);

  $regNo =  $user_row['regNo']; 
?>
<style>
  h5
  {
    font-weight: 800;
    font-family: sans-serif;
    font-size:24px;
  }
  .m4{
    font-size:15px;
    font-weight:bold;
  }
  .btn{
   font-weight:bold;
   font-size:15px;
   background-color:#0F74A8 !important;
  }
  </style>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:90%;margin-top:80px;margin-bottom:50px;">    
  <!-- The Grid -->
  <div class="w3-row">
      <div id="main">
              
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <div class="w3-card-2 w3-white">
                <div class="w3-container w3-padding">
                  <h5 class="w3-center">SUBMIT SYNOPSIS</h5>
                </div>
              </div>
            </div>
          </div>

        <br />
      
       <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">  
            <div class="w3-container w3-padding"> 

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >
              <br />

              <div class="w3-row">
                <div class="w3-col m4">Proposed Title 
                </div>
                <div class="w3-col m8">
                  <input type="text" name="title" class="w3-input" placeholder="Proposed Title" >
                </div>
              </div><br />

              
              <div class="w3-row">
                <div class="w3-col m4">Project/Research</div>
                <div class="w3-col m8">
                  <select class="w3-select" name="prorearch">           
                     <option>Project</option>; 
                     <option >Research</option>; 
                    
                  </select>
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Expected Output   </div>
                <div class="w3-col m8">
                      <input type="text" name="exout" class="w3-input" placeholder="Expected Output eg. Mobile app, Web app etc" >
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Propose a Supervisor </div>
                <div class="w3-col m8">
                  <select class="w3-select" name="propsup">
                  <option value="" >Propose A Supervisor</option>
                    <?php
                      $result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysql_error());
                      while ($user_row = mysqli_fetch_array($result)) {
                      $supervisor = $user_row['empId'];
                      $expertise = $user_row['expertise'];
 
                      echo "<option value=".$supervisor.">".$user_row['fName']." ".$user_row['lName']."</option>"; 
                    } ?>
                  </select>
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Upload Synopsis </div>
                <div class="w3-col m8">
                    <input type="file" name="concept" class="w3-input" >
                </div>
              </div><br />

              <div class="w3-center">
                <button type="submit" name="submit" class="w3-padding w3-btn w3-blue btn">Submit Synopsis</button>
              </div>            
            </form>

            <?php
              if (isset($_POST['submit'])) {
/*
                $propsupervisor = mysqli_real_escape_string($_POST['propsup']);
                $proptitle = mysqli_real_escape_string($_POST['title']);
                $expectedoutput = mysqli_real_escape_string($_POST['exout']);*/

                $propsupervisor = $_POST['propsup'];
                $prorearch = $_POST['prorearch'];
                $proptitle = $_POST['title'];
                $expectedoutput = $_POST['exout'];

                  include 'upload.php';

                  $sql = "INSERT INTO conceptnote(studentid, proposedtitle,Synopsis, expectedoutput, conceptfile, supervisor, reccomended, approval, time) VALUES ('$regNo', '$proptitle','$prorearch', '$expectedoutput', '$target_file','$propsupervisor',' ','waiting',now())";

                  $insert = mysqli_query($dbcon, $sql);

                if (($insert == true) && ($uploadOk == 1)) { ?>
                  <script>
                  alert('Synopsis Note Successfully Submitted.');
                //  window.location = 'index.php';
                 
                  </script>
                <?php 
                } else {  ?>
                  
                  <script>
                  alert('SYNOPSIS not Submitted. Fill All fields');
                // window.location = 'index.php';
                  </script>    
                <?php
               
                    }

              } //isset Submit

            ?>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

