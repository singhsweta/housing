 
<?php 
	include('../../includes/connection.php');
 ?>



 <?php 
    $query = "SELECT * FROM oldbills WHERE bill_date LIKE '%".$_GET['search_year']."%'";
    $ret_query = mysqli_query($con, $query);
?>

<?php 
	
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

        $m_query = "SELECT mem_name, mem_flat, mem_wing FROM members WHERE mem_id = '$mem_id'";
        $m_ret_query = mysqli_query($con, $m_query);
        while ($row = mysqli_fetch_array($m_ret_query)) {
            $mem_name = $row['mem_name'];
        }
        
        echo "<tr>";

        echo "<td>".$bill_no."</td>";
        echo "<td>".$mem_id."</td>";
        echo "<td>".$mem_name."</td>";
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

 ?>