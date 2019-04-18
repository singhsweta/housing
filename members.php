
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    <div class="container-fluid" style="background-image: url('images/');">

    <script type="text/javascript">
            
            function nameValidate() {
                var charOnly = document.getElementById('m_name').value;
                if (charOnly.search(/^[a-zA-Z ]+$/) === -1) {
                    alert('Only Characters');
                }else {
                    charOnly = '';
                }
            }

            function numMobValidate() {
                var numOnly = document.getElementById('mobileno').value;
                if (numOnly.search(/^[0-9]+$/) === -1) {
                    alert('Only Numbers');
                }
            }

            function numFlatValidate() {
                var numOnly = document.getElementById('flat').value;
                if (numOnly.search(/^[0-9]+$/) === -1) {
                    alert('Only Numbers');
                }
            }


    </script>

    <?php 


        if(isset($_POST['submit'])) {

            $m_name = $_POST['m_name'];
            $mobileno = $_POST['mobileno'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $wing = $_POST['wing'];
            $mem_type = $_POST['mem_type'];
            $flat = $_POST['flat'];
            $mem_verify = "Invalid";
            

            $query = "INSERT INTO members(mem_name,mem_email,mem_pass,mem_mobile,mem_flat,mem_wing,mem_type,mem_verify) VALUES('$m_name','$email','$pass','$mobileno','$flat','$wing','$mem_type','$mem_verify')";
            $ins_com = mysqli_query($con, $query);
            if(!$ins_com) {
                die("QUERY FAILED: ".mysqli_error($con));
            } else {
                echo "<p class='text-center bg-success'>You Have Been Registered</p>";
            }

            $m_query = "SELECT mem_id FROM members WHERE mem_email = '$email'";
            $m_ret_query = mysqli_query($con, $m_query);
            while ($row = mysqli_fetch_array($m_ret_query)) {
                $mem_b_id = $row['mem_id'];

                
            }

            $ins_bill = "INSERT INTO bills(mem_id) VALUES('$mem_b_id')";
            $ins_bills = mysqli_query($con, $ins_bill);



        }



     ?>


    <!-- Page Content -->
    <div class="container-fluid">

        <div class="header">
            <h1 class="text-center">Register</h1>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="well" >
                        
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="m_name">Name</label><span style="color:red;">*</span>
                            <input type="text" onkeyup="nameValidate()" name="m_name" id="m_name" placeholder="Enter Name" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label for="email">Email</label><span style="color:red;">*</span>
                            <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label><span style="color:red;">*</span>
                            <input type="text" name="pass" min="8" maxlength="20" id="pass" placeholder="Enter Password" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label for="mobileno">Mobile no</label><span style="color:red;">*</span>
                            <input type="text" name="mobileno" onkeyup="numMobValidate()"
                           min="10" maxlength="10" id="mobileno" placeholder="Enter Mobile No" class="form-control" required="required">
                        </div>
                        
                        <div class="form-group">
                            <label for="wing">Wing</label><span style="color:red;">*</span>
                            <input type="text" name="wing" id="wing" placeholder="Enter Wing" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="mem_type">Member Type</label>
                            <select name="mem_type" id="mem_type" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Owner">Owner</option>
                                <option value="Rent">Rent</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="flat">Flat No</label><span style="color:red;">*</span>
                            <input type="text" name="flat" onkeyup="numFlatValidate()" id="flat" placeholder="Enter Flat No" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Register" class="btn btn-warning btn-block">
                        </div>
                    </form>

                </div>                
            </div>

        </div>
        <!-- /.row -->

        <hr>

   <?php include("includes/footer.php"); ?>     