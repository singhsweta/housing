
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
<div class="container-fluid">


    <!-- Page Content -->
   


        <div class="header">
            <h1 class="col-md-offset-1">Notices</h1>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">

                

                       <?php 
                $query = "SELECT * FROM notice WHERE notice_status = 'Approved'";
                $ret_notice = mysqli_query($con, $query);
                
                    while($row = mysqli_fetch_array($ret_notice)) {
                        $notice_title = $row['notice_title'];
                        $notice_body = $row['notice_body'];

                        echo "<div class='well'>";

                        echo "<tr>";
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr><th>".$notice_title."</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "<tr><td>".$notice_body."</td></tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        
                    }

               
             ?> 
                    
                
                </div>                
            </div>

        </div>
        <!-- /.row -->

        <hr>

   <?php include("includes/footer.php"); ?>     