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
    input{
        border:none;
    }
    input:hover{
        border:none;
    }
    input:focus{
        border:none;
    }
    #in{
        border:gray solid 1px;
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
                
                    <div class="w3-row-padding" style="margin-bottom: 50px;">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                  
                                    <table class="w3-table w3-responsive w3-bordered">
                                        <thead>
                                        <tr class="tble-head">
                                            <th>Group Id</th>
                                            <th>Title</th>
                                            <th>Supervisor Id </th>
                                            <th>Grade</th>
                                            <th>Approve</th>
                                         </tr>
                                        </thead>
                                            <?php 
                                             $sql="SELECT * FROM presetationpanel where `finalgrade`='pending'";
                                             $result=  mysqli_query($dbcon, $sql);
                                                while($row=mysqli_fetch_array($result)) {

                                                    $grpNo= $row['groupNo'];
                                                    $grptitle= $row['presentationTitle'];
                                                    $grpsup= $row['supId'];
                                                   ?>
                                          
                                        <tr>
                                        <form method="POST" action="marks.php"> 
                                        <td><input  name="grpNo" value="<?php echo $grpNo ?>" readonly></input></td>
                                        <td><input  name="tt" value="<?php echo $grptitle?>" readonly></input> </td>
                                        <td><input  name="grpsup" value="<?php echo $grpsup?>" readonly></input></td>
                                        <td><input id="in" type="text" name="grade" /></td>
                                        
                                        <td><?php 
                                            
                                            echo '<a href="marks.php?grptitle='.$grptitle.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 
                                        
                                        
                                        
                                        ?></td>
                                        </form>
                                        </tr>
                                       
                                        <?php } ?>
                                    </table>   
		            
                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    

