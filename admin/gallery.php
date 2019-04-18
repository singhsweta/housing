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
                        $source = '';
                    }


                switch($source) {
                    case 'add_photo':
                        include('includes/add_photo.php');
                        break;
                    case 'edit_photo':
                        include('includes/edit_photo.php');
                        break;
                    default:
                        include('includes/all_photos.php');
                        break;
                }

                 ?> 

<?php 

    if(isset($_GET['delete'])) {
        $the_p_id = $_GET['delete'];
        $query = "DELETE FROM gallery WHERE pid = ".mysqli_real_escape_string($con,$the_p_id);
        $del_notice = mysqli_query($con, $query);
        header("Location: gallery.php");
    }
    

    if(isset($_GET['status'])) {
        $the_p_id = $_GET['ppid'];

        echo "<script>alert(".$the_p_id.");</script>";

        $the_p_status = $_GET['status'];
        if($the_p_status == 'Unapproved') {
            $query = "UPDATE gallery SET pstatus = 'Approved' WHERE pid = $the_p_id" ;
            $approve_query = mysqli_query($con, $query);
            header("Location: gallery.php");
        } else {
            $query = "UPDATE gallery SET pstatus = 'Unapproved' WHERE pid = $the_p_id" ;
            $unapprove_query = mysqli_query($con, $query);
            header("Location: gallery.php");
        }
     }

 ?>

                       
<?php include("includes/admin_footer.php"); ?>