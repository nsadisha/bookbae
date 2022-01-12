<?php include "./php/adminHelper.php" ?>

<?php
session_start();
// echo md5("example99");
if(!isAdminSigned()){
    header("Location: login.php");
}
$email = getSignedAdminEmail();
$isSuper = isSuperAdmin($email);

//check req parameters
if(!isset($_REQUEST["earnings"])){
    header("Location: ./?earnings=week&orders=week");
}
if(!isset($_REQUEST["orders"])){
    header("Location: ./?earnings=week&orders=week");
}

//calculating earnings and orders
$earnings = $_REQUEST["earnings"];
$orders = $_REQUEST["orders"];

//db result

//earnings filter
$earningData = "";
switch ($earnings) {
    case 'week':
        $start = date("Y-m-d",strtotime("-7 days"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $earningData = execute("SELECT day(date) date, SUM(total_price) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY day(date)");
        break;

    case 'month':
        $start = date("Y-m-d", strtotime("last month"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $earningData = execute("SELECT day(date) date, SUM(total_price) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY day(date)");
        break;
        
    case 'year':
        $start = date("Y-m-d", strtotime("last year"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $earningData = execute("SELECT month(date) date, SUM(total_price) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY month(date)");
        break;
    
    default:
        $earningData = execute("SELECT CAST(date as date) date, SUM(total_price) total FROM orders GROUP BY CAST(date as date)");
        break;
}
//array
$earningDataSet = array(array(), array());
//pushing to the array
foreach($earningData as $earning){
    // array_push($earningDataSet, array("date"=>$earning["date"], "total"=>$earning["total"]));
    array_push($earningDataSet[0], $earning["date"]);
    array_push($earningDataSet[1], $earning["total"]);
}
//orders filter
$ordersData = "";
switch ($orders) {
    case 'week':
        $start = date("Y-m-d",strtotime("-7 days"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $ordersData = execute("SELECT day(date) date, COUNT(*) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY day(date)");
        break;

    case 'month':
        $start = date("Y-m-d", strtotime("last month"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $ordersData = execute("SELECT day(date) date, COUNT(*) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY day(date)");
        break;
        
    case 'year':
        $start = date("Y-m-d", strtotime("last year"));
        $end = date("Y-m-d", strtotime("tomorrow"));
        $ordersData = execute("SELECT month(date) date, COUNT(*) total FROM orders WHERE date BETWEEN\"$start\" AND \"$end\" GROUP BY month(date)");
        break;
    
    default:
        $ordersData = execute("SELECT CAST(date as date) date, COUNT(*) total FROM orders GROUP BY CAST(date as date)");
        break;
}
//array
$ordersDataSet = array(array(), array());
//pushing to the array
foreach($ordersData as $order){
    array_push($ordersDataSet[0], $order["date"]);
    array_push($ordersDataSet[1], $order["total"]);
}

//-------------------------------------------

function showAdmins(){
    global $email;
    $admins = execute("SELECT email, fname, lname, type FROM admins WHERE email!=\"$email\"");
    $isAdminSuper = !isSuperAdmin($email)?"d-none":"";
    if($admins->num_rows !=0){
        foreach($admins as $admin){
            // admin details
            $name = $admin["fname"]." ".$admin["lname"];
            $adminEmail = $admin["email"];
            $type = $admin["type"]!="super"?"d-none":"";
            

            $adminRecord = "
                <div class='w-75 d-flex border-bottom admin'>
                    <div class='text-secondary'>
                        <strong>$name</strong> <i class='bi bi-patch-check-fill $type'  data-bs-toggle='tooltip' data-bs-placement='right' title='Super admin'></i><br>
                        <small>$adminEmail</small>
                    </div>
                    <a href='removeAdmin.php?email=$adminEmail' class='btn ms-auto $isAdminSuper'><strong>&times;</strong></a>
                </div>
            ";

            echo $adminRecord;
        }
    }else{
        echo "<strong class='text-secondary'>You are the only admin.</strong>";
    }
}

function showUnpaiedOrders(){
    $orders = execute("SELECT order_id, email, total_price FROM placed_orders");
    if($orders->num_rows !=0){
        foreach($orders as $order){
            // admin details
            $id = $order["order_id"];
            $total = number_format($order["total_price"], 2);
            $email = $order["email"];
            

            $adminRecord = "
                <div class='w-75 d-flex border-bottom admin'>
                    <div class='text-secondary'>
                        <strong>#$id - Rs. $total</strong><br>
                        <small>$email</small>
                    </div>
                    <a href='removeUnpaidOrder.php?id=$id' class='btn ms-auto'><strong>&times;</strong></a>
                </div>
            ";

            echo $adminRecord;
        }
        echo "<div class='mt-3 text-center'><a href='removeUnpaidOrder.php?id=all' class='btn-sm bg-brown text-white text-decoration-none text-center'><strong>Remove all</strong></a></div>";
    }else{
        echo "<strong class='text-secondary'>No unpaid orders.</strong>";
    }
}

// $today = date("Y-m-d H:i:s");
// echo $today;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminStyles.css">
    <title>BookBae | Dashboard</title>
</head>
<body>
    <nav class='navbar navbar-expand-md navbar-light bg-none'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='./'><img src='../assets/images/logo.png' alt='logo' width='130'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                <li class='nav-item'><a class='nav-link active' href='./'>
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
                        <li><a class='dropdown-item' href='orders.php'>All orders</a></li>
                        <li><a class='dropdown-item <?php echo !$isSuper?"disabled":""; ?>' href='#' data-bs-toggle="modal" data-bs-target="#newAdmin">Add admin</a></li>
                        <li><a class='dropdown-item' href='#' data-bs-toggle="modal" data-bs-target="#newBook">Add book</a></li>
                        <li><a class='dropdown-item' href='edit.php'>Edit book</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item text-danger' href='php/signout.php'>Sign out</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <section class="container top-section mt-3">
        <h2 class=""><strong>Dashboard</strong></h2>
        <div class="hr mb-4"></div>
        <div class="row">
            <h4><strong>Summary</strong></h4>
            <div class="col-6 col-md-3 mb-3">
                <div class="cCard">
                    <i class="bi bi-cash"></i>
                    <h5><strong>Net Income</strong></h5>
                    <strong class="text-secondary"><?php echo "Rs. ".number_format(getTotalIncome(), 2); ?></strong>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="cCard">
                    <i class="bi bi-cart-check"></i>
                    <h5><strong>Total Orders</strong></h5>
                    <strong class="text-secondary"><?php echo getTotalOrdersCount(); ?></strong>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="cCard">
                    <i class="bi bi-people"></i>
                    <h5><strong>Total Users</strong></h5>
                    <strong class="text-secondary"><?php echo getTotalUsersCount(); ?></strong>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="cCard">
                    <i class="bi bi-book"></i>
                    <h5><strong>Total Books</strong></h5>
                    <strong class="text-secondary"><?php echo getTotalBooksCount(); ?></strong>
                </div>
            </div>

        </div>
    </section>

    <section class="container mt-3">
        <form action="./" method="get" class="row" id="charts">
            <div class="row">
                <h4><strong>Overview</strong></h4>
                <div class="col-12 col-lg-6">
                    <div class="col-4 col-sm-3 ms-auto">
                        <select class="form-select form-select-sm" name="earnings" onchange="document.getElementById('charts').submit();">
                            <option value="week" <?php echo $earnings=="week"?"selected":""; ?>>Last week</option>
                            <option value="month" <?php echo $earnings=="month"?"selected":""; ?>>Last month </option>
                            <option value="year" <?php echo $earnings=="year"?"selected":""; ?>>Last year</option>
                            <option value="all" <?php echo $earnings=="all"?"selected":""; ?>>Lifetime</option>
                        </select>
                    </div>
                    <canvas id="myChart" height="200px"></canvas>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="col-4 col-sm-3 ms-auto">
                        <select class="form-select form-select-sm" name="orders" onchange="document.getElementById('charts').submit();">
                            <option value="week" <?php echo $orders=="week"?"selected":""; ?>>Last week</option>
                            <option value="month" <?php echo $orders=="month"?"selected":""; ?>>Last month </option>
                            <option value="year" <?php echo $orders=="year"?"selected":""; ?>>Last year</option>
                            <option value="all" <?php echo $orders=="all"?"selected":""; ?>>Lifetime</option>
                        </select>
                    </div>
                    <canvas id="myChart2" height="200px"></canvas>
                </div>
            </div>
        </form>
    </section>

    <section class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h4><strong>Other Admins</strong></h4>

                <?php showAdmins(); ?>
                
            </div>
            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                <h4><strong>Unpaid orders</strong></h4>

                <?php showUnpaiedOrders(); ?>
                
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <h4 class="mb-3"><strong>Quick Access Links</strong></h4>
            <div class="col-6 col-lg-3 mb-3 d-flex">
                <a href="orders.php" class="btn quick-link"><strong>All orders</strong></a>
            </div>
            <div class="col-6 col-lg-3 mb-3 d-flex">
                <button class="btn quick-link" data-bs-toggle="modal" data-bs-target="#newAdmin" <?php echo !$isSuper?"disabled":""; ?>><strong>+ New admin</strong></button>
            </div>
            <div class="col-6 col-lg-3 mb-3 d-flex">
                <button class="btn quick-link" data-bs-toggle="modal" data-bs-target="#newBook"><strong>+ New book</strong></button>
            </div>
            <div class="col-6 col-lg-3 mb-3 d-flex">
                <a href="edit.php" class="btn quick-link"><strong>Edit book</strong></a>
            </div>
        </div>
    </section>



    <!-- New Admin Modal -->
    <div class="modal fade" id="newAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addAdminForm" action="addAdmin.php" method="post" onsubmit="return validateAddAdminForm()">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="fname" class="form-control" placeholder="First name" aria-label="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" name="lname" class="form-control" placeholder="Last name" aria-label="Last name" required>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" required>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="password" name="cPassword" class="form-control" placeholder="Confirm password" aria-label="Confirm password" required>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="admin" checked required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="super" required>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Super admin
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <button type="submit" class="btn bg-brown text-white ms-auto" name="submit"><strong>Add</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- New Book Modal -->
    <div class="modal fade" id="newBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form name="addBookForm" action="addBook.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="isbn" class="form-control" placeholder="ISBN" aria-label="ISBN" required>
                            </div>
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Book name" aria-label="Book name" required>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" name="author" class="form-control" placeholder="Author name" aria-label="Author name" required>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" name="publisher" class="form-control" placeholder="Publisher name" aria-label="Publisher name" required>
                            </div>
                            <div class="col mt-2">
                                <input type="text" name="category" class="form-control" placeholder="Category" aria-label="Category" required>
                            </div>
                            <div class="col mt-2">
                                <input type="text" name="language" class="form-control" placeholder="Language" aria-label="Language" required>
                            </div>

                            <div class="w-100"></div>

                            <div class="col mt-2">
                                <input type="number" name="price" class="form-control" placeholder="Price" aria-label="Price" min="0" required>
                            </div>
                            <div class="col mt-2">
                                <input type="number" name="year" class="form-control" placeholder="Year" aria-label="Year" min="0" required>
                            </div>
                            <div class="col mt-2">
                                <input type="number" name="edition" class="form-control" placeholder="Edition" aria-label="Edition" min="1" required>
                            </div>
                            <div class="col mt-2">
                                <input type="number" name="quantity" class="form-control" placeholder="Available quantity" aria-label="Quantity" min="1" required>
                            </div>
                            
                            <div class="w-100"></div>

                            <div class="col-12 mt-2">
                                <textarea class="form-control font-sf-pro" rows="3" name="description" placeholder="Book description"></textarea>
                            </div>
                            <div class="col mt-2">
                                <input type="file" name="image_1" class="form-control" aria-label="Image 1" required>
                            </div>
                            <div class="col mt-2">
                                <input type="file" name="image_2" class="form-control" aria-label="Image 2">
                            </div>

                            <div class="col-12 d-flex mt-3">
                                <button type="submit" class="btn bg-brown text-white ms-auto" name="submit"><strong>Add book</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/admin.js"></script>
<script>

    //encode php array to json array
    var earningData = <?php echo(json_encode($earningDataSet)); ?>;
    var ordersData = <?php echo(json_encode($ordersDataSet)); ?>;

    //display earnings chart
    chart1(earningData[0], earningData[1]);
    //display orders chart
    chart2(ordersData[0], ordersData[1]);

</script>
</body>
</html>