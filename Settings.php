<?php include ('header.php'); ?>
<script> <!-- Set the Active link in the header -->
document.getElementById('Settings').setAttribute("class", "nav-link active"); 
</script>
Settings
<p><a class="btn btn-primary" href="logout.php" role="button">Log out</a></p>
<p><a class="btn btn-primary" href="login.php" role="button">Log In</a></p>
<p><a class="btn btn-primary" id="cleartasks" role="button">Clear All Tasks</a></p>
<?php include ('footer.php'); ?>

<script type="text/javascript" language="javascript">

//--------Toggle Car 03 View on or off---------------//
var login = <?php echo json_encode($Login); ?>;

$( "#cleartasks" ).click(function() {
	if(login == true){
		if (confirm("Are you sure you want to clear the database?")) {
			fetch('source/ClearDB.php', {
				method: 'POST'  // or 'GET' if your PHP expects it
			})
			.then(response => response.text())  // or response.json() if your PHP returns JSON
			.then(data => {
				console.log('Server response:', data);
				alert('Database cleared successfully!');
			})
			.catch(error => {
				console.error('Error:', error);
				alert('An error occurred while clearing the database.');
			});
		}
	} else {
		alert('You dont have accces to this function. Please Log In !');
	}
});

</script>