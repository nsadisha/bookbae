<?php
    $conn=mysqli_connect('localhost','root','','bookbae');
    session_start();
    $email=$_SESSION['email'];
    if(isset($_REQUEST['submitCard'])){
            $type=$_REQUEST['cardType'];
            $name=$_REQUEST['nameOnCard'];
            $CardNum=$_REQUEST['cardNumber'];
            $exYY=$_REQUEST['yy'];
            $exMM=$_REQUEST['mm'];
            $cvv=$_REQUEST['cvv'];

            $sql="UPDATE cards SET Name=\"$name\",CardNum=\"$CardNum\",CardType=\"$type\",ExYY=\"$exYY\",ExMM=\"$exMM\",CVV=\"$cvv\" where email=\"$email\"";
            $update=$conn->query($sql);
            if($update){
                echo "done";
            }else{
                echo "no";
            }

    }
?>