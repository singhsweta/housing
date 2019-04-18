
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>

    <?php 

        if(isset($_POST['submit'])) {
            
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pass']);
            $query = "SELECT * FROM members WHERE mem_email = '$email' and mem_verify = 'valid'";
            $ret_login = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($ret_login)) {
                $db_id = $row['mem_id'];
                $db_name = $row['mem_name'];
                $db_email = $row['mem_email'];
                $db_pass = $row['mem_pass'];
                $db_mobile = $row['mem_mobile'];
                $db_flat = $row['mem_flat'];
                $db_wing = $row['mem_wing'];
                $db_type = $row['mem_type'];
            }
            if($email == $db_email && $pass == $db_pass) {
                $_SESSION['mem_id'] = $db_id;
                $_SESSION['mem_name'] = $db_name;
                $_SESSION['mem_email'] = $db_email;
                $_SESSION['mem_mobile'] = $db_mobile;
                $_SESSION['mem_flat'] = $db_flat;
                $_SESSION['mem_wing'] = $db_wing;
                header("Location: index.php");
            } else {
                echo "<script>alert('Email or password Is Wrong');</script>";
                header("refresh:0.02; url=login.php");
                //header("Location: login.php");
                //header("Location: login.php");
            }

        }

     ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="header">
            <h1 class="text-center">Login</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="well">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="pass" id="password" placeholder="Enter Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Login" class="btn btn-warning btn-block">
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        <!-- /.row -->
        <hr>
        
   <?php include("includes/footer.php"); ?>     