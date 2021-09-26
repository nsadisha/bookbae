<?php include "./php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}
$email = getSignedAdminEmail();

$isSearched = false;
$isFound = true;

// complete order
if(isset($_REQUEST["isbn"])){
    $isbn = $_REQUEST["isbn"];
    echo $isbn;
    $isSearched = true;
    $books = execute("SELECT * FROM books WHERE isbn=\"$isbn\"");
    $isFound = $books->num_rows!=0?true:false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminStyles.css">
    <title>BookBae | Edit</title>
</head>
<body>
    <!-- Nav bar -->
    <nav class='navbar navbar-expand-md navbar-light bg-none'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='./'><img src='../assets/images/logo.png' alt='logo' width='130'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                <li class='nav-item'><a class='nav-link' href='./'>
                    <span>Dashboard</span>
                </a></li>
                <li class='nav-item'><a class='nav-link' href='../'>
                    <span>BookBae</span>
                </a></li>
                <li class='nav-item'><a class='nav-link' href='sendMails.php'>
                    <span>Email to subscribers</span>
                </a></li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        More
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item' href='orders.php'>All orders</a></li>
                        <li><a class='dropdown-item active' href='edit.php'>Edit book</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item text-danger' href='php/signout.php'>Sign out</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Search ISBN -->
    <section class="container mt-5 <?php echo $isSearched?'d-none':''; ?>">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" class="row">
                    <div class="col">
                        <input type="text" name="isbn" class="form-control" placeholder="ISBN" aria-label="ISBN" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn bg-brown text-white"><strong>Check</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Edit foem -->
    <section class="container mt-5 <?php echo $isSearched?'':'d-none'; ?>">
        <div class="row justify-content-center">
            <!-- Not found message -->
            <h2 class="text-center <?php echo $isFound?'d-none':''; ?>">ISBN not found...!</h2>

            <div class="col-md-7 bg-light">
                ere
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>