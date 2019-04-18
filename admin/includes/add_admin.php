
<div class="col-lg-12">
    <h1 class="page-header">
        Add Admin

    </h1>
</div>

<?php 

	if(isset($_POST['update'])) {
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_role = $_POST['admin_role'];

		$query = "INSERT INTO admins(admin_name, admin_email, admin_pass, admin_role) VALUES('$admin_name','$admin_email','$admin_pass','$admin_role')";
		$upd_admin = mysqli_query($con, $query);
		header("Location: admin.php");
	}
	
 ?>

<div class="col-md-6">
    <form method="POST" action="">

      <div class="form-group">
        <label for="admin_name">Name:</label>
        <input type="text" name="admin_name" placeholder="Enter Name" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_email">Email:</label>
        <input type="text" name="admin_email" placeholder="Enter Email" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_pass">Password:</label>
        <input type="password" name="admin_pass" placeholder="Enter Password" class="form-control">
      </div>

      <div class="form-group">
        <label for="admin_role">Role:</label>
        <select name="admin_role" class="form-control" required="required">
          <option value="">--Select--</option>
        	<option value="Admin">Admin</option>
          <option value="Co_Admin">Co Admin</option>
        </select>
      </div>

      <div class="form-group">
        <input type="submit" name="update" value="Add Admin" class="btn btn-primary">
      </div>
    </form>
</div>
