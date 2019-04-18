<?php include("includes/admin_header.php"); ?>
<?php 
    
    if(!$_SESSION['admin_name']) {
        header("Location: login.php");
    }

 ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <?php 
                      if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                      } else {
                        $source = "";
                      }

                      switch ($source) {
                        case 'add_admin':
                          include('includes/add_admin.php');
                          break;
                        case 'edit_admin':
                          include('includes/edit_admin.php');
                          break;
                        default:
                          include('includes/all_admins.php');
                          break;
                      }
                     ?>

                       
<?php include("includes/admin_footer.php"); ?>