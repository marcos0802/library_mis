<?php
if (Input::exists()) {

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
        'unique' => 'library_students'
      ),
      'telephone' => array(
        'required' => true,
        'min' => 10
      ),
      'institution' => array(
        'required' => true
      )
    ));
    if ($validation->passed()) {
      // register student.
      $user =  new User();
      $fn = $user->data()->firstname;
      $ln = $user->data()->lastname;
      $register = $fn.' '.$ln;
      $student =  new Student();
      try {
        $student->create(array(
          'firstname' => Input::get('firstname'),
          'lastname' => Input::get('lastname'),
          'email' => Input::get('email'),
          'address' => Input::get('address'),
          'telephone' => Input::get('telephone'),
          'institution' => Input::get('institution'),
          'status' => 1,
          'added_by' => $register,
          'c_date' => date('Y-m-d H:i:s'),

        ));


      } catch (Exception $e) {
        die($e->getMessage());
      }

    }else {
      // output errors.
      foreach($validation->errors() as $error){
        echo "<script>alert('$error')</script>";
      }
    }
  }
 ?>
        <div class="right_col" role="main">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students</h2>
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
                    <div class="row">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Register Student</button>
                      <div class="col-sm-12">
                      <div class="card-box table-responsive">

                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#ID</th>
                          <th>Identification(Names) </th>
                          <th>Email </th>
                          <th>Address</th>
                          <th>Telephone</th>
                          <th>Insitution</th>
                          <th>Status</th>
                          <th>Registred by</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                           $student = DB::getInstance()->query('SELECT * FROM library_students');
                           if (!$student ->count()) {
                           }else {

                              foreach($student->results() as $student){
                               echo "<tr>";
                                 echo "<td>".$student->id."</td>";
                                 echo "<td>".$student->firstname.' '.$student->lastname."</td>";
                                 echo "<td>".$student->email."</td>";
                                 echo "<td>".$student->address."</td>";
                                 echo "<td>".$student->telephone."</td>";
                                 echo "<td>".$student->institution."</td>";
                                 echo "<td>".$student->status."</td>";
                                 echo "<td>".$student->added_by."</td>";
                                 echo "<td>".'<button type="submit" class="btn btn-danger btn-xs" style="height:30px;" ><i class="fa fa-trash"></i></button> <button type="submit" class="btn btn-primary btn-xs" style="height:30px;"><i class="fa fa-edit"></i></button>'."</td>";
                               echo "</tr>";
                            }
                          }
                          ?>
                      </tbody>
                    </table>
                   </div>
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </div>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Register New Student</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="" action="" method="post" novalidate>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">FirstName<span
                            class="required">*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="firstname"
                            id="firstname"  />
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">LastName<span
                            class="required">*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="lastname"
                            id="lastname"  />
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span
                            class="required">*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" name="email" id="email" class='email' type="email" /></div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Address<span
                            >*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" name="address" id="address" type="text" /></div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span
                            >*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" name="telephone" id="telephone"  type="text" /></div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Insitution<span
                            >*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" name="institution" id="institution"  type="text" /></div>
                      </div>
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
