




<style>
.w3-theme-d1
{
  background-color: #795548!important;
}

.stu-nav-btn
{
  
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 0.1em;
} 


</style>
<div class="w3-row-padding">
  <div class="w3-card-2 w3-round w3-col m6 ">
    <div class="w3-white w3-animate-left">
      <button onclick="myFunction('Demo1')" class=" stu-nav-btn w3-btn-block w3-dark-blue w3-center-align "><i class="fa fa-users fa-fw w3-margin-right"></i><br>
       GENERAL INFORMATION</button>
        <div id="Demo1" class="w3-hide w3-container">
          <?php 
           echo "<p>There are ".$grouprows." group(s). </p>";
           echo "<p>".$concept_num_row." synopsis have been submitted. </p>";
           echo "<p>There are ".$student_row." students in the system. </p>";
          ?>
        </div>
      </div>
      </div>

    </div>

