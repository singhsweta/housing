<?php include("includes/admin_header.php"); ?>

<?php 

    if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $query = "SELECT * FROM admins WHERE admin_email = '$email'";
    echo $query;
    $ret_login = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($ret_login)) {
      $admin_name = $row['admin_name'];
      $admin_email = $row['admin_email'];
      $admin_pass = $row['admin_pass'];
      $admin_role = $row['admin_role'];
    }

    if($email == $admin_email && $pass == $admin_pass) {
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_pass'] = $admin_pass;
      $_SESSION['admin_role'] = $admin_role;
      header("Location: index.php");
    } else {
      header("Location: login.php");
    }
  }

 ?>

<div class="container-fluid">
    <div class="col-md-4 col-md-offset-2">        
        <form action="" method="POST">
            <div class="form-group" style="color:#FFFFFF;">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
            </div>
            <div class="form-group" style="color:#FFFFFF;">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </div>
        </form>          
    </div>
</div>
