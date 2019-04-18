

<?php include('includes/admin_header.php'); ?>
<?php include('includes/navigation.php'); ?>


<?php 

  $_SESSION['admin_name'] = null;
  $_SESSION['admin_email'] = null;
  $_SESSION['admin_pass'] = null;
  $_SESSION['admin_role'] = null;

  header("Location: login.php");

 ?>

<?php include('includes/admin_footer.php'); ?>