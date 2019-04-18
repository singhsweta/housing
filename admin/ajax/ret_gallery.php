
<?php 
	include('../../includes/connection.php');
 ?>


<?php 

    if($_GET['search_gallery'] != 'all') {
        $query = "SELECT * FROM gallery WHERE pstatus = '".$_GET['search_gallery']."'";
        $ret_query = mysqli_query($con, $query);
    } else {
        $query = "SELECT * FROM gallery";
        $ret_query = mysqli_query($con, $query);
    }
?>

<?php 

    while($row = mysqli_fetch_array($ret_query)) {
        $pid = $row['pid'];
        $ptitle = $row['ptitle'];
        $pstatus = $row['pstatus'];
        $pfile = $row['pfile'];
        echo "<tr>";
            echo "<td>".$pid."</td>";
            echo "<td>".$ptitle."</td>";
            echo "<td><img width='50px' src='../images/$pfile' alt='$ptitle'></td>";
            echo "<td><a href='gallery.php?status={$pstatus}&ppid={$pid}'>{$pstatus}</a></td>";
            echo "<td><a href='gallery.php?source=edit_photo&edit={$pid}'>Edit</a></td>";
            echo "<td><a href='gallery.php?delete={$pid}'>Delete</a></td>";
        echo "</tr>";
    }

 ?>