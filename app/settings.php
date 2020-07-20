

<script type="text/javascript">
	function preview_image(event)
	{
		var reader = new FileReader();
		reader.onload = function(){
			var output = document.getElementById("input_Imagees");
			output.src =reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>
<?php
  require_once 'core/init.php';
	$user =  new User();

 	if (!$user->isLoggedIn()) {
	 Redirect::to('index.php');
 	}

  if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
      $validate =  new Validate();

      $validation = $validate->check($_POST, array(
        'firstname' => array(
          'required' => true,
          'min' => 2,
          'max' => 50
        ),
				'Lastname' => array(
					'required' => true,
					'min' => 2,
					'max' => 50
				),
				'email' => array(
					'required' => true,
					'min' => 10,
					'unique' => 'library_users'
				)
      ));
      if ($validation->passed()) {
        //Update
        try {
          $user->update(array(
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
            'telephone' => Input::get('telephone'),
            'address' => Input::get('address')
          ));

          Session::delete();
          Redirect::to('execute.php?request=Dashboard');

        } catch (Exception $e) {
          die($e->getMessage());
        }

      }else {
        //list errors
        foreach($validation->errors() as $error){
          echo $error, '<br>';
        }
      }
    }
  }
 ?>
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Library User Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" style="width: 100%; height: 100%;" id="input_Imagees" src="<?php echo $user->data()->profile; ?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h5><?php echo $user->data()->firstname.' '. $user->data()->lastname; ?></h5>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $user->data()->address ; ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i>
                          <?php
                            $job = $user->data()->group;
                            if($job == 1){
                            echo "Librarian";
                          } else {
                            echo "Administrator";
                          }?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="#" target="_blank">www.marcosmus.com</a>
                        </li>
                      </ul>
                      <label class="btn btn-primary btn-upload col-md-12 col-sm-12 col-xs-12 btn-sm" style="background: #2A3F54;" for="inputImage" title="Upload image file">

                          <input type="file" class="sr-only" id="inputImage" name="photoprofile" onchange="preview_image(event)" accept="images/*" title="Edit Profile">
                          <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                            <i class="fa fa-edit m-right-xs"></i>
                          </span>
                        </label>

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">User Details</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Change Password</a>
                          </li>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                          <!-- user detail -->
                          <form class="" action="" method="post">
                            <div class="field item form-group">
                              <div class="col-md-8 col-sm-6">
                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="firstname"
                                  id="firstname" value="<?php echo $user->data()->firstname; ?>" />
                              </div>
                            </div>
                            <div class="field item form-group">
                              <div class="col-md-8 col-sm-6">
                                <input class="form-control" data-validate-length-range="6" value="<?php echo $user->data()->lastname; ?>" data-validate-words="2" name="lastname"
                                  id="lastname"  />
                              </div>
                            </div>
                            <div class="field item form-group">
                              <div class="col-md-8 col-sm-6">
                                <input class="form-control" name="email" id="email" class='email' value="<?php echo $user->data()->email; ?>" type="email" /></div>
                            </div>
                            <div class="field item form-group">
                              <div class="col-md-8 col-sm-6">
                                <input class="form-control" name="telephone" id="telephone"  value="<?php echo $user->data()->telephone; ?>" type="text" /></div>
                            </div>
                            <div class="field item form-group">
                              <div class="col-md-8 col-sm-6">
                                <input class="form-control" name="address" id="address" value="<?php echo $user->data()->address; ?>" type="text" /></div>
                            </div>
                              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            <div class="ln_solid">
                              <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                  <br/>
                                  <button type='submit' class="btn btn-primary">Update info</button>
                                </div>
                              </div>
                            </div>
                          </form>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <form class="" action="" method="post" novalidate>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Current Password<span
                                    class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                  <input class="form-control" name="password" id="password" class='password' type="password" /></div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">New Password<span
                                    class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                  <input class="form-control" type="password" name="new_password" id="new_password" data-validate-length="6,8"
                                   /></div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Retype Password<span
                                    class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                  <input class="form-control" type="password" name="password_again" id="password_again" data-validate-length="6,8"
                                     /></div>
                              </div>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                              <div class="ln_solid">
                                <div class="form-group">
                                  <div class="col-md-6 offset-md-3">
                                    <br/>
                                    <button type='submit' class="btn btn-primary">Update</button>

                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
