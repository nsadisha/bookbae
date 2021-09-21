<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
   
    <link rel="stylesheet" href="css/profile.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto+Slab&display=swap" rel="stylesheet">
    
    <title>BookBae | Profile</title>
</head>
<body>
    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <div class="container-fluid header">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="assets\images\profile\dp.png" class="dp" style="width:12rem; height:12rem;">
            </div>
            <div class="col-md-8 m-auto">
                <div class="heading"><p>Welcome Ada shelby!</p></div>
                <div class="sub-heading"><P id="sub-heading">Here's where you'll find all your account details as well as your shopping history</p></div>
            </div>
        </div>
    </div>
    <div class="container-fluid components p-3">
        <div class="row my-5">
            <div class="col-md-4 orders mx-auto p-4 my-1">
                <h4 class="text-center" style="font-weight:bold;">My orders</h4>
                <p class="text-center" style="color:#495057;">Manage your orders and track your last order</p>
                <h5 style="font-weight:bold;">My next delivery</h5>
                <p style="color:#495057;">Tuesday 19th January 2021</p>
                <div class="row align-items-center">
                    <div class="col-sm-6 ">
                        <button class="btn btn-primary mx-auto text-center" type="submit"><i class="bi bi-pin-map p-1"></i>track order</button>
                    </div>
                    <div class="col-sm-6">
                        <a src="orders.php" class="link-to-orders">See all orders</a>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4 coupons p-4 mx-auto  my-1 justify-content-center display-grid align-items-center">
                <h4 class="text-center" style="font-weight:bold;">My coupon wallet</h4>
                <p class="text-center" style="color:#495057;">View and manage your coupons</p>
                <div class="trackButton d-flex justify-content-center"><button class="btn btn-primary mx-auto" type="submit">See all coupons</button></div>
            </div>
        </div>
        <div class="row row2">
            <div class="col-md-3 profile p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-sm-10">
                    <h5  style="font-weight:bold;">Personal Details</h5>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#personal-details-form"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your personal and security details</p>
            </div>
            <div class="col-md-3 address p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-sm-10">
                    <h5  style="font-weight:bold;">Address</h5>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#delivery-details-form"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your delivery and billing details</p>
            </div>
            <div class="col-md-3 cards p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-sm-10">
                    <h5  style="font-weight:bold;">Payment cards</h5>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your payment card details</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <img src="assets\images\profile\online-registration-sign-up-concept-young-woman-signing-login-to-account-huge-smartphone-user-interface-secure-password-194944746.jpg" style="width:25rem">
            </div>
        </div>
    </div>

    <!--personal details model-->
    <div class="modal fade" id="personal-details-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-lines-fill p-3"></i><strong>Account details</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputFname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp" placeholder="current first name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp" placeholder="current last name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="example@gmail.com" disabled>
                        <div id="emailHelp" class="form-text">You can't change your email address.</div>
                    </div>
                    <label for="exampleContactNumber" class="form-label">Contact Number</label>
                    <div class="input-group mb-3">
                        
                        <span class="input-group-text" id="basic-addon1">+94</span>
                        <input type="text" class="form-control" placeholder="contact" aria-label="contact" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Edit the changes</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    

    <!--address details model-->
    <div class="modal fade" id="delivery-details-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-truck p-3"></i><strong>Delivery details</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputLine1" class="form-label">Address line 1</label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp" placeholder="current address 1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLine2" class="form-label">Address line 2</label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp" placeholder="current address 2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputState" class="form-label">State / Province</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="current state" disabled>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCity" class="form-label">City</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="current city" disabled>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputZip" class="form-label">Zip code</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="current zip" disabled>
                        
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Edit the changes</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

        <!-- Footer starts -->
        <?php footer(); ?>
    <!-- Footer ends -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/profile.js"></script>
</html>