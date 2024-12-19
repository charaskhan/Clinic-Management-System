<?php
session_start();
$connect = mysqli_connect("localhost", "pnako16", "epoka123", "web18_pnako16");
$query = "SELECT * FROM patients WHERE id ='".$_SESSION["id"] ."'" ;
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Patient</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script>
			fetch_user_login_data();
			setInterval(function(){
			fetch_user_login_data();
			}, 3000);
			function fetch_user_login_data() {
			var action = "fetch_data";
			$.ajax({
			url: "authentication.php",
			method: "POST",
			data: {action: action},
			success: function (data) {
			$('#user_login_status').html(data);
			}
			});
			};
		</script>
		<style>
		body{
		margin:0 0 0 0;
		}
		.KryesorM
		{
			width:100%;
			height:100%;
			border:0px solid red;
			position:relative;
			
		}
		.BrendaKrye
		{
			width:100%;
			height:100%;
			border:0px solid blue;
			border-bottom:1px solid gray;
			
		}
		.HeaderKrye
		{
			width:100%;
			height:150px;
			border:0px solid red;
			background-color:rgba(222, 222, 222, 0.3);
			position:relative;
			overflow:hidden;
			
		}
		.Logo
		{
			width:200px;
			border:0px solid red;
			height:100px;
			position:absolute;
			left:5%;
			top:15%;
			z-index:1;
			overflow:hidden;
		}
		.HeaderSh
		{
			width:500px;
			border:0px solid red;
			height:50px;
			position:absolute;
			left:40%;
			top:30%;
			z-index:1;
			overflow:hidden;
			font:700 25px/50px Verdana;
			color:#5c5c5c;
		}
		.CenterKrye
		{
			width:100%;
			height:100%;
			border:0px solid green;
			position:relative;			
			overflow:hidden;
		}
		.SepL
		{
			width:400px;
			height:600px;
			border:0px solid red;		
			overflow:hidden;
			position:absolute;
			left:0;
			border-right:1px solid gray;
			background-color:rgba(222, 222, 222, 0.3);
		}
		.SepR
		{
			width:1000px;
			height:600px;
			border:0px solid black;		
			position:absolute;
			left:400px;
		}
		.help
		{
			height:600px;
			width:1px;
			border:0px solid black;		
			overflow:hidden;
			float:left;
		}
		.PacDatPh
		{
			width:900px;
			height:400px;
			border:0px solid blue;
			position:absolute;
			top:20%;
			left:15%;
			background-color:rgba(222, 222, 222, 0.9);
			-webkit-box-shadow: 5px 5px 11px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 5px 5px 11px 0px rgba(0,0,0,0.75);
			box-shadow: 5px 5px 11px 0px rgba(0,0,0,0.75);
		}
		.PacData
		{
			width:400px;
			height:500px;
			border:0px solid blue;
			position:absolute;
			top:7%;
			right:10%;
			background-color:rgba(222, 222, 222, 0.9);
		}
		.clickL
		{
			width:200px;
			height:50px;
			border:0px solid green;
			float:left;
			margin-top:30px;
			margin-left:100px;
			font:700 15px/50px Verdana;
			color:#5c5c5c;
			background-color:rgba(222, 222, 222, 0.4);
			cursor:pointer;
		}
		.Button
		{
			width:200px;
			height:50px;
			border:0px solid green;
			float:left;
			font:700 15px/50px Verdana;
			color:#5c5c5c;
			background-color:rgba(222, 222, 222, 0.4);
			cursor:pointer;
		}
		.clickL:hover
		{
			
			-webkit-box-shadow: 5px 5px 4px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 5px 5px 4px 0px rgba(0,0,0,0.75);
			box-shadow: 5px 5px 4px 0px rgba(0,0,0,0.75);

		}
		</style>
	</head>
	<body>
		<div class="KryesorM">
			<div class="BrendaKrye">
				<div class="HeaderKrye">
					<div class="Logo">
						<img src="Images/Logo.png" style="width:85%;"/>
					</div>
					<div class="HeaderSh">
						PATIENT PROFILE
					</div>
				</div>
				<div class="CenterKrye">
					<div class="SepL">
						<div class="clickL">
							<form action="Calendar.html"  align="center"> <input type="submit" class="Button"align="center" value="Enter an Appointment"> </form>
						</div>
						<div class="clickL">
							<form action="homepage.html" align="center">
								<input type="submit" class="Button" align="center" value=" Home ">
							</form>
						</div>
						<div class="clickL">
							<form action="indexChat.php" align="center">
								<input type="submit" class="Button" align="center" value=" Chat with doctor ">
							</form>
						</div>
						<div class="clickL">
							<form action="indexFile.php" align="center">
								<input type="submit" class="Button" align="center" value=" Medicine Record ">
							</form>
						</div>
						<div class="clickL">
							<form action="changePass.php" align="center">
								<input type="submit" class="Button" align="center" value=" Change Password ">
							</form>
						</div>
						<div class="clickL">
							<form action="logout.php" align="center">
								<input type="submit" class="Button" align="center" value=" Log out ">
							</form>
						</div>
					</div>
					<div class="SepR">
						<div class="PacDatPh">
							<table>
								<tr>
									<td>Username:</td>
									<td><?=$_SESSION["username"]?></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><?=$_SESSION["pass"]?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="help">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
