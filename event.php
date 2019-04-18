
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    <div class="container-fluid" style="background-image: url('images/');background-repeat: no-repeat;background-size: cover;">



    <!-- Page Content -->
    <div class="container-fluid">


        <div class="header">
            <h1 class="col-md-offset-1">Events</h1>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">

                

                       <?php 
                $query = "SELECT * FROM event WHERE event_status = 'Approved'";
                $ret_event = mysqli_query($con, $query);
                
                    while($row = mysqli_fetch_array($ret_event)) {
                        $event_title = $row['event_title'];
                        $event_body = $row['event_body'];
                        $event_date = $row['event_date'];
                        $event_dur = $row['event_dur'];
                        $event_address = $row['event_address'];

                        echo "<div class='well'>";

                        echo "<tr>";
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr><th>".$event_title."</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "<tr><td>".$event_date."</td></tr>";
                            echo "<tr><td>".$event_dur."</td></tr>";
                            echo "<tr><td>".$event_address."</td></tr>";
                            echo "<tr><td>".$event_body."</td></tr>";
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