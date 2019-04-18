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
                    case 'add_event':
                        include('includes/add_event.php');
                        break;
                    case 'update_event':
                        include('includes/update_event.php');
                        break;
                    default:
                        include('includes/all_events.php');
                        break;
                }

                 ?> 

<?php 

    if(isset($_GET['delete'])) {
        $the_event_id = $_GET['delete'];
        $query = "DELETE FROM event WHERE event_id = ".mysqli_real_escape_string($con,$the_event_id);
        $del_notice = mysqli_query($con, $query);
        header("Location: event.php?source=add_event");
    }
    

    if(isset($_GET['status'])) {
        $the_event_id = $_GET['eid'];

        echo "<script>alert(".$the_event_id.");</script>";

        $the_event_status = $_GET['status'];
        if($the_event_status == 'Unapproved') {
            $query = "UPDATE event SET event_status = 'Approved' WHERE event_id = $the_event_id" ;
            $approve_query = mysqli_query($con, $query);
            header("Location: event.php");
        } else {
            $query = "UPDATE event SET event_status = 'Unapproved' WHERE event_id = $the_event_id" ;
            $unapprove_query = mysqli_query($con, $query);
            header("Location: event.php");
        }
     }
    

       

     

 ?>

                       
<?php include("includes/admin_footer.php"); ?>