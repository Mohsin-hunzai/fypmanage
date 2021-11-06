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
    .tble-head
    {
        background-color:#795548;
        color:white;
    }
    </style>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <!-- <div id="main">                         -->
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">
                                <!-- <div class="w3-container w3-padding"> -->
                                    <h5 class="w3-center heading">PRESENTATION PANEL</h5>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">       
                                    <table class="w3-table w3-responsive w3-bordered">
                                        <thead>
                                        <tr class="tble-head">
                                            <th>Group Id</th>
                                            <th>Title</th>
                                            <th>Supervisor </th>
                                            <th>Date</th>
                                            <th>Grade</th>
                                         </tr>
                                        </thead>
                                            <?php 
                                                while($projectDetails=mysqli_fetch_array($pastprojects)) {
                                                    // $noteId = $concept_note['conceptid'];
                                                    // $approval = $concept_note['approval'];
                                                  ?>
                                          
                                        <tr>
                                        <td><?php echo $projectDetails['id']; ?></td>
                                        <td><?php echo $projectDetails['title']; ?> </td>
                                        <td><?php echo $projectDetails['students']; ?> </td>
                                        <td><?php echo $projectDetails['description']; ?></td>
                                        <td><?php echo $projectDetails['output']; ?></td>
                                       
                                        </tr>
                                        <?php } ?>
                                    </table>   
		            
                    
                                </div>
                            </div>
                        </div>
                    </div>
                
                    
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    

