<?php 
    
    if(isset($_POST['submit'])) {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $status = 'Unapproved';
        $edate = $_POST['date'];
        $eduration = $_POST['duration'];
        $eaddress = $_POST['address'];
        
        $query = "INSERT INTO event(event_title,event_body,event_date,event_dur,event_address,event_status) ";
        $query .= "VALUES('$title','$body','$edate','$eduration','$eaddress','$status')";
        $ins_query = mysqli_query($con, $query);
        header("Location: event.php");
        if(!$ins_query) {
            die("Query Failed: ".mysqli_error($con));
        }

    }
 ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Events
                            <small>Upload</small>
                        </h1>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="body" rows="3" cols="30" class="form-control" placeholder="Enter event"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date">
                            </div>
                            <div class="form-group">
                                <input type="text" name="duration" id="duration" class="form-control" placeholder="Enter Duration">
                            </div>
                            <div class="form-group">
                                <textarea name="address" id="address" rows="2" cols="30" class="form-control" placeholder="Enter Address"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" value="Save" class="btn btn-warning btn-block">
                            </div>
                        </form>
                    </div>
                    