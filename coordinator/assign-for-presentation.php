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
    </style>

        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">                       
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">
                                    <h5 class="w3-center heading">ASSIGN FOR PRESENTATION</h5>
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
                                            <th>Meeting Attended</th>
                                            <th>Assign Date</th>
                                            <th>Approve</th>
                                         </tr>
                                        </thead>
                                            <?php 
                                             $sql="SELECT * FROM grp";
                                             $result=  mysqli_query($dbcon, $sql);
                                                while($row=mysqli_fetch_array($result)) {

                                                    $grpNo= $row['grpNo'];
                                                    $grptitle= $row['title'];
                                                    $grpsup= $row['empId'];
                                                    $meetingattend= mysqli_query($dbcon, "SELECT SUM(`Attended`) as count From `meeting` WHERE empId=$grpsup AND grpNo=$grpNo");
                                                    $total = 0;
                                                    $rec =  mysqli_fetch_assoc($meetingattend);
                                                    $total = $rec['count'];  
                                                   ?>
                                          
                                        <tr>
                                        <form method="POST" action="approve-asign-presentaion.php"> 
                                        <td><input  name="grpNo" value="<?php echo $grpNo= $row['grpNo']; ?>" readonly></input></td>
                                        <td><input  name="tt" value="<?php echo $grptitle?>" readonly></input> </td>
                                        <td><input  name="grpsup" value="<?php echo $grpsup?>" readonly></input></td>
                                        <td>
                                            <input  name="total" value="<?php echo $total?>" readonly></input>
                                        </td>
                                        <td><input id="in" type="date" name="dat" /></td>
                                        
                                        <td><?php 
                                        $assignforpresentation = mysqli_query($dbcon, "SELECT * FROM presetationpanel WHERE groupNo=$grpNo") or die(mysqli_error());
                                        $assign=mysqli_fetch_array($assignforpresentation);
                                        $testpresentation = $assign['assignpresentation'];
                                        if ($testpresentation =="yes")  
                                        { 
                                            echo "assigned prestation";
                                        }
                                        else{
                                            
                                            echo '<a href="approve-asign-presentaion.php?grptitle='.$grptitle.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 
                                        }
                                        
                                        
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
    

