

<div class="col-md-4" style="margin-left: -15px;">

<form action="" method="POST">
	<div class="form-group">
		<label for="up">Edit Notice</label> 

		<?php 
			if(isset($_GET['edit'])) {
				$the_notice_id = $_GET['edit'];
				$query="SELECT * FROM notice WHERE notice_id = $the_notice_id";
				$select_notice_id=mysqli_query($con,$query);

				while ($row=mysqli_fetch_assoc($select_notice_id)) {
					$notice_id=$row['notice_id'];
					$notice_title=$row['notice_title'];
					$notice_body=$row['notice_body'];
					?>

			<div class="form-group">
				<input type="text" value="<?php if(isset($notice_title)) {echo $notice_title;} ?>" name="notice_title" class="form-control">
			</div>
			<div class="form-group">
				<textarea rows="5" cols="30" class="form-control" name="notice_body"><?php if(isset($notice_body)){echo $notice_body;}?></textarea>
			</div>
			

			<?php }} ?>

			<?php 

				if(isset($_POST['update_notice'])) {
					$the_notice_title = $_POST['notice_title'];
					$the_notice_body = $_POST['notice_body'];
					$query = "UPDATE notice SET notice_title = '{$the_notice_title}', notice_body = '{$the_notice_body}' WHERE notice_id = {$notice_id}";
					$update_query = mysqli_query($con, $query);
					if(!$update_query) {
						die("Query Failed: ".mysqli_error($con));
					} else {
						header("Location: notice.php");
					}
				}
			 ?>

		
	</div>
	<div class="form-group">
		<input type="submit" name="update_notice" class="btn btn-warning" value="Update Notice">
	</div>
</form>
</div>