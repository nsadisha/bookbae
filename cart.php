<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/item.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/cart.css">
    <title>BookBae | Cart</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar("cart"); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h2 class="mb-2">My Cart</h2>
                <div class="hr mb-3 mb-md-4"></div>
            </div>
            <div class="col-auto d-flex align-items-center d-none d-md-block">
                <a href="search.php?q=" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>Continue shopping</strong></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover overflow-scroll">
                <thead class="text-secondary">
                    <tr>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col" class="text-center">QTY</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php cartItem(); ?>
                    <?php cartItem(); ?>
                    <?php cartItem(); ?>
                </tbody>
            </table>
        </div>

        <section class="cart-bottom-section my-4 p-4 px-5">
            <div class="row">
                <div class="col-sm-5 mb-4 mb-md-0">
                    <h4>Order notes</h4>
                    <div class="input-group">
                        <textarea class="form-control font-sf-pro" rows="3" name="orderNotes" placeholder="Add custon notes"></textarea>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-sm-5 col-md-3 d-grid">
                    <table class="w-100 total-table">
                        <tr>
                            <th class="text-secondary">Subtotal</th>
                            <th class="text-end">Rs. 1500.00</th>
                        </tr>
                        <tr>
                            <th class="text-secondary">Shipping</th>
                            <th class="text-end">Rs. 150.00</th>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <th class="text-secondary">Total</th>
                            <th class="text-end">Rs. 1650.00</th>
                        </tr>
                    </table>

                    <a href="php/checkout.php" class="btn proceed-to-checkout-btn mt-3 py-1"><strong>Proceed to checkout</strong></a>
                    <div></div>
                </div>
            </div>
        </section>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>