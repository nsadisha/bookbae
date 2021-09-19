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
  function getAllBooks(){
    $books = execute("SELECT * FROM books");
    return $books;
  }
  //get all searched books
  function getAllBooksByName($q){
    $books = execute("SELECT * FROM books WHERE 'name' LIKE '%$q%'");
    return $books;
  }
?>