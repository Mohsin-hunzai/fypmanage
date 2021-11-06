    <?php
    include '../dbcon.php';
    include '../session.php';
    
    include '../header.php';
    $student = $_SESSION['id'];

    ?>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <!-- <div id="main">                         -->
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">
                                <!-- <div class="w3-container w3-padding"> -->
                                    <h5 class="w3-center heading">SUBMIT REPORT</h5>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">  
                                <!-- <div class="w3-container w3-padding">                   
                    
                                </div> -->
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    

