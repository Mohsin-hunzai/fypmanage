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
   text-transform:uppercase;
 }
    </style>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">           
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">
                                    <h5 class="w3-center heading">PRESENTATION PANEL</h5>
                                
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row "style="margin-left:15px">
                    <div class="w3-card-2 w3-round w3-col m4 " style="margin-bottom: 14px;width:8%";>
                      <div class=" w3-animate-left">
                        <a  href="internal-presentation.php">
                            <button   class=" stu-nav-btn w3-btn w3-center-align padding-large"  style="color: white !important;background-color:#6F2C79">
                            <i class="fa fa-columns fa-fw w3-margin-right " style="color: white;"></i><br>
                            INTERNAL</button>
                        </a>
                                                
                      </div>
                    </div>
                        <div class="w3-card-2 w3-round w3-col m4 " style="margin-bottom: 14px;width:8%">
                            <div class="w3-white  w3-animate-right">
                            <a href="external-presentation.php">
                        
                            <button class=" stu-nav-btn w3-btn  w3-center-align padding-large"  style="color: white !important;background-color:#129049"><i class="fa fa-columns fa-fw w3-margin-right" style="color: white;"></i><br>
                            EXTERNAL</button>
                            </a>
                        </div>

      
                         </div>
                </div>
     
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">  

                               
                            </div>
                        </div>
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    


    

