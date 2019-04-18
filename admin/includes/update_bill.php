 <?php 

	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'housing';

	$con = mysqli_connect($hostname, $username, $password, $database);
	if(!$con) {
		echo "Not Connected";
	}

 ?> 

 <?php 


 	//if(isset($_GET['bill_id'])) {
 		$bill_id_g = $_GET['bill_id'];
 	//}
/*
        if(isset($_POST['submit'])) {
            echo "<script>alert('You Was Here.....');</script>";
        }
*/
 	$bdate = date('y-m-d');
 	$bmonth = date('y-m-d');
 	$bddate = $_POST['bddate'];
 	$mcharge = $_POST['mcharge'];
 	$etfund = $_POST['etfund'];
 	$sfund = $_POST['sfund'];
 	$rfund = $_POST['rfund'];
    $last_up = date('y-m-d');
    $bill_status = 'Pending';

 	$total = $mcharge + $etfund + $sfund + $rfund;

    $query = "SELECT * FROM bills WHERE bill_no = ".$bill_id_g;
    echo $query;
    $ret_query = mysqli_query($con, $query);
    
    while($row = mysqli_fetch_array($ret_query)) {
        $bill_id = $row['bill_no'];
        $mem_id = $row['mem_id'];
    }

    $u_query = "UPDATE bills SET bill_date = '$bdate', bill_month = '$bmonth', due_date = '$bddate', m_charge = '$mcharge', et_fund = '$etfund', s_fund = '$sfund', r_fund = '$rfund', bill_total = '$total', last_update = '$last_up', bill_status = 'Pending' WHERE bill_no = $bill_id_g";
    //echo $u_query;
    $up_bill = mysqli_query($con, $u_query);

    $ins_query = "INSERT INTO oldbills(bill_no, mem_id, bill_date, bill_month, due_date, m_charge, et_fund, s_fund, r_fund, bill_total, bill_status) VALUES('$bill_id_g','$mem_id','$bdate','$bmonth','$bddate','$mcharge','$etfund','$sfund','$rfund','$total','$bill_status')";
        //echo $ins_query;
    $ins_query_res = mysqli_query($con, $ins_query);

    if(!$ins_query_res) {
        die(mysqli_error($con));
    }
    

    if(!$up_bill) {
    	die(mysqli_error($con));
    }

    header("Location: ../yourbill.php");      

?>