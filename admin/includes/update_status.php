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
    $bill_status_id = $_GET['bill_id'];

    //echo "<script>alert('".$bill_status_id."')</script>";

    $ch_query = "SELECT bill_status FROM bills WHERE bill_no = '$bill_status_id'";
    $ch_ret_query = mysqli_query($con, $ch_query);
    while ($row = mysqli_fetch_array($ch_ret_query)) {
        $bill_status = $row['bill_status'];
    }

    if($bill_status == 'Paid') {
        echo "<script>alert('You Have Already Paid')</script>";
        header( "refresh:0.01;url=../yourbill.php" );
    } else if($bill_status == 'Pending'){
    //}

    $pay_date = date('y-m-d');

    $query = "SELECT * FROM bills WHERE bill_no = '$bill_status_id'";
    //echo $query;
    $ret_query = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($ret_query)) {
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
    }

    $pay_date = date('y-m-d');
    $bill_status = 'Pending';

    $u_query = "UPDATE bills SET due_date='0000-00-00', m_charge='',et_fund='', s_fund='', r_fund='', bill_total='0', billpay_date = '$pay_date', bill_status = 'Paid' WHERE bill_no = '$bill_status_id'";
    //echo $u_query;
    //echo "<br>";
    $up_bill = mysqli_query($con, $u_query);

    $s_query = "UPDATE oldbills SET billpay_date = '$pay_date', bill_status = 'Paid' WHERE bill_no = '$bill_status_id'";
    //echo $s_query;
    $uup_bill = mysqli_query($con, $s_query);
    

    if(!$up_bill) {
        die(mysqli_error($con));
    } 

    if(!$uup_bill) {
        die(mysqli_error($con));
    } 

    header( "refresh:0.01;url=../yourbill.php" );  
    /*if(!$up_bill) {
        die(mysqli_error($con));
    } */
    }

    //echo "<script>alert('You Paid Abhi.....')</script>";

?>