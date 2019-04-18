
<?php 
	include('../../includes/connection.php');
 ?>


<?php 

    if($_GET['search_billstatus'] != 'all') {
        $query = "SELECT * FROM bills WHERE bill_status = '".$_GET['search_billstatus']."'";
        $ret_query = mysqli_query($con, $query);
    } else {
        $query = "SELECT * FROM bills";
        $ret_query = mysqli_query($con, $query);
    }
?>

<?php 
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

 ?>