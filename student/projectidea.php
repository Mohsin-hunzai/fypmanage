<?php
		include '../dbcon.php';
        include '../header.php';
		session_start();
		$get_user = $_SESSION['id'];

        $projectidea = mysqli_query($dbcon, "SELECT * FROM projectidea ") or die(mysqli_error());

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
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px ;margin-bottom:50px;">    
            <!-- The Grid -->
            <div class="w3-row">
                <div id="main">                        
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding">
                                    <h5 class="w3-center heading">Project Ideas</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">       
                                    <table class="w3-table w3-hoverable w3-responsive w3-bordered">
                                        <thead>
                                        <tr class="tble-head">
                                        <th> Project S.no</th>
                                            <th>Supervisor Id</th>
                                            <th>Supervisor Name</th>
                                            <th>Project Title</th>
                                            <th>Description</th>
                                        
                                        </tr>
                                        </thead>
                                            <?php 
                                                while($idea=mysqli_fetch_array($projectidea)) {
                                                    // $noteId = $concept_note['conceptid'];
                                                    // $approval = $concept_note['approval'];
                                                  ?>
                                          
                                        <tr>
                                        <td><?php echo $idea['ideaId']; ?></td>
                                        <td><?php echo $idea['supervisorId']; ?> </td>
                                        <td><?php echo $idea['supervisorName']; ?></td>
                                        <td><?php echo $idea['title']; ?></td>
                                        <td><?php echo $idea['description']; ?></td>
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
    

