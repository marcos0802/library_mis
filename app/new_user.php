      <!-- page content -->
      <?php

      if (Input::exists()) {
        if(Token::check(Input::get('token'))){

          $validate  = new Validate();
          $validation = $validate->check($_POST, array(
            'firstname' => array(
              'required' => true,
              'min' => 2,
              'max' => 10,
            ),
            'lastname' => array(
              'required' => true,
              'min' => 2,
              'max' => 10
            ),
            'email' => array(
              'required' => true,
              'unique' => 'library_users'
            ),
            'password' => array(
              'required' => true,
              'min' => 6
            ),
            'password_again' => array(
              'required' => true,
              'matches' => 'password'
            )
          ));
          if ($validation->passed()) {
            // register user.
            $user =  new User();
            $fn = $user->data()->firstname;
            $ln = $user->data()->lastname;
            $register = $fn.' '.$ln;
            $gp = Input::get('user_type');
            if ($gp === 'Administrator') {
              $user_type = 2;
            }else {
              $user_type = 1;
            }

             $salt  = Hash::salt(32);

            try {
              $user->create(array(
                'firstname' => Input::get('firstname'),
                'lastname' => Input::get('lastname'),
                'profile' => 'images/user.png',
                'email' => Input::get('email'),
                'password' => hash::make(Input::get('password'),$salt),
                'salt' => $salt,
                'telephone' => Input::get('telephone'),
                'address' => Input::get('address'),
                'group' => $user_type,
                'added_by' => $register,
                'c_date' => date('Y-m-d H:i:s')

              ));
              Session::delete('home');
            	echo "<script>window.open('execute.php?request=ListUser','_self')</script>";

            } catch (Exception $e) {
              die($e->getMessage());
            }

          }else {
            // output errors.
            foreach($validation->errors() as $error){
              echo $error,"<br>";
            }
          }
        }
      }
       ?>
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>User Registration</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                          class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form class="" action="" method="post" novalidate>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">FirstName<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="firstname"
                          id="firstname"  />
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">LastName<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="lastname"
                          id="lastname"  />
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">email<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="email" id="email" class='email' type="email" /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" name="password" id="password" data-validate-length="6,8"
                         /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Retype Password<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" name="password_again" id="password_again" data-validate-length="6,8"
                           /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span
                          >*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="telephone" id="telephone"  type="text" /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Address<span
                          >*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="address" id="address" type="text" /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">User type<span
                          >*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="user_type" id="user_type" type="text">
                          <option selected disabled> Select user type </option>
                          <option> Administrator </option>
                          <option> Librarian </option>
                        </select>
                        </div>
                    </div>
                      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                          <br/>
                          <button type='submit' class="btn btn-primary">Register</button>
                          <button type='reset' class="btn btn-success">Reset</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
