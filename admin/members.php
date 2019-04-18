<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>

 <script type="text/javascript"> 

    function getMember(str) {


        

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
                document.getElementById("memDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_member.php?search_member="+str,true);
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
                            Member Details
                        </h1>
                    
                        

                         <div class="col-xs-12">
                            <?php 
                                $query = "SELECT * FROM members";
                                $ret_query = mysqli_query($con, $query);
                            ?>

                                <div class="col-md-4 col-md-offset-8">
                                    <div class="form-group">
                                        <input type="text" name="search_member" id="search_member" onkeyup="getMember(this.value)" placeholder="Enter Email" class="form-control">
                                    </div>
                                </div>

                            <?php

                                echo "<table class='table table-bordered table-hover table-responsive table-condensed'>";
                                echo "<thead>";
                                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Mobile No</th><th>Flat No</th><th>Wing</th><th>Member Type</th><th>Verify</th><th>Delete</th></tr>";
                                echo "</thead>";
                                echo "<tbody id='memDiv'>";
                                    while($row = mysqli_fetch_array($ret_query)) {
                                        $mem_id = $row['mem_id'];
                                        $mem_verify = $row['mem_verify'];
                                        
                                        echo "<tr>";
                                            echo "<td>".$mem_id."</td>";
                                            echo "<td>".$row['mem_name']."</td>";
                                            echo "<td>".$row['mem_email']."</td>";
                                            echo "<td>".$row['mem_pass']."</td>";
                                            echo "<td>".$row['mem_mobile']."</td>";
                                            echo "<td>".$row['mem_flat']."</td>";
                                            echo "<td>".$row['mem_wing']."</td>";
                                            echo "<td>".$row['mem_type']."</td>";
                                             echo "<td><a href='members.php?verify={$mem_verify}&memid={$mem_id}'>{$mem_verify}</a></td>";
                                             echo "<td><a href='members.php?delete={$mem_id}'>delete</a></td>";
                                    
                                        echo "</tr>";
                                    }

                                echo "</tbody>";
                                echo "</table>";
                             ?>

                            
                        </div>
                                



                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

<?php 

    if(isset($_GET['delete'])) {
        $the_mem_id = $_GET['delete'];
        $query = "DELETE FROM members WHERE mem_id = ".mysqli_real_escape_string($con,$the_mem_id);
        $del_mem = mysqli_query($con, $query);
        header("Location: members.php");
    }

     if(isset($_GET['verify'])) {
        $the_mem_id = $_GET['memid'];

        echo "<script>alert(".$the_mem_id.");</script>";

        $mem_verify = $_GET['verify'];
        if($mem_verify == 'Invalid') {
            $query = "UPDATE members SET mem_verify = 'Valid' WHERE mem_id = $the_mem_id" ;
            $valid_query = mysqli_query($con, $query);
            if(!$valid_query) {
                die("Query Failed: ".mysqli_error($con));
            }

            header("Location: members.php");
        } else {
            $query = "UPDATE members SET mem_verify = 'Invalid' WHERE mem_id = $the_mem_id" ;
            $invalid_query = mysqli_query($con, $query);
            if(!$invalid_query) {
                die("Query Failed: ".mysqli_error($con));
            }

            header("Location: members.php");
        }
     }

?>


<?php include("includes/admin_footer.php"); ?>