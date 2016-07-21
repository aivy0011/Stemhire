<?php
	$title = "Login";
	session_start();
	require_once '../dbconnection.php';
	if(isset($_POST['btn'])){
		$uname = strip_tags(trim($_POST['username']));
		$upass = strip_tags(trim($_POST['password']));

		$res = mysqli_query($conn,"SELECT * From login where Login_id ='$uname' AND Login_pw='$upass'");
		$row = mysqli_fetch_array($res);//create an array based on results;
		//check login credential
		if($row["Login_id" == $uname] &&$row['Login_pw'] == $upass) {
			$_SESSION['user'] = $uname;
			$_SESSION['id'] = $row["idLogin"];
			$row['Login_count'] = intval($row['Login_count']) + 1;
			mysqli_query($conn, "UPDATE Login Set Login_count={$row['Login_count']} WHERE Login_id='$uname'"); 
			if($row["Login_access"] == "A"){
				header("Location: /Stemhire/admin.php");	
			} else {
				header("Location: /Stemhire/home.php");
			}
		} else {
			$errMsg = "Wrong Credential";
		}
	}
?>
<?php include_once "../layout/default.php" ?>
<form method="post">
	<input placeholder="Your Username" name="username">
	<input type='password' placeholder="Your Password" name="password">
	<input type="submit" name="btn" value="submit">
</form>

<?php 
	include_once "../layout/footer.php";
	if(isset($errMsg)){echo $errMsg;} 
?>