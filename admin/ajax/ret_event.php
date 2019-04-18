
<?php 
	include('../../includes/connection.php');
 ?>



 <?php 
    $query = "SELECT * FROM event WHERE event_date LIKE '%".$_GET['search_event']."%'";
    $ret_query = mysqli_query($con, $query);
?>

<?php 
	
	 while($row = mysqli_fetch_array($ret_query)) {
        $event_id = $row['event_id'];
        $event_status = $row['event_status'];
        
        echo "<tr>";
            echo "<td>".$event_id."</td>";
            echo "<td>".$row['event_title']."</td>";
            echo "<td>".$row['event_body']."</td>";
            echo "<td>".$row['event_date']."</td>";
            echo "<td>".$row['event_dur']."</td>";
            echo "<td>".$row['event_address']."</td>";
            echo "<td><a href='event.php?status={$event_status}&eid={$event_id}'>{$event_status}</a></td>";
            echo "<td><a href='event.php?source=update_event&edit={$event_id}'>Edit</a></td>";
            echo "<td><a href='event.php?delete={$event_id}'>Delete</a></td>";
        echo "</tr>";
    }

 ?>