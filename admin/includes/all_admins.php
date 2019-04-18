<div class="col-lg-12">
                        <h1 class="page-header">
                            All Admin
                            
                        </h1>
                    </div>

<?php 
	$query = "SELECT * FROM admins";
	$ret_admin = mysqli_query($con, $query);
 ?>

<div class="col-md-12">
    <?php 
          echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'><thead><tr><th>Admin ID</th><th>Admin Name</th><th>Admin Email</th><th>Admin Password</th><th>Admin Role</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
          while($row = mysqli_fetch_array($ret_admin)) {
          		$admin_id = $row['admin_id'];
              	$admin_name = $row['admin_name'];
				$admin_email = $row['admin_email'];
				$admin_pass = $row['admin_pass'];
				$admin_role = $row['admin_role'];

          echo "<tr>";
            echo "<td>".$admin_id."</td>";
            echo "<td>".$admin_name."</td>";
            echo "<td>".$admin_email."</td>";
            echo "<td>".$admin_pass."</td>";
            echo "<td><a href='admin.php?admin_role={$admin_role}&admin_id={$admin_id}'>{$admin_role}</a></td>";
            echo "<td><a href='admin.php?source=edit_admin&edit={$admin_id}'>Edit</a></td>";
            echo "<td><a href='admin.php?delete={$admin_id}'>Delete</a></td>";
          echo "</tr>";
		}

         ?>
      </tbody>
  </table>
</div>

<?php 

	if(isset($_GET['admin_role'])) {
		$the_admin_id = $_GET['admin_id'];
		$the_admin_role = $_GET['admin_role'];
		if($the_admin_role == "Admin") {
			$query = "UPDATE admins SET admin_role = 'Co_Admin' WHERE admin_id = $the_admin_id";
			$coquery = mysqli_query($con, $query);
			if(!$coquery) {
				die(mysqli_error($con));
			} else {
				header("Location: admin.php");
			}
		} else {
			$query = "UPDATE admins SET admin_role = 'Admin' WHERE admin_id = $the_admin_id";
			$aquery = mysqli_query($con, $query);
			if(!$aquery) {
				die(mysqli_error($con));
			} else {
				header("Location: admin.php");
			}
		}

	}

 ?>


 <?php 

 	if(isset($_GET['delete'])) {
 		$the_delete_id = $_GET['delete'];
 		$query = "DELETE FROM admins WHERE admin_id = $the_delete_id";
 		$del_query = mysqli_query($con, $query);
 		header("Location: admin.php");
 	}

  ?>