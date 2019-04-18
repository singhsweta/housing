
<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>


<?php 

    $m_query = "SELECT * FROM members";
    $ret_mem = mysqli_query($con, $m_query);
    $count_mem = mysqli_num_rows($ret_mem);

 ?>

 <?php 

    $g_query = "SELECT * FROM gallery";
    $ret_gal = mysqli_query($con, $g_query);
    $count_gal = mysqli_num_rows($ret_gal);

 ?>

<?php 

    $n_query = "SELECT * FROM notice";
    $ret_not = mysqli_query($con, $n_query);
    $count_not = mysqli_num_rows($ret_not);

 ?>

<?php 

    $c_query = "SELECT * FROM complaint";
    $ret_com = mysqli_query($con, $c_query);
    $count_com = mysqli_num_rows($ret_com);

 ?>

 <?php 

    $a_query = "SELECT * FROM admins";
    $ret_ad = mysqli_query($con, $a_query);
    $count_ad = mysqli_num_rows($ret_ad);

 ?>

 <?php 

    $e_query = "SELECT * FROM event";
    $ret_ev = mysqli_query($con, $e_query);
    $count_ev = mysqli_num_rows($ret_ev);

 ?>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Subheading</small>
                        </h1>


            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_mem; ?></div>
                                    <div>Members</div>
                                </div>
                            </div>
                        </div>
                        <a href="members.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-image fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_gal; ?></div>
                                    <div>Photos</div>
                                </div>
                            </div>
                        </div>
                        <a href="gallery.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_not; ?></div>
                                    <div>Notices</div>
                                </div>
                            </div>
                        </div>
                        <a href="notice.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_com; ?></div>
                                    <div>Complaints</div>
                                </div>
                            </div>
                        </div>
                        <a href="complaint.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                
                                <?php
                                
                                    $element_text = ['All Members', 'All Admins', 'All Photos', 'All Events', 'All Notice', 'All Complaints'];
                                    $element_count = [$count_mem,$count_ad,$count_gal,$count_ev,$count_not,$count_com];
                                    for($i = 0; $i < 5; $i++) {
                                        echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";
                                    }
                                
                                ?>
                                
                                //['Posts', 1000],
                            ]);
                            var options = {
                                chart: {
                                title: '',
                                subtitle: '',
                                }
                            };
                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
                </div>
                        
                    </div>
                </div>
                <!-- /.row -->

<?php include("includes/admin_footer.php"); ?>