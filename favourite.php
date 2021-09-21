<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/book.php" ?>

<?php
    //get the current signed in user's email
    $email = "example@example.com";
    //get all favourite books of the user
    $books = execute("SELECT isbn FROM favourite_books WHERE email=\"$email\"");

    function displayFavouriteBooks(){
        global $books;
        foreach ($books as $book) {
            book($book["isbn"], 2);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/orders.css">
    <title>BookBae | Favourites</title>
    <style>
        .no-link{
            text-decoration: none;
            color: black;
        }
        .bottom-section{
            border-radius: 20px;
            background-color: #87574b10;
        }
    </style>
</head>
<body>
    
    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <!-- when invalid order id -->
    
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h2>Favourite books</h2>
                <div class="hr mb-3"></div>
            </div>
            <div  class="text-center my-5 <?php echo $books->num_rows!=0?"d-none":""; ?>">
                <h1>No favourite items...!</h1>
            </div>
        </div>
        <div class="row <?php echo $books->num_rows==0?"d-none":""; ?>">
            <?php displayFavouriteBooks(); ?>
        </div>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>