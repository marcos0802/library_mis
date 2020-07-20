<!DOCTYPE html>
<?php
  require_once 'core/init.php';
  if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'email' => array(
          'required' => true
        ),
        'password' => array(
          'required' => true
        )
      ));

      if ($validation->passed()) {
        // login
        $user = new User();

        $remember = (Input::get('remember') === 'on') ? true : false;

        $login= $user->login(Input::get('email'), Input::get('password'), $remember);
        if ($login) {
          Redirect::to('execute.php?request=Dashboard');
        }else {
          echo "<script>alert('Email or Password Incorrect!')</script>";
        }
      }else {
        foreach($validation->errors() as $error){
          echo $error,"<br>";
        }
      }
    }
  }
 ?>

 <html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login to LMS! </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login Here</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
              </div>
              <div>
                <input type="checkbox" class="flat" name="remember" id="remember"> Remember Me
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Log In"/>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="register.php" class="to_register"> Create Account </a>
                </p>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="clearfix"></div>
                <br />

                <?php
                if (Session::exists('home')) {
                echo '<p>'.Session::flash('home').'</p>';
                }
                 ?>

                <div>
                  <h1><i class="fa fa-paw"></i>  Library MIS!</h1>
                  <p>2020 All Rights Reserved. Powered by: Marcos Mus. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
