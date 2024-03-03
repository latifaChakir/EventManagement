<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="/images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="/css/style.css" />
      <link rel="stylesheet" href="/css/responsive.css" />
      <link rel="stylesheet" href="/css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="images/logo/login.png" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                    <form class="login-form">
                        <div class="form-group">
                          <label for="email" class="sr-only">Email address</label>
                          <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" required />
                        </div>

                        <div class="form-group">
                          <label for="password" class="sr-only">Password</label>
                          <input type="password" name="password" id="password" placeholder="Password" class="form-control" required />
                        </div>

                        <div class="text-end">
                            <a href="forgot_password.html" style="color:rgba(18, 32, 46, 0.8);">Forgot Password?</a>
                          </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block mt-4 border">Sign In</button>
                        </div>

                          <div class="form-group">
                            <a href="/auth/google">
                              <button type="button" class="btn btn-white btn-block border">
                                <img src="/images/logo/google.png" alt="Continue with Google" />
                                Continue with Google
                              </button>
                            </a>
                          </div>


                        <div class="text-center">
                          <a href="/register" style="color:rgba(18, 32, 46, 0.8);">Don't have an account? <strong>Sign Up</strong></a>
                        </div>
                      </form>
                </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <style>

      </style>
   </body>
</html>
