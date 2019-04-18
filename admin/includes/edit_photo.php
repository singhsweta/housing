 <?php 
            if(isset($_GET['edit'])) {
                $the_p_id = $_GET['edit'];
            }
                $query="SELECT * FROM gallery WHERE pid = $the_p_id";
                $select_photo_id=mysqli_query($con,$query);

                while ($row=mysqli_fetch_assoc($select_photo_id)) {
                    $pid=$row['pid'];
                    $ptitle=$row['ptitle'];
                    $pfile=$row['pfile'];
                    
                }
            

            if(isset($_POST['edit_photo'])) {
                $ptitle=$_POST['title'];
                $file = $_FILES['image']['name'];
                $tmp_file= $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp_file, "../images/$file");
               

                $query = "UPDATE gallery SET ptitle = '{$ptitle}',pfile='{$file}' WHERE pid = {$the_p_id}";
                $update_query = mysqli_query($con, $query);
                header("Location: gallery.php");
                if(!$update_query) {
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
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="<?php echo $ptitle; ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control" value="<?php echo $file; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="edit_photo" value="Save" class="btn btn-warning btn-block">
                            </div>
                        </form>
                        
                    </div>