
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>


    <!-- Page Content -->
    <div class="container">

        <div class="header">
            <h1 class="col-md-offset-1">Gallery</h1>
        </div>
        <hr>

        <div class="row">
            
            <?php 
                $query = "SELECT * FROM gallery WHERE pstatus = 'Approved'";
                $ret_event = mysqli_query($con, $query);
        
                while($row = mysqli_fetch_array($ret_event)) {
                    $ptitle = $row['ptitle'];
                    $pfile = $row['pfile'];
                    echo "<img class='img col-md-3 img-responsive img-thumbnail' width='500px' height='300px' src='images/$pfile'  alt='{$ptitle}'>";
                } 
            ?>                   
        </div>


   <?php include("includes/footer.php"); ?>
   