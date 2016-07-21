<?php
	session_start();
	include "layout/default.php";
	include "dbconnection.php";
	$id = strip_tags(trim($_SESSION["id"]));
	$res = mysqli_query($conn,"SELECT * FROM login where idLogin=$id");
	$row = mysqli_fetch_array($res);
	if($row["Login_count"] == 1){
		header("Location: /Stemhire/Account/change.php");
	} else {
		header("Location: applicant.php");
	}
	?>



	<?php include "layout/footer.php";	?>
