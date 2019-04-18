<div class="col-lg-12">
    <h1 class="page-header">
        Edit Admin
    </h1>
</div>

<?php 

	if(isset($_GET['edit'])) {
		$the_admin_id = $_GET['edit'];
	}

	$query = "SELECT * FROM admins WHERE admin_id = $the_admin_id";
	$ret_admin = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($ret_admin)) {
      	$admin_name = $row['admin_name'];
		$admin_email = $row['admin_email'];
		$admin_pass = $row['admin_pass'];
		$admin_role = $row['admin_role'];
	}


	if(isset($_POST['update'])) {
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_role = $_POST['admin_role'];

		$query = "UPDATE admins SET admin_name = '$admin_name',admin_email = '$admin_email',admin_pass = '$admin_pass',admin_role = '$admin_role' WHERE admin_id = $the_admin_id";
		$upd_admin = mysqli_query($con, $query);
		header("Location: admin.php");
	}
	
 ?>

<div class="col-md-6">
    <form method="POST" action="">

      <div class="form-group">
        <label for="admin_name">Name:</label>
        <input type="text" name="admin_name" value= "<?php echo $admin_name; ?>" placeholder="Enter Name" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_email">Email:</label>
        <input type="text" name="admin_email" value= "<?php echo $admin_email; ?>" placeholder="Enter Email" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_pass">Password:</label>
        <input type="password" name="admin_pass" value= "<?php echo $admin_pass; ?>" placeholder="Enter Password" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_role">Role:</label>
        <select name="admin_role" class="form-control">
        	<?php echo "<option value='{$admin_role}'>$admin_role</option>"; ?>
        </select>
      </div>

      <div class="form-group">
        <input type="submit" name="update" value="Update User" class="btn btn-primary">
      </div>
    </form>
</div>
