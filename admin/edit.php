<?php include "./php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}
$email = getSignedAdminEmail();

$isSearched = false;
$isFound = true;
$book = null;

//book details
$isbn = "";
$name = "";
$author = "";
$publisher = "";
$category = "";
$language = "";
$price = "";
$year = "";
$edition = "";
$quantity = "";
$description = "";

// check if success
if(isset($_REQUEST["success"])){
    echo "<script>alert('Changes saved!')</script>";
}

// check isbn
if(isset($_REQUEST["isbn"])){
    $isbn = $_REQUEST["isbn"];
    $isSearched = true;
    $book = get("SELECT * FROM books WHERE isbn=\"$isbn\"");
    $isFound = $book?true:false;

    //get book details
    $name = $book["name"];
    $author = $book["author"];
    $publisher = $book["publisher"];
    $category = $book["category"];
    $language = $book["language"];
    $price = $book["price"];
    $year = $book["year"];
    $edition = $book["edition"];
    $quantity = $book["available_quantity"];
    $description = $book["description"];
}

//edit book
if(isset($_REQUEST["edit"])){
    //getting details from request
    $isbn = $_REQUEST["isbn"];
    $name = $_REQUEST["name"];
    $author = $_REQUEST["author"];
    $publisher = $_REQUEST["publisher"];
    $category = $_REQUEST["category"];
    $language = $_REQUEST["language"];
    $price = $_REQUEST["price"];
    $year = $_REQUEST["year"];
    $edition = $_REQUEST["edition"];
    $quantity = $_REQUEST["quantity"];
    $description = $_REQUEST["description"];

    $query = "
        UPDATE books SET
            name=\"$name\",
            author=\"$author\", 
            publisher=\"$publisher\", 
            category=\"$category\", 
            language=\"$language\", 
            price=\"$price\", 
            year=\"$year\", 
            edition=\"$edition\", 
            available_quantity=\"$quantity\", 
            description=\"$description\" 
        WHERE isbn=\"$isbn\"
    ";
    $result = execute($query);

    if($result){
        //back to check
        header("Location: edit.php?success=true");
    }
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
    <section class="container mt-4 <?php echo $isSearched&&$isFound?'d-none':''; ?>">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2><strong>Check ISBN</strong></h2>
                <div class="hr mb-4"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" class="row">
                    <div class="col">
                        <input type="text" name="isbn" class="form-control" placeholder="ISBN" aria-label="ISBN" value="<?php echo $isbn; ?>" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn bg-brown text-white"><strong>Check</strong></button>
                    </div>
                </form>
            <!-- Not found message -->
            <h2 class="text-center mt-3 <?php echo $isFound?'d-none':''; ?>">ISBN not found...!</h2>
            </div>
        </div>
    </section>

    <!-- Edit foem -->
    <section class="container mt-4 <?php echo $isSearched?'':'d-none'; ?>">
        <div class="row justify-content-center">

            <div class="col-md-7 <?php echo $isFound?'':'d-none'; ?>">
                <h2><strong>Edit book</strong></h2>
                <div class="hr mb-4"></div>
                <form name="editBookForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="row">
                        <div class="col">
                            <label><small>ISBN</small></label>
                            <input type="text" name="isbn" class="form-control" placeholder="ISBN" aria-label="ISBN" value="<?php echo $isbn; ?>" readonly>
                        </div>
                        <div class="col">
                            <label><small>Name</small></label>
                            <input type="text" name="name" class="form-control" placeholder="Book name" aria-label="Book name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="col-12 mt-2">
                            <label><small>Author</small></label>
                            <input type="text" name="author" class="form-control" placeholder="Author name" aria-label="Author name" value="<?php echo $author; ?>" required>
                        </div>
                        <div class="col-12 mt-2">
                            <label><small>Publisher</small></label>
                            <input type="text" name="publisher" class="form-control" placeholder="Publisher name" aria-label="Publisher name" value="<?php echo $publisher; ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label><small>Category</small></label>
                            <input type="text" name="category" class="form-control" placeholder="Category" aria-label="Category" value="<?php echo $category; ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label><small>Language</small></label>
                            <input type="text" name="language" class="form-control" placeholder="Language" aria-label="Language" value="<?php echo $language; ?>" required>
                        </div>

                        <div class="w-100"></div>

                        <div class="col mt-2">
                            <label><small>Price</small></label>
                            <input type="number" name="price" class="form-control" placeholder="Price" aria-label="Price" min="0" value="<?php echo $price; ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label><small>Year</small></label>
                            <input type="number" name="year" class="form-control" placeholder="Year" aria-label="Year" min="0" value="<?php echo $year; ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label><small>Edition</small></label>
                            <input type="number" name="edition" class="form-control" placeholder="Edition" aria-label="Edition" min="1" value="<?php echo $edition; ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label><small>Quantity</small></label>
                            <input type="number" name="quantity" class="form-control" placeholder="Available quantity" aria-label="Quantity" min="1" value="<?php echo $quantity; ?>" required>
                        </div>
                        
                        <div class="w-100"></div>

                        <div class="col-12 mt-2">
                            <label><small>Description</small></label>
                            <textarea class="form-control font-sf-pro" rows="4" name="description" placeholder="Book description"><?php echo $description; ?></textarea>
                        </div>

                        <div class="col-12 d-flex mt-3">
                            <button type="submit" class="btn bg-brown text-white ms-auto" name="edit"><strong>Edit book</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>