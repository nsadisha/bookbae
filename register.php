<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
	  <link rel="stylesheet" href="css/signin.css">

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <title>BookBae | Register</title>

    <!-- <script src="js/signin.js"></script> -->

    <script>
        window.console = window.console || function(t) {};
    </script>

    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
    }
    </script>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar("register"); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="form">
      
        <!-- <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
        </ul> -->
        
        <div class="tab-content">
            <div id="signup">   
            <h1>Sign Up for Free</h1>
            
            <form action="/" method="post">
            
            <div class="top-row">
                <div class="field-wrap">
                  <label>
                      First Name<span class="req">*</span>
                  </label>
                  <input type="text" required autocomplete="off" />
                </div>
            
                <div class="field-wrap">
                  <label>
                      Last Name<span class="req">*</span>
                  </label>
                  <input type="text"required autocomplete="off"/>
                </div>
            </div>

            <div class="field-wrap">
                <label>
                Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                Mobile Number<span class="req">*</span>
                </label>
                <input type="text" required autocomplete="off" />
            </div>
            
            <div class="field-wrap">
                <label>
                Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                Confirm Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off"/>
            </div>
            <hr class="br-line"><br>

            <div class="field-wrap">
                <label>
                Address Line 1<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                Address Line 2
                </label>
                <input type="text" autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                State / Provice<span class="req">*</span>
                </label>
                <input type="text" required autocomplete="off" />
            </div>

            <div class="top-row">
                <div class="field-wrap">
                  <label>
                      City<span class="req">*</span>
                  </label>
                  <input type="text" required autocomplete="off" />
                </div>
            
                <div class="field-wrap">
                  <label>
                      Zip Code<span class="req">*</span>
                  </label>
                  <input type="text"required autocomplete="off"/>
                </div>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="button button-block"/>Register</button>
            
            </form>
            </div>

            <div>
            </div>
            
        </div><!-- tab-content -->
      
    </div> <!-- /form -->
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>