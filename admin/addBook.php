<?php include "php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}

if (isset($_REQUEST["submit"])) {
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

    $result1 = execute("INSERT INTO books VALUES(\"$isbn\", \"$name\", \"$price\", \"$category\", \"$language\", \"$author\", \"$year\", \"$edition\", \"$publisher\", \"$quantity\")");
    var_dump($result1);
    //file uploading
    if($result1){
        uploadFile("image_1","$isbn-1", $isbn);
        if(!empty($_FILES["image_2"]["name"])){
            uploadFile("image_2","$isbn-2", $isbn);
        }
    }
    
}
header("Location: index.php");


function uploadFile($file, $name, $isbn){
    $target_dir = "../data/";
    $tmp = explode('.', $_FILES[$file]["name"]);
    $ext = end($tmp);
    $target_file = $target_dir . $name.".".$ext;
    $uploadOk = 1;
    
    if(file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo $imageFileType;
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo " Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
            echo " The file ". htmlspecialchars( basename( $_FILES[$file]["name"])). " has been uploaded.<br>";
            execute("INSERT INTO book_images VALUES(\"$isbn\", \"$name.$ext\")");
        } else {
            echo " Sorry, there was an error uploading your file.<br>";
        }
    }
}
?>