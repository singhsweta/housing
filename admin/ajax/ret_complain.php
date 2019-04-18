
<?php 
	include('../../includes/connection.php');
 ?>


<?php 

    if($_GET['search_complain'] != 'all') {
        $query = "SELECT * FROM complaint WHERE com_status = '".$_GET['search_complain']."'";
        $ret_query = mysqli_query($con, $query);
    } else {
        $query = "SELECT * FROM complaint";
        $ret_query = mysqli_query($con, $query);
    }
?>

<?php 

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

 ?>