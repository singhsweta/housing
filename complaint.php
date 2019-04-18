
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    <div class="container-fluid" style="background-image: url('images/');background-repeat: no-repeat;background-size: cover;">

    <script type="text/javascript">
            
        function nameValidate() {
            var charOnly = document.getElementById('c_title').value;
            if (charOnly.search(/^[a-zA-Z]+$/) === -1) {
                alert('Only Characters');
            } else {
                charOnly = '';
            }
        }

    </script>

    <?php 

        if(!isset($_SESSION['mem_name'])) {
            header("Location: login.php");
        }

     ?>

    <?php 


        if(isset($_POST['submit'])) {

            $c_title = $_POST['c_title'];
            $c_name = $_SESSION['mem_name'];
            $c_wing = $_SESSION['mem_wing'];
            $c_flat = $_SESSION['mem_flat'];
            $c_email = $_SESSION['mem_email'];
            $c_phone = $_SESSION['mem_mobile'];
            $c_msg = $_POST['c_msg'];
            $c_status = 'Queried';
            //$msg = "";

            $query = "INSERT INTO complaint(com_name, com_wing, com_flat, com_phone, com_email,com_title, com_msg, com_status) VALUES('$c_name','$c_wing','$c_flat','$c_phone','$c_email','$c_title','$c_msg', '$c_status')";
            //echo $query;
            $ins_com = mysqli_query($con, $query);
            if(!$ins_com) {
                die("QUERY FAILED: ".mysqli_error($con));
            } else {
                echo "<p class='text-center bg-success'>The Complaint has been submitted</p>";
            }
        }
     ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="header">
            <h1 class="text-center">Complaints</h1>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                

                <div class="well">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="c_title">Title</label> <span style="color:red;">*</span>
                            <input type="text" name="c_title" onkeyup="nameValidate()" id="c_title" placeholder="Enter Title" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="c_msg">Complaint</label> <span style="color:red;">*</span>
                            <textarea name="c_msg" id="c_msg" rows="5" cols="30" class="form-control" placeholder="Enter Complaint Message"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" value="Send" class="btn btn-warning btn-block">
                        </div>
                    </form>
                </div>
                </div>                
            </div>

        </div>
        <!-- /.row -->

        <hr>

   <?php include("includes/footer.php"); ?>     