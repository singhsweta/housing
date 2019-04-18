
<?php 
	include('../../includes/connection.php');
 ?>



 <?php 
    $query = "SELECT * FROM members WHERE mem_email LIKE '%".$_GET['search_member']."%'";
    $ret_query = mysqli_query($con, $query);
?>

<?php 
	
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

 ?>