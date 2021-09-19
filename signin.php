<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">	
    <title>BookBae | Sign in</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar("signin"); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <h1 class="text-center">Account</h1>
    <!-- //////////////////////////////// -->
    <div class="form-main">
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="form-icon"><span class="fa fa-user-circle" aria-hidden="true"></span>Login</label>
					<article>
						<form action="#" method="post">
							<h3 class="form-head">Login Here</h3>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<button type="submit" class="btn submit">Login</button>
							<a href="#" class="forgot-pwd">Forgot Password?</a>
						</form>
					</article>
				</div>
				<div id="section2" class="section">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="form-icon"><span class="fa fa-pencil-square" aria-hidden="true"></span>Register</label>
					<article>
						<form action="#" method="post">
							<h3 class="form-head">Register Here</h3>
							<div class="input">
								<span class="fa fa-user-o" aria-hidden="true"></span>
								<input type="text" placeholder="Username" name="name" required />
							</div>
							<div class="input">
								<span class="fa fa-mail" aria-hidden="true"></span>
								<input type="text" placeholder="Email" name="email" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Confirm Password" name="password" required />
							</div>
							<button type="submit" class="btn submit">Register</button>
						</form>
					</article>
				</div>
			</div>
			<!-- //vertical tabs -->
			<div class="clear"></div>
	</div>

    <!-- /////////////////////////////// -->
    <!-- Page content ends -->

    <!-- Footer starts -->
    <div class="login-footer">
		<?php footer(); ?>
	</div>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>