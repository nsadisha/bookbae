<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/book.php" ?>
<?php
    $conn=mysqli_connect('localhost','root','','bookbae');
    if (isset ($_REQUEST['isbn'])){
        $isbn=$_REQUEST['isbn'];
    }
    $sql="select * from books where isbn=$isbn";
    $data=$conn->query($sql);
    $row=$data->fetch_array();
    $author=$row['author'];
    $sql2="select isbn from books where author=\"$author\" limit 0,4";
    $featuredData=$conn->query($sql2);
    $row2=$featuredData->fetch_array();

    //book images
    $images = $conn->query("SELECT * FROM book_images WHERE isbn=\"$isbn\"");
    function showImages(){
        global $images;
        foreach($images as $i => $image){
            $imageName = $image["image"];

            $imageElement = "
            <div class='col-6 d-flex justify-content-center'>
                <div class='card' style='width: 13rem;'>
                    <img src='data/".$imageName."' class='card-img-top' alt='book image'>
                </div>
            </div>
            ";

            echo $imageElement;
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/view.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>BookBae | View </title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <h2 class="text-center p-3"><strong><?php echo $row["name"]; ?></strong></h2>
    <div class="container pb-5">
        <div class="row mt-3">
            <div class="col-lg-6 justify-content-end">
                <div class="row justify-content-center">

                    <?php showImages(); ?>

                </div>
            </div>
            <!-- Page description-->
            <div class="col-lg-6">
                <div class="container description mx-auto">
                    <div class="row ">
                        <div class="col-6">
                            ISBN
                        </div>
                        <div class="col-6">
                            <?php echo $isbn; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Author
                        </div>
                        <div class="col-6">
                            <?php echo $row['author']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 ">
                            Language
                        </div>
                        <div class="col-6">
                            <?php echo $row['language']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 ">
                            Year
                        </div>
                        <div class="col-6">
                            <?php echo $row['year']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 ">
                            Category
                        </div>
                        <div class="col-6">
                            <?php echo $row['category']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 ">
                            Edition
                        </div>
                        <div class="col-6">
                            <?php echo $row['edition']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 ">
                            Publisher
                        </div>
                        <div class="col-6">
                            <?php echo $row['publisher']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center pt-2">
                        <div class="col-6 ">
                            Price
                        </div>
                        <div class="col-6 ">
                            <strong>LKR<?php echo $row['price']; ?>.00</strong>
                        </div>
                    </div>
                    <div class="row justify-content-center pt-2 favourite">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-heart-fill p-1"></i>Add to favourites</button>
                    </div>
                    <div class="row justify-content-center pt-2">
                        <div class="col-4">
                            <input type="text" placeholder="Qty">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-cart3 p-1"></i>Add to cart</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-wallet-fill p-1"></i>Buy now</button>
                        </div>
                    </div>    

                </div>
            </div>
        </div>   
    </div>


    <!-- Page description -->
        <div class="container about pt-2 pb-2 <?php echo empty($row['description'])?'d-none':''; ?>">
          <div class="row  justify-content-center align-content-center">
                <div class="col-10 ">
                  <h4><strong>Description</strong></h4>
                  <p><?php echo $row['description']; ?></p>
                </div>
            </div>
        </div>
        <!--related items -->
        
        <div class="container related-items">
            <section class="container-fluid my-5">
                <h3 class="mb-1">Featured products</h3>
                <div class="mb-4 hr"></div>
                <div class="row justify-content-center">
                    <?php 
                        foreach($featuredData as $book){
                            book($row2['isbn'],3);
                        }
                    ?>
                </div>
            </section>
            
        </div>
        <div class="container gif mx-auto p-5  m-3">
            <div class="row align-items-center">
                <div class="col-md-6 ">
                    <img src="assets/images/view page/gif.gif" class="card-img-top" alt="...">
                </div>
                <div class="col-md-6 p-4 ">
                    <p>"Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers."</p>
                    <p>-Charles W. Eliot</p>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Page content ends -->

    <!-- Footer starts -->
        <?php footer(); ?>
    <!-- Footer ends -->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/view.js"></script> -->
</html>