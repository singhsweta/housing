<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>



 <script type="text/javascript"> 

    function getComplain(str) {


        

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
                document.getElementById("comDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_complain.php?search_complain="+str,true);
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
                            Complaints
                        </h1>
                    </div>

                         <div class="col-md-12">
                            <?php 
                                $query = "SELECT * FROM complaint";
                                $ret_query = mysqli_query($con, $query);
                            ?>

                            <div class="col-md-4 col-md-offset-8">
                                <div class="form-group">
                                    <select name="search_complain" onchange="getComplain(this.value)" class="form-control">
                                        <option value="all">--Select One--</option>
                                        <option value="Queried">Queried</option>
                                        <option value="Responsed">Responsed</option>
                                        <option value="Resolved">Resolved</option>
                                    </select>
                                </div>
                            </div>

                            <?php

                                echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
                                echo "<thead>";
                                echo "<tr><th>ID</th><th>Name</th><th>Wing</th><th>Flat</th><th>Mobile no</th><th>Email</th><th>Complaint</th><th>Status</th><th>Delete</th></tr>";
                                echo "</thead>";
                                echo "<tbody id='comDiv'>";
                                    while($row = mysqli_fetch_array($ret_query)) {
                                        $com_id = $row['com_id'];
                                        $com_status = $row['com_status'];
                                        
                                        echo "<tr>";
                                            echo "<td>".$com_id."</td>";
                                            echo "<td>".$row['com_name']."</td>";
                                            echo "<td>".$row['com_wing']."</td>";
                                            echo "<td>".$row['com_flat']."</td>";
                                            echo "<td>".$row['com_phone']."</td>";
                                            echo "<td>".$row['com_email']."</td>";
                                            echo "<td>".$row['com_msg']."</td>";
                                            echo "<td><a href='complaint.php?status={$com_status}&cid={$com_id}' class='btn btn-info'>{$com_status}</a></td>";
                                            echo "<td><a href='complaint.php?delete={$com_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                echo "</tbody>";
                                echo "</table>";
                             ?>

                            
                        </div>


                        <?php 

                            if(isset($_GET['cid'])) {
                                $the_cid = $_GET['cid'];
                                $the_status = $_GET['status'];

                                if($the_status == 'Queried') {
                                    $query = "UPDATE complaint SET com_status = 'Responsed' WHERE com_id = $the_cid";
                                    $up_res = mysqli_query($con, $query);
                                    header("Location: complaint.php");
                                }else if($the_status == 'Responsed') {
                                    $query = "UPDATE complaint SET com_status = 'Resolved' WHERE com_id = $the_cid";
                                    $up_resolve = mysqli_query($con, $query);
                                    header("Location: complaint.php");
                                }

                            }


                         ?>
                                



                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

<?php 

    if(isset($_GET['delete'])) {
        $the_com_id = $_GET['delete'];
        $query = "DELETE FROM complaint WHERE com_id = ".mysqli_real_escape_string($con,$the_com_id);
        $del_notice = mysqli_query($con, $query);
        header("Location: complaint.php");
    }
?>


<?php include("includes/admin_footer.php"); ?>