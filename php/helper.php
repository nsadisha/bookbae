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
    if($books){
      $totalResults = $books->num_rows;
      foreach($books as $book){
          book($book["isbn"],3);
      }
    }else{
        echo "<h1 class='text-center my-5'>No result found!</h1>";
    }
  }
  //get search results
  function showSearchResults($search){
    global $totalResults;
    $books = execute("SELECT * FROM books WHERE name LIKE \"%$search%\"");
    if($books){
      $totalResults = $books->num_rows;
      foreach($books as $book){
          book($book["isbn"],3);
      }
    }else{
        echo "<h1 class='text-center my-5'>No search result found!</h1>";
    }
  }
?>