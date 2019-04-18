
<?php 
			if(isset($_GET['edit'])) {
				$the_event_id = $_GET['edit'];
            }
				$query="SELECT * FROM event WHERE event_id = $the_event_id";
				$select_event_id=mysqli_query($con,$query);

				while ($row=mysqli_fetch_assoc($select_event_id)) {
					$event_id=$row['event_id'];
					$event_title=$row['event_title'];
					$event_body=$row['event_body'];
					$event_date=$row['event_date'];
					$event_dur=$row['event_dur'];
					$event_address=$row['event_address'];
					
				}
			

			if(isset($_POST['update_event'])) {
    			$event_title=$_POST['title'];
                $event_body=$_POST['body'];
                $event_date=$_POST['date'];
                $event_dur=$_POST['duration'];
                $event_address=$_POST['address'];

				$query = "UPDATE event SET event_title = '{$event_title}',event_body='{$event_body}',event_date='{$event_date}',event_dur='{$event_dur}',event_address='{$event_address}' WHERE event_id = {$the_event_id}";
				$update_query = mysqli_query($con, $query);
                header("Location: event.php");
				if(!$update_query) {
					die("Query Failed: ".mysqli_error($con));
				}
			}
?>



                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Events
                            <small>Update</small>
                        </h1>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo $event_title; ?>" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="body" rows="3" cols="30" class="form-control" placeholder="Enter event"><?php echo $event_body; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" id="date" class="form-control" value="<?php echo $event_date; ?>" placeholder="Enter Date">
                            </div>
                            <div class="form-group">
                                <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $event_dur; ?>" placeholder="Enter Duration">
                            </div>
                            <div class="form-group">
                                <textarea name="address" id="address" rows="2" cols="30" class="form-control" placeholder="Enter Address"><?php echo $event_address; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="update_event" value="Save" class="btn btn-warning btn-block">
                            </div>
                        </form>
                    </div>
                    