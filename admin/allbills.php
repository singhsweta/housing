

<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>


 <script type="text/javascript"> 

    function getByYear(str) { 
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
                document.getElementById("allDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_year.php?search_year="+str,true);
        xmlhttp.send();
    }
</script>

<script type="text/javascript"> 

    function getByMonth(str) {
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
                document.getElementById("allDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_month.php?search_month="+str,true);
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
                            All Maintainance Bill
                        </h1>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="search_year" placeholder="Enter Year (YYYY)" onkeyup="getByYear(this.value)" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <input type="text" name="search_month" placeholder="Enter Month (YYYY-MM)" onkeyup="getByMonth(this.value)" class="form-control">
                                </div>
                            </div>
                        </div>

                        <?php 
                            $query = "SELECT * FROM oldbills";
                            $ret_query = mysqli_query($con, $query);
                            
                            echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
                            echo "<thead>";
                            echo "<tr><th>Bill ID</th><th>Mem ID</th><th>Name</th><th>Bill Date</th><th>Bill Month</th><th>Due Date</th><th>Main Charge</th><th>ET Fund</th><th>S Fund</th><th>R Fund</th><th>Total</th><th>Pay Date</th><th>Status</th></tr>";
                            echo "</thead>";
                            echo "<tbody id='allDiv'>";
                                while($row = mysqli_fetch_array($ret_query)) {
                                    $bill_no = $row['bill_no'];
                                    $mem_id = $row['mem_id'];
                                    $bdate = $row['bill_date'];
                                    $bmonth = $row['bill_month'];
                                    $bddate = $row['due_date'];
                                    $mcharge = $row['m_charge'];
                                    $etfund = $row['et_fund'];
                                    $sfund = $row['s_fund'];
                                    $rfund = $row['r_fund'];
                                    $total = $row['bill_total'];
                                    $pay_date = $row['billpay_date'];
                                    $Status = $row['bill_status'];

                                    echo "<tr>";
                                    echo "<td>".$bill_no."</td>";
                                    echo "<td>".$mem_id."</td>";

                                    $m_query = "SELECT mem_name, mem_flat, mem_wing FROM members WHERE mem_id = '$mem_id'";
                                    //echo $m_query;
                                    //echo "<br>";
                                    $m_ret_query = mysqli_query($con, $m_query);
                                    while ($row = mysqli_fetch_array($m_ret_query)) {
                                        $mem_name = $row['mem_name'];
                                        echo "<td>".$mem_name."</td>";
                                    }
                                    
                                    
                                    echo "<td>".$bdate."</td>";
                                    echo "<td>".$bmonth."</td>";
                                    echo "<td>".$bddate."</td>";
                                    echo "<td>".$mcharge."</td>";
                                    echo "<td>".$etfund."</td>";
                                    echo "<td>".$sfund."</td>";
                                    echo "<td>".$rfund."</td>";
                                    echo "<td>".$total."</td>";
                                    echo "<td>".$pay_date."</td>";
                                    echo "<td>".$Status."</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>";
                            echo "</table>";   

                         ?>
                    </div>
                </div>
                <!-- /.row -->

<?php include("includes/admin_footer.php"); ?>