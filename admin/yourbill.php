

<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>

<script type="text/javascript"> 

    function getBillStatus(str) {
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
                document.getElementById("billDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_billstatus.php?search_billstatus="+str,true);
        xmlhttp.send();
    }
</script>

<script type="text/javascript"> 

    function getBill(str) {
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
                document.getElementById("billDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_bill.php?search_bill="+str,true);
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
                            Maintainance Bill
                        </h1>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="search_billstatus" onchange="getBillStatus(this.value)" class="form-control">
                                        <option value="all">--Select One--</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
 
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <input type="text" name="search_bill" id="search_bill" onkeyup="getBill(this.value)" placeholder="Enter Bill ID" class="form-control">
                                    </div>
                                </div>
                                </div>
                        <?php 
                            $query = "SELECT * FROM bills";
                            $ret_query = mysqli_query($con, $query);
                            
                            echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
                            echo "<thead>";
                            echo "<tr><th>Bill ID</th><th>Mem ID</th><th>Name</th><th>Due Date</th><th>Main Charge</th><th>ET Fund</th><th>S Fund</th><th>R Fund</th><th>Total</th><th>Last Updated</th><th>Now</th><th>Update</th><th>Status</th></tr>";
                            echo "</thead>";
                            echo "<tbody id='billDiv'>";
                                while($row = mysqli_fetch_array($ret_query)) {
                                    $bill_id = $row['bill_no']; 
                                    $mem_id = $row['mem_id'];
                                    $total = $row['bill_total'];
                                    $last = $row['last_update'];
                                    $bill_status = $row['bill_status'];

                                    $m_query = "SELECT mem_name, mem_flat, mem_wing FROM members WHERE mem_id = '$mem_id'";
                                    $m_ret_query = mysqli_query($con, $m_query);
                                    while ($row = mysqli_fetch_array($m_ret_query)) {
                                        $mem_name = $row['mem_name'];
                                        $mem_flat = $row['mem_flat'];
                                        $mem_wing = $row['mem_wing'];
                                    }
                                    
                                    echo "<tr>";

                                    echo "<td>".$bill_id."</td>";
                                    echo "<td>".$mem_id."</td>";
                                    echo "<td>".$mem_name."</td>";

                                    echo "<td><form action='includes/update_bill.php?bill_id={$bill_id}' method='POST'><input type='date' name='bddate' class='form-control' style='width:160px;'></td>";
                                    echo "<td><input type='text' style='width:50px;' name='mcharge' class='form-control'></td>";
                                    echo "<td><input type='text' style='width:50px;' name='etfund' class='form-control'></td>";
                                    echo "<td><input type='text' style='width:50px;' name='sfund' class='form-control'></td>";
                                    echo "<td><input type='text' style='width:50px;' name='rfund' class='form-control'></td>";
                                    echo "<td>".$total."</td>";
                                    echo "<td>".$last."</td>";
                                    echo "<td>".$bill_status."</td>";
                                    echo "<td><input type='submit' name='submit' class='btn btn-success' value='Update Bill'></form></td>";
                                    echo "<td><form action='includes/update_status.php?bill_id={$bill_id}' method='POST'><input type='submit' name='update_status' class='btn btn-success' value='Paid'></form></td>";

                                    /*echo "<td>".$mem_flat."</td>";
                                    echo "<td>".$mem_wing."</td>";*/

                                    echo "</tr>";
                                }
                            echo "</tbody>";
                            echo "</table>";   

                         ?>
                    </div>
                </div>
                <!-- /.row -->

<?php include("includes/admin_footer.php"); ?>