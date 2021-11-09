<!doctype html>
<html lang="en">

<head>
  <title> Mess Information </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo MAIN_CSS; ?>/login.css">

</head>

<body class="img js-fullheight" style="background-image: url(<?php echo MAIN_IMAGE; ?>/bg.jpg);">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section"> Company Information </h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">

            <form action="<?php echo BASE_URL; ?>/Index/createUser" method="POST" class="signin-form">

            <input type="hidden" name="name" value="<?php echo $name = $_REQUEST['name']; ?>" readonly>
            <input type="hidden" name="email" value="<?php echo $name = $_REQUEST['email']; ?>" readonly>
            <input type="hidden" name="pass" value="<?php echo $name = $_REQUEST['pass']; ?>" readonly>

              <div class="form-group">
                <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
              </div>

              <div class="form-group">
                <input type="text" name="phn" class="form-control" placeholder="Phone Number" required>
              </div>

              <div class="form-group">
                <button type="submit" name="submit" class="form-control btn btn-primary submit px-3"> Sign Up </button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="<?php echo MAIN_JS ?>/login/jquery.min.js"></script>
  <script src="<?php echo MAIN_JS ?>/login/popper.js"></script>
  <script src="<?php echo MAIN_JS ?>/login/bootstrap.min.js"></script>
  <script src="<?php echo MAIN_JS ?>/login/main.js"></script>

</body>

</html>
