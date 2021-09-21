<?php include 'db.php' ?>

<?php
  // function to go back
  function goBack(){
    $location = $_SERVER['HTTP_REFERER'];
    header("Location: $location");
  }
  //close tab
  function closeTab(){
    echo "<script>window.close();</script>";
  }
  //execute a query
  function execute($query){
    global $conn;
    $result = $conn->query($query);
    return $result;
  }
  function get($query){
    global $conn;
    $result = $conn->query($query);
    return $result->fetch_assoc();
  }

  //add to cart
  function addToCart($isbn){
  }
  //add to favlist
  function addToFav($isbn){
  }

  // is signin
  function isSigned(){
    return isset($_SESSION["email"]);
  }
  function getSignedEmail(){
    if(isSigned()){
      return $_SESSION["email"];
    }
  }

  //get all books
  function showAllBooks(){
    global $totalResults;
    $books = execute("SELECT * FROM books");
    //$totalResults = $books->num_rows;
    if($books->num_rows!=0){
      foreach($books as $book){
          book($book["isbn"],3);
      }
    }else{
        echo "<h2 class='text-center my-5'>No result found!</h2>";
    }
  }
  //get search results
  function showSearchResults($search){
    global $totalResults;
    $books = execute("SELECT * FROM books WHERE name LIKE \"%$search%\"");
    //$totalResults = $books->num_rows;
    if($books->num_rows!=0){
      foreach($books as $book){
          book($book["isbn"],3);
      }
    }else{
        echo "<h2 class='text-center my-5'>No search result found!</h2>";
    }
  }
  //get all searched books
  function getAllBooksByName($q){
    $books = execute("SELECT * FROM books WHERE 'name' LIKE '%$q%'");
    return $books;
  }

  //random order id generator
  function generateOrderId(){
    $idLength = 12;
    $charArray = array("0123456789", "abcdefghijklmnopqrstuvwxyz", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $id = $charArray[rand(1,2)][rand(0,25)];

    for($i=0; $i<$idLength-1; $i++){
      $array = $charArray[rand(0, 2)];
      $arrayLen = strlen($array)-1;
      $randomChar = $array[rand(0, $arrayLen)];
      $id = $id.$randomChar;
    }
    if(isIdAvailable($id)){
      return $id;
    }else{
      generateOrderId();
    }
  }
  //checking whether the order id is available or not
  function isIdAvailable($id){
    //need to change this sql
    $result = execute("SELECT * FROM books WHERE isbn=\"$id\"");
    return $result->num_rows==0;
  }
?>