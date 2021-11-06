<?php
    include '../dbcon.php';
    include '../session.php';
    
    include '../header.php';
    $regNo = $_SESSION['id'];
    $grpNo = $_SESSION['id'];


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
                <div id="main">                        
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding">
                                    <h5 class="w3-center heading">MEETING DETAILS</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">     
             
        
        <table  border="1" align="center" width=90% bgcolor="gray">
            <?php
                echo "<tr>";
                echo "<th>"."Meeting ID"."</th>";
                echo "<th></th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th></th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th></th>";
                echo "<th>"."Date"."</th>";
                echo "<th></th>";
                echo "<th>"."Time"."</th>";
                echo "<th></th>";
                echo "<th>"."Description"."</th>";
                echo "<th></th>";
                echo "<th>"."Attended"."</th>";
                echo "</tr>";
                        // $grpnum="SELECT `grpNo` FROM `grp` WHERE `regNO`='$regNo'";
                        $studentgroup = mysqli_query($dbcon, "SELECT * FROM grp WHERE  `regNo`= '$regNo' || `mRegNo`='$regNo' ") or die(mysql_error());
                        $grp_row = mysqli_fetch_array($studentgroup);
                        $gr = $grp_row['grpNo'];

                        // $gr=54;
                        $sql1="SELECT * from meeting WHERE `grpNo`=$gr";
                        $rec=mysqli_query($dbcon, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                           $atnd=$std['Attended'];
                            echo "<td>".$std['meeting_id']."<td/>";
                            echo "<td>".$std['empId']."<td/>"; 
                            echo "<td>".$regNo."<td/>"; 
                            echo "<td>".$std['date']."<td/>"; 
                            echo "<td>".$std['time']."<td/>"; 
                            echo "<td>".$std['description']."<td/>"; 
                            // echo "<td>".$std['Attended']."<td/>"; 
                            
                            ?> 
                        <td>
			      <?php

					if ($atnd =="waiting") {
				         		
                         echo "Pending";
					
					} elseif ($atnd =="1")  
			        { 
                        echo "attended";
			        }
			      elseif ($atnd ==0) 
			        { 
			              echo "missed";
			        }  
			      ?>
				  </td> </tr> <?php 
                        }
            ?>
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
    
