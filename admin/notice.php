<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>


<?php 
    
    if(isset($_POST['submit'])) {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $status = "Unapproved";
        
        $query = "INSERT INTO notice(notice_title,notice_body,notice_status) ";
        $query .= "VALUES('$title','$body','$status')";
        $ins_query = mysqli_query($con, $query);
        header("Location: notice.php");

    }
 ?>

 <script type="text/javascript"> 

    function getNotice(str) {
        if(str.length == 0) {
            //document.getElementById("result").innerHTML="";
            //return;
        }
        if (window.XMLHttpRequest)
         {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("noticeDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_notice.php?search_notice="+str,true);
        xmlhttp.send();
    }
</script>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Notice
                            <small>Upload</small>
                        </h1>
                    </div>

                    <div class="col-md-4 col-md-offset-8">
                        <div class="form-group">
                            <select name="search_notice" onchange="getNotice(this.value)" class="form-control">
                                <option value="all">--Select One--</option>
                                <option value="Approved">Approved</option>
                                <option value="Unapproved">Unapproved</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="body" rows="5" cols="30" class="form-control" placeholder="Enter Notice"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Save" class="btn btn-warning btn-block">
                            </div>
                        </form>
                    </div>

                        <div class="col-md-8">
                            <?php 
                                $query = "SELECT * FROM notice";
                                $ret_query = mysqli_query($con, $query);
                                echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
                                echo "<thead>";
                                echo "<tr><th>ID</th><th>Title</th><th>Body</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
                                echo "</thead>";
                                echo "<tbody id='noticeDiv'>";
                                    while($row = mysqli_fetch_array($ret_query)) {
                                        $notice_id = $row['notice_id'];
                                        $notice_status = $row['notice_status'];
                                        
                                        echo "<tr>";
                                            echo "<td>".$notice_id."</td>";
                                            echo "<td>".$row['notice_title']."</td>";
                                            echo "<td>".$row['notice_body']."</td>";
                                            echo "<td><a href='notice.php?status={$notice_status}&nid={$notice_id}'>{$notice_status}</a></td>";
                                            echo "<td><a href='notice.php?edit={$notice_id}'>Edit</a></td>";
                                            echo "<td><a href='notice.php?delete={$notice_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                echo "</tbody>";
                                echo "</table>";
                             ?>

                            
                        </div>
                </div>
                <!-- /.row -->


<?php 

    if(isset($_GET['delete'])) {
        $the_notice_id = $_GET['delete'];
        $query = "DELETE FROM notice WHERE notice_id = ".mysqli_real_escape_string($con,$the_notice_id);
        $del_notice = mysqli_query($con, $query); 
        header("Location: notice.php");
    }
    if(isset($_GET['edit'])) {
        $notice_id = $_GET['edit'];
        include('includes/update_notice.php'); 

     }
     


     if(isset($_GET['status'])) {
        $the_notice_id = $_GET['nid'];

        echo "<script>alert(".$the_notice_id.");</script>";

        $the_notice_status = $_GET['status'];
        if($the_notice_status == 'Unapproved') {
            $query = "UPDATE notice SET notice_status = 'Approved' WHERE notice_id = $the_notice_id" ;
            $approve_query = mysqli_query($con, $query);
            if(!$approve_query) {
                die("Query Failed: ".mysqli_error($con));
            }

            header("Location: notice.php");
        } else {
            $query = "UPDATE notice SET notice_status = 'Unapproved' WHERE notice_id = $the_notice_id" ;
            $unapprove_query = mysqli_query($con, $query);
            if(!$unapprove_query) {
                die("Query Failed: ".mysqli_error($con));
            }

            header("Location: notice.php");
        }
     }


 ?>

<?php include("includes/admin_footer.php"); ?>