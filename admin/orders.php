<?php include "./php/adminHelper.php" ?>

<?php
session_start();
// echo md5("example99");
if(!isAdminSigned()){
    header("Location: login.php");
}
$email = getSignedAdminEmail();
$isSuper = isSuperAdmin($email);
$filter = "Processing";
if(isset($_REQUEST["filter"])){
    $filter = $_REQUEST["filter"];
}

// complete order
if(isset($_REQUEST["complete"])){
    $id = $_REQUEST["id"];
    $result = execute("UPDATE orders SET status='Shipped' WHERE order_id=\"$id\"");
    header("Location: orders.php?filter=$filter");
}


//display all orders
function displayAllOrders($status){
    global $filter;
    $orders = "";
    if($filter=="All"){
        $orders = execute("SELECT * FROM orders");
    }else{
        $orders = execute("SELECT * FROM orders WHERE status IN(\"$status\")");
    }
    if($orders->num_rows==0){
        echo "<h2 class='text-center'>No $status orders!</h2>";
    }
    foreach($orders as $order){
        $id = $order["order_id"];
        $total = number_format($order["total_price"], 2);
        $date = "On ".explode(" ", $order["date"])[0]." at ".explode(" ", $order["date"])[1];
        $note = $order["note"];
        $email= $order["email"];
        $name = get("SELECT Concat(fname, ' ', lname) AS name FROM users WHERE email=\"$email\"")["name"];
        $address = get("SELECT Concat(line1, ', ', line2, ',<br>', city, ',<br>', province, '<br>', zip) AS address FROM user_addresses WHERE email=\"$email\"")["address"];

        $isDisabled = $order["status"]!="Processing"?"disabled":"";

        // var_dump($order);
        $orderItem = "
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#$id' aria-expanded='true' aria-controls='collapseOne'>
                    <strong>Order #$id</strong>
                </button>
                </h2>
                <div id='$id' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#orders'>
                    <div class='accordion-body'>
                        <div class='row'>
                            <div class='col-sm mb-3 mb-sm-0'>
                                <h4 class='text-brown mb-1'><strong>Rs. $total</strong></h4>
                                <span class='text-secondary'>$date</span>
                                <h4 class='mt-3 mb-1'><strong>Order notes</strong></h4>
                                <span class='text-secondary'>$note</span>
                            </div>
                            <div class='col-sm-4'>
                                <h4 class='mb-1'><strong>Address</strong></h4>
                                <span class='text-secondary'>$name<br>$address</span>
                            </div>
                        </div>
                        <h4 class='mt-3'><strong>Items</strong></h4>
                        <div class='order-item-list table-responsive'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                    <th scope='col'>NAME</th>
                                    <th scope='col'>ISBN</th>
                                    <th scope='col'>PRICE</th>
                                    <th scope='col'>QTY</th>
                                    <th scope='col'>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ".showOrderItems($id)."
                                </tbody>
                            </table>
                            <div class='mt-3'>
                                <form action='".$_SERVER["PHP_SELF"]."' method='get' class='d-flex'>
                                    <input type='hidden' name='id' value='$id'>
                                    <input type='hidden' name='filter' value='$status'>
                                    <button type='submit' class='btn bg-brown text-white ms-auto' name='complete' $isDisabled><strong>Complete order</strong></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";

        echo $orderItem;
    }
}

function showOrderItems($id){
    $items = execute("SELECT B.name, B.isbn, B.price, O.quantity, O.quantity * B.price 'total' FROM order_items O RIGHT OUTER JOIN books B ON O.isbn=B.isbn WHERE O.order_id=\"$id\"");
    $itemList = "";
    foreach($items as $item){
        $tableItem = "
            <tr>
            <td>".$item["name"]."</td>
            <td>".$item["isbn"]."</td>
            <td>Rs. ".number_format($item["price"], 1)."</td>
            <td>".$item["quantity"]."</td>
            <td>Rs. ".number_format($item["total"], 2)."</td>
            </tr>
        ";
        
        $itemList = $itemList.$tableItem;
    }
    return $itemList;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminStyles.css">
    <title>BookBae Admin | Orders</title>
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
                        <li><a class='dropdown-item active' href='orders.php'>All orders</a></li>
                        <li><a class='dropdown-item' href='edit.php'>Edit book</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item text-danger' href='php/signout.php'>Sign out</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <section class="container">
        <div class="w-100 d-inline-flex align-items-bottom mb-4">
            <div class="me-auto">
                <h2><strong>Orders</strong></h2>
                <div class="hr"></div>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" id="filterOrders" style="max-width: 8rem;" class="mt-3 mb-0">
                <select class="form-select form-select-sm" name="filter" onchange="document.getElementById('filterOrders').submit();">
                    <option value="All" <?php echo $filter=="All"?"selected":""; ?>>All</option>
                    <option value="Processing" <?php echo $filter=="Processing"?"selected":""; ?>>Processing</option>
                    <option value="Shipped" <?php echo $filter=="Shipped"?"selected":""; ?>>Shipped</option>
                    <option value="Delivered" <?php echo $filter=="Delivered"?"selected":""; ?>>Delivered</option>
                    <option value="Cancelled" <?php echo $filter=="Cancelled"?"selected":""; ?>>Cancelled</option>
                </select>
            </form>
        </div>

        <div class="row">
            <div class="accordion" id="orders">
                <?php displayAllOrders($filter); ?>
            </div>
        </div>
    </section>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // make the first order exmanded
    // var firstOrder = document.querySelector("accordion-collapse");
    // firstOrder.classList.add("show");
</script>
</body>
</html>