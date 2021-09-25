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
    $result = execute("UPDATE TABLE orders SET status='Shipped' WHERE order_id=\"$id\"");
    var_dump($result);
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
                <li class='nav-item'><a class='nav-link' href='#'>
                    <span>Email to subscribers</span>
                </a></li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        More
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item active' href='orders.php'>All orders</a></li>
                        <li><a class='dropdown-item <?php echo !$isSuper?"disabled":""; ?>' href='#' data-bs-toggle="modal" data-bs-target="#newAdmin">Add admin</a></li>
                        <li><a class='dropdown-item' href='#'>Add book</a></li>
                        <li><a class='dropdown-item' href='#'>Edit book</a></li>
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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>Order #were165535s63c</strong>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#orders">
                        <div class="accordion-body">
                            <h3 class="text-brown mb-1">Rs. 2,123.50</h3>
                            <span class="text-secondary">On 2021-09-25 at 10:10:10</span>
                            <h4 class="mt-3">Items</h4>
                            <div class="order-item-list table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">NAME</th>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                        </tr>
                                        <tr>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                            <td>Sadisha Nimsara</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" class="d-flex">
                                        <input type="hidden" name="id" value="1231233214">
                                        <input type="hidden" name="filter" value="<?php echo $filter; ?>">
                                        <button type="submit" class="btn bg-brown text-white ms-auto" name="complete"><strong>Complete order</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>