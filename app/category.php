<?php
if (Input::exists()) {

    $validate  = new Validate();
    $validation = $validate->check($_POST, array(
      'cname' => array(
        'required' => true,
        'min' => 2,
        'max' => 100,
      ),
      'desc' => array(
        'min' => 5,
      )
    ));
    if ($validation->passed()) {
      // register category.
      $user =  new User();
      $fn = $user->data()->firstname;
      $ln = $user->data()->lastname;
      $register = $fn.' '.$ln;

      $category =  new Category();
      try {
        $category->create(array(
          'name' => Input::get('cname'),
          'description' => Input::get('desc'),
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
                    <h2>Categories</h2>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Register new category</button>
                      <div class="col-sm-12">
                      <div class="card-box table-responsive">

                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#ID</th>
                          <th>Category name </th>
                          <th>Description </th>
                          <th>Registred by</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                             $category = DB::getInstance()->query('SELECT * FROM book_category');
                             if (!$category ->count()) {
                             }else {

                                foreach($category->results() as $category){
                                 echo "<tr>";
                                   echo "<td>".$category->id."</td>";
                                   echo "<td>".$category->name."</td>";
                                   echo "<td>".$category->description."</td>";
                                   echo "<td>".$category->added_by."</td>";
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
                    <h4 class="modal-title" id="myModalLabel"> Register New Category</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="" action="" method="post" novalidate>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Category Name<span
                            class="required">*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="cname"
                            id="cname"  />
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span
                            class="required">*</span></label>
                        <div class="col-md-7 col-sm-6">
                          <textarea class="form-control" data-validate-length-range="6" data-validate-words="2" id="desc" name="desc"></textarea>
                        </div>
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
