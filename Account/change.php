<?php 
	session_start();
	include_once "../dbconnection.php";
	include_once "../layout/default.php"; 
	if(isset($_POST['change'])){
		$uname = strip_tags(trim($_POST["username"]));
		$upass = strip_tags(trim($_POST["password"]));
		$id = strip_tags(trim($_SESSION["id"]));
		mysqli_query($conn, "UPDATE Login Set Login_id='$uname', Login_pw='$upass' Where idLogin=$id");
		header("Location: ../home.php");
	}


	?>
	<script>
		function check() {
			var answer = document.getElementsByName("answer").value;
			if(answer == "yes"){
				document.getElementById("question").style.display="none";
				document.getElementById("update").style.display="block";
			} else {
				alert(answer)//parent.location = "/Stemhire/applicant.php";
			}

		}

	</script>
	<div id="question"><span>Will you like to change your username and password?</span><br>
	<input type="radio" name="answer" value="yes">Yes <input type="radio" name="answer" value="no">No <button onclick="check()">Submit</button></div>
	<div id="update" style="display: none;">
		<form method="post">
			<input name="username" placeholder="New Username">
			<input type="password" name="password" placeholder="New Password">
			<input name="change" type="submit" value="Change">
		</form>
	</div>
<?php include_once "../Layout/footer.php";?> 
