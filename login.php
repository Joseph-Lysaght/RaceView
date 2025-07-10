<?php 
	include ('header.php'); 
	require_once 'source/db_connect.php';
?>
<div class="row">
	<div class="col-lg-5"></div> <!-- Left 2 -->
	<div class="col-lg-2"> <!-- Middle 6 -->
		<form  action="login.php" method="post"> 
			<!-- Email input -->
			<div class = "row">
				<label class="form-label" for="form2Example1">Email address</label>
				<input type="email" name="email" id="form2Example1" class="form-control" />
			</div>

			<!-- Password input -->
			<div class = "row pt-2">
				<label class="form-label" for="form2Example2">Password</label>
				<input type="password" name="user-pass" id="form2Example2" class="form-control" />
			</div>

			<!-- 2 column grid layout for inline styling -->
			<div class = "row pt-4">
				<div class = "col-lg-6"> <!-- Remember Me -->
					<label class="form-check-label" for="form2Example31"> Remember me </label>
					<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
				</div>
				<div class = "col-lg-6 justify-content-end d-flex"> <!-- Sign In Button -->
					<button class="btn btn-primary" name="login-btn" type="submit">Sign in!</button>	
				</div>
			</div>

			<!-- Register buttons -->
			<div class="pt-4">
				<h5>Not a member?</h5>
				<button class="btn btn-primary" type="button" id="regAccount">Register!</button>
			</div>
		</form>
	</div>
	<div class="col-lg-5"></div> <!-- Right 2 -->
</div>

<?php 

include ('footer.php');

if(isset($_POST['login-btn'])) {

    $email = $_POST['email'];
    $password = $_POST['user-pass'];

    try {
      $SQLQuery = "SELECT * FROM users WHERE email = :email";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':email' => $email));

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $hashed_password = $row['password'];
        $firstname =$row['firstname'];
        $email = $row['email'];
        $lastname =$row['lastname'];

        if(strcmp($hashed_password, $password) == 0) {
          $_SESSION['id'] = $id;
          $_SESSION['email'] = $email;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          header('location: index.php');
        }
        else {
          echo "Error: Invalid email or password";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>

<script type="text/javascript" language="javascript">
</script>
