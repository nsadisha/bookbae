<?php include "../php/db.php" ?>

<?php

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

function getAdminPassword($email){
    $result = get("SELECT password FROM Admins WHERE email=\"$email\"");
    if($result){
        return $result["password"];
    }else{
        return false;
    }
}

// is signin
function isAdminSigned(){
    return isset($_SESSION["adminEmail"]);
}
function getSignedAdminEmail(){
    if(isAdminSigned()){
        return $_SESSION["adminEmail"];
    }else{
        return null;
    }
}

//calculate total income
function getTotalIncome(){
    $income = get("SELECT SUM(total_price) total FROM orders")["total"];
    return $income;
}
//calculate total number of users
function getTotalUsersCount(){
    $count = get("SELECT COUNT(*) 'count' FROM users")["count"];
    return $count;
}
//calculate total number of orders
function getTotalOrdersCount(){
    $count = get("SELECT COUNT(*) 'count' FROM orders")["count"];
    return $count;
}
//available inventory items
function getTotalBooksCount(){
    $count = get("SELECT COUNT(*) 'count' FROM books")["count"];
    return $count;
}

//am i a super admin
function isSuperAdmin($email){
    $res = get("SELECT email FROM admins WHERE email=\"$email\" AND type=\"super\"");
    return $res?true:false;
}
?>