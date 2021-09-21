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
	<link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/responsive.css">	
    <title>BookBae | Sign in</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar("signin"); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <h2 class="text-center">Sign in</h2>
    

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