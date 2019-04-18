
<?php include("includes/header.php"); ?>


<?php 

    $name = $_SESSION['mem_name'];
    $flat = $_SESSION['mem_flat'];
    $wing = $_SESSION['mem_wing'];

    $query = "SELECT * FROM bills WHERE mem_id = ".$_SESSION['mem_id'];
    $ret_query = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($ret_query)) {
        $bill_no = $row['bill_no'];
        $bdate = $row['bill_date'];
        $bmonth = $row['bill_month'];
        $bddate = $row['due_date'];
        $mcharge = $row['m_charge'];
        $etfund = $row['et_fund'];
        $sfund = $row['s_fund'];
        $rfund = $row['r_fund'];
        $total = $row['bill_total'];
        $pay_date = $row['billpay_date'];
        $bill_status = $row['bill_status'];
    }

 ?>

 <script type="text/javascript">
     window.print();
 </script>


<page size="A4">
    <div style="margin-top: -50px; padding-top: 15px;" class="text-center">
        <div class="text-center">
            <b>Sundaram Lokprabhat Co-Op Housing Society LTD</b>
        </div>
        <div class="text-center">
            <b>Lok Prabhar Complex ,C.S Road,Bolinj,Virar(W)</b>
        </div>
    </div>

    <div style="margin-top: 25px;">
        <div class="text-center">
            <b>TNS/(VSI)HSG/(TC)/21859/2011-11 Dt. 05/05/2010</b>
        </div>
    </div>
    <hr>

    <div style="margin-left: 5px;">
        <div style="margin-top: 35px;">
             <div style="display: inline-block; width: 450px;">
                <b>Name:</b> <b><i><?php echo $name; ?></i></b>
            </div>
            <div style="display: inline-block;">
                <b>Bill No:</b> <b><i><?php echo $bill_no; ?></i></b>
            </div>
        </div>
    </div>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>Flat No:</b> <b><i><?php echo $flat; ?></i></b>
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Wing:</b> <b><i><?php echo $wing; ?></i></b>
            </div>
            <div style="display: inline-block;">
                <b>Bill Date:</b> <b><i><?php echo $bdate; ?></i></b>
            </div>
        </div>
    </div>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 450px;">
                <b>Bill For The Month Of:</b> <b><i><?php echo $bmonth; ?></i></b>
            </div>
            <div style="display: inline-block;">
                <b>Due Date:</b> <b><i><?php echo $bddate; ?></i></b>
            </div>
        </div>
    </div>
    <hr>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>Sr No:</b> 
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Particulars:</b>
            </div>
            <div style="display: inline-block;">
                <b>Amount:</b> 
            </div>
        </div>
    </div>
    <hr>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>1:</b>
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Maintainance Charges</b>
            </div>
            <div style="display: inline-block;">
                <b>Amount:</b> <b><i><?php echo $mcharge; ?></i></b>
            </div>
        </div>
    </div>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>2:</b>
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Education & Training Fund</b>
            </div>
            <div style="display: inline-block;">
                <b>Amount:</b> <b><i><?php echo $etfund; ?></i></b>
            </div>
        </div>
    </div>


    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>3:</b>
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Sinking Fund</b>
            </div>
            <div style="display: inline-block;">
                <b>Amount:</b> <b><i><?php echo $sfund; ?></i></b>
            </div>
        </div>
    </div>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 270px;">
                <b>4:</b>
            </div>
            <div style="display: inline-block; width: 270px;">
                <b>Repairing Fund</b>
            </div>
            <div style="display: inline-block;">
                <b>Amount:</b> <b><i><?php echo $rfund; ?></i></b>
            </div>
        </div>
    </div>
    <hr>


    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 450px;">
                <b></b>
            </div>
            <div style="display: inline-block;">
                <b>Total:</b> <b style="margin-left: 115px;"><i><?php echo $total; ?></i></b>
            </div>
        </div>
    </div>

    <div style="margin-left: 5px;">
        <div style="margin-top: 15px;">
             <div style="display: inline-block; width: 450px;">
                <b></b>
            </div>
            <div style="display: inline-block;">
                <b>Grand Total:</b> <b style="margin-left: 70px;"><i><?php echo $total; ?></i></b>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="text-success text-center">Thank You</h3>
    <hr>

    <div style="margin-left: 5px;">
        <div style="margin-top: 35px;">
             <div style="display: inline-block; width: 400px;">
                <b>Payment Date:</b> <b><i><?php echo $pay_date; ?></i></b>
            </div>
            <div style="display: inline-block;">
                <b>Bill Status:</b> <b><i class="text-info"><?php echo $bill_status; ?></i></b>
            </div>
        </div>
    </div>


</page>


    

<?php //include("includes/footer.php"); ?>     