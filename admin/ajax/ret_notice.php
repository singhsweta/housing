
<?php 
	include('../../includes/connection.php');
 ?>


<?php 

    if($_GET['search_notice'] != 'all') {
        $query = "SELECT * FROM notice WHERE notice_status = '".$_GET['search_notice']."'";
        $ret_query = mysqli_query($con, $query);
    } else {
        $query = "SELECT * FROM notice";
        $ret_query = mysqli_query($con, $query);
    }
?>

<?php 
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


 ?>