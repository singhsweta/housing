
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>


    <?php 

        if(!isset($_SESSION['mem_name'])) {
            header("Location: login.php");
        }

     ?>

    <?php 



     ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="header">
            <h1 class="text-center">Complaints</h1>
        </div>
        <hr>

        <div class="col-md-10 col-md-offset-1">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        if(isset($_SESSION['mem_id'])) {
                            $mem_email = $_SESSION['mem_email'];
                        }

                        $query = "SELECT * FROM complaint WHERE com_email = '$mem_email' and com_status = 'Queried' OR com_status = 'Responsed' OR com_status = 'Resolved'";
                        $ret_com = mysqli_query($con, $query);
                        if(!$ret_com) {

                            die(mysqli_error($con));
                        }
                        while ($row = mysqli_fetch_array($ret_com)) {
                            $com_id = $row['com_id'];
                            $com_name = $row['com_name'];
                            $com_title = $row['com_title'];
                            $com_mess = $row['com_msg'];
                            $com_status = $row['com_status'];

                            echo "<tr>";
                                echo "<td>".$com_name."</td>";
                                echo "<td>".$com_title."</td>";
                                echo "<td>".$com_mess."</td>";
                                echo "<td><b>".$com_status."</b></td>";
                                echo "<td><a href='check_status.php?delete={$com_id}' class='btn btn-primary'>Delete</a></td>";
                            echo "</tr>";
                        }

                     ?>
                </tbody>
            </table>
            
        </div>                


<?php 

    if(isset($_GET['delete'])) {
        $the_com_id = $_GET['delete'];
        $query = "DELETE FROM complaint WHERE com_id = ".mysqli_real_escape_string($con,$the_com_id);
        $del_notice = mysqli_query($con, $query);
        header("Location: check_status.php");
    }
?>


        </div>
        <!-- /.row -->

        <hr>

   <?php include("includes/footer.php"); ?>     