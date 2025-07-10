<!DOCTYPE html>
<html lang="en">
<?php
	include_once 'source/session.php';
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
	if(isset($_SESSION['email'])){
		$fname = $_SESSION['firstname'];
		$lname = $_SESSION['lastname'];
		$fullname = $fname . " " . $lname;
		$Login = true;
	}
	if ($curPageName != 'Login.php'){
		if(!isset($_SESSION['email'])){
			//header("location: Login.php");
			$Login = false;
		}
	}
	
?>
	<head>
		<title>Pit Chat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="./images/ERTLogo.ico">
		<style>
			.grid-img {
			width: 100%;
			height: auto;
			object-fit: cover;
			}
  		</style>
	</head>
	<body id="body">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="nav-item">
				<img src="./images/logo1.png" alt="Avatar Logo" style="width:40px; padding-left: 0.2rem;">
			</div>
			<div class="container-fluid">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" id="TaskList" href="./index.php">Task List</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="Cameraa" href="./cameras.php">Camera's</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="Settings" href="./Settings.php">Settings</a>
					</li>
				</ul>
				<span class="nav-text" style="color: #FFFFFF8C">
					<?php 
						if(isset($_SESSION['email'])){
							echo "Logged in as: " .$fullname . "";
						} else{
							echo "Not logged in !!!!";
						}
					?>
				</span>
			</div>
		</nav>
		<div class="container-fluid p-5 my-2" id="main_Container">