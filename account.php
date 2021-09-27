<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "php/helper.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/profile.css">    
    
    <title>BookBae | Account</title>
</head>
<?php
    $conn=mysqli_connect('localhost','root','','bookbae');
    if(!isSigned()){
        header("Location: signin.php");
    }
    $email=$_SESSION['email'];
    $sql1="select * from users where email=\"$email\"";
    $sql2="select * from user_addresses where email=\"$email\"";

    $personalDetails=$conn->query($sql1);
    while ($row1 = $personalDetails->fetch_array()) {
        $firstName= $row1['fname'];
        $lastName= $row1['lname'];
        $contact= $row1['contact'];
    }
    $locationDetails=$conn->query($sql2);
    while ($row2 = $locationDetails->fetch_array()) {
        $line1= $row2['line1'];
        $line2= $row2['line2'];
        $province= $row2['province'];
        $city=$row2['city'];
        $zip=$row2['zip'];
    }

?>
<body>
    <!-- Navbar starts -->
    <?php navbar("account"); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <div class="container-fluid header">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                <img src="assets\images\profile\dp.png" class="dp" style="width:12rem; height:12rem;">
            </div>
            <div class="col-md-8 m-auto mt-3 mt-md-auto">
                <div class="text-center"><h1>Welcome <?php echo $firstName." ".$lastName; ?> !</h1></div>
                <div class="sub-heading"><P id="sub-heading">Here's where you'll find all your account details as well as your shopping history</p></div>
            </div>
        </div>
    </div>
    <div class="container-fluid components p-4">
        <div class="row row1 my-5">
            <div class="col-md-1"></div>
            <div class="col-md-4 orders mx-auto p-4 my-1">
                <h4 class="text-center" style="font-weight:bold;">My orders</h4>
                <p class="text-center" style="color:#495057;">Manage your orders and track your last order</p>
                <h5 style="font-weight:bold;">My next delivery</h5>
                <p style="color:#495057;">Tuesday 19th January 2021</p>
                <div class="row">
                    <div class="col-6 d-grid justify-content-center">
                        <button class="btn  mx-auto text-center" data-bs-toggle="modal" data-bs-target="#trackOrder"><i class="bi bi-pin-map p-1"></i>track order</button>
                    </div>
                    <div class="col-6 d-grid justify-content-center">
                        <a href="orders.php" class="link-to-orders"><button type="button" class="btn btn-outline">See all orders</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 coupons p-4 mx-auto  my-1 justify-content-center d-grid align-items-center">
                <div>
                    <h4 class="text-center" style="font-weight:bold;">My coupon wallet</h4>
                    <p class="text-center" style="color:#495057;">View and manage your coupons</p>
                    <div class="trackButton d-flex justify-content-center"><button class="btn  mx-auto" type="submit">See all coupons</button></div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row row2">
            <div class="col-md-1"></div>
            <div class="col-md-3 profile p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-10">
                    <h5  style="font-weight:bold;">Personal Details</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#personal-details-form"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your personal and security details</p>
            </div>
            <div class="col-md-3 address p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-10">
                    <h5  style="font-weight:bold;">Address</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#delivery-details-form"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your delivery and billing details</p>
            </div>
            <div class="col-md-3 cards p-3 mx-auto my-1">
                <div class="row align-items-center">
                    <div class="col-10">
                    <h5  style="font-weight:bold;">Payment cards</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary-outline" data-bs-toggle="modal" data-bs-target="#payment-details-form"><i class="bi bi-arrow-right-circle-fill"></i></button>
                    </div>
                </div>
                <p  style="color:#495057;">Manage your payment card details</p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="assets\images\profile\sitting.jpg" class="mw-100">
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
                <form action="php/updateProfile.php" method="post">
                    
                    <div class="mb-3">
                        <label for="exampleInputFname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp" placeholder="<?php echo $firstName;?>" name="fname" value="<?php echo $firstName;?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp" placeholder="<?php echo $lastName;?>" name="lname" value="<?php echo $lastName;?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $email;?>" disabled required>
                        <div id="emailHelp" class="form-text">You can't change your email address.</div>
                    </div>
                    <label for="exampleContactNumber" class="form-label">Contact Number</label>
                    <div class="input-group mb-3">
                        
                        <span class="input-group-text" id="basic-addon1">+94</span>
                        <input type="text" class="form-control" placeholder="<?php echo $contact;?>" aria-label="contact" aria-describedby="basic-addon1" name="contact" value="<?php echo $contact;?>"required>
                    </div>
                    <div class="mb-3 form-check d-none">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Edit the changes</label>
                    </div>
                    <div class="mb-3 form-check d-flex">
                        <button type="submit" class="btn bg-brown text-white ms-auto" name="submit"><strong>Save changes</strong></button>
                    </div>
                </form>
                <form action="php/changePassword.php" method="post" onsubmit="return validateChangePasswordForm(this);">
                    <h5>Change password</h5>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Current password</label>
                        <input type="password" name="currentPassword" class="form-control" id="exampleInputPassword1" placeholder="Current password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">New password</label>
                        <input type="password" name="newPassword" class="form-control" id="exampleInputPassword2" placeholder="New password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword3" class="form-label">Confirm password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword3" placeholder="Confirm password" required>
                    </div>
                    <div class="mb-3 form-check d-flex">
                        <button type="submit" class="btn bg-brown text-white ms-auto" name="submit3"><strong>Change password</strong></button>
                    </div>
                </form>
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
            <form action="php/updateAddress.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputLine1" class="form-label">Address line 1</label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp" placeholder="<?php echo $line1;?>" name="line1" value="<?php echo $line1;?>"required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLine2" class="form-label">Address line 2</label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp" placeholder="<?php echo $line2;?>" name="line2" value="<?php echo $line2;?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputState" class="form-label">State / Province</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $province;?>" name="state" value="<?php echo $province;?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCity" class="form-label">City</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $city;?>" name="city" value="<?php echo $city;?>" required>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputZip" class="form-label">Zip code</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $zip;?>" name="zip" value="<?php echo $zip;?>" required>
                        
                    </div>
                    <div class="mb-3 form-check d-none">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Edit the changes</label>
                    </div>
                    <div class="mb-3 form-check d-flex">
                        <button type="submit" class="btn bg-brown text-white ms-auto" name="submit2"><strong>Save changes</strong></button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


    <!--payment cards modal -->
    <div class="modal fade paymentForm" id="payment-details-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-credit-card p-3 "></i><strong>Payment card details</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="php/updateCard.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputFname" class="form-label">Credit / Debit Card</label>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="cardType" id="flexRadioDefault1" value="visa">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <i class="bi bi-credit-card-2-back-fill p-2"></i> Visa Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cardType" id="flexRadioDefault2" value="Master">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <i class="bi bi-credit-card-2-front p-2"></i>Master Card
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLname" class="form-label">Name on card</label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp" placeholder="Name on card" name="nameOnCard" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Card Number</label>
                        <input class="form-control"  type="text" placeholder="cardNumber" name="cardNumber">
                        
                    </div>
                    <label for="exampleContactNumber" class="form-label">Expiration Date</label>
                    <div class="input-group mb-3">
                        
                        <span class="input-group-text" id="basic-addon1"><input type="text" class="form-control" placeholder="mm" aria-label="contact" aria-describedby="basic-addon1" name="mm" required></span>
                        <span class="input-group-text" id="basic-addon2"><input type="text" class="form-control" placeholder="yy" aria-label="contact" aria-describedby="basic-addon1" name="yy" required></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CVV</label>
                        <input class="form-control"  type="text" placeholder="Number appears in back of the card" name="cvv">
                        
                    </div>
                    <div class="mb-3 form-check d-flex">
                        <button type="submit" class="btn bg-brown text-white ms-auto" name="submitCard"><strong>Save changes</strong></button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    

    <!--track order-->
    <div class="modal" tabindex="-1" id="trackOrder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Package is in Transit</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="assets\images\profile\unnamed2.jpg" style="width:90%">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/index.js"></script>
</html>