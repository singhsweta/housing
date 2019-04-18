<?php 
    
    if(isset($_POST['submit'])) {

        $title = $_POST['title'];
        $file = $_FILES['image']['name'];
        $tmp_file= $_FILES['image']['tmp_name'];
        $status = 'Unapproved';
        move_uploaded_file($tmp_file, "../images/$file");
       
        
        $query = "INSERT INTO gallery(ptitle,pfile,pstatus) ";
        $query .= "VALUES('$title','$file','$status')";
        $ins_query = mysqli_query($con, $query);
        header("Location: gallery.php");
        if(!$ins_query) {
            die("Query Failed: ".mysqli_error($con));
        }

    }
 ?>
                   <div class="col-lg-6">
                        <h1 class="page-header">
                            Gallery
                            <small>Upload</small>
                        </h1>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Upload" class="btn btn-warning btn-block">
                            </div>
                        </form>
                        
                    </div>