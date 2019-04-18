
<?php 
	
	include('includes/header.php');

 ?>

<?php 
	
	$_SESSION['mem_id'] = null;
    $_SESSION['mem_name'] = null;
    $_SESSION['mem_email'] = null;
    $_SESSION['mem_mobile'] = null;
    header("Location: login.php");

 ?>