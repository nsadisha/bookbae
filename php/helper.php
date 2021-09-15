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
    echo "item added $isbn";
  }
  //add to favlist
  function addToFav($isbn){
    echo "item added to fav $isbn";
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
?>