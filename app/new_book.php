<!-- page content -->
<?php
if (Input::exists()) {

    $validate  = new Validate();
    $validation = $validate->check($_POST, array(
      'isbn' => array(
        'required' => true,
        'min' => 2,
        'max' => 100,
        'unique' => 'library_books'
      ),
      'title' => array(
        'required' => true,
        'min' => 2,
        'max' => 100
      )
    ));
    if ($validation->passed()) {
      // register student.
      $user =  new User();
      $fn = $user->data()->firstname;
      $ln = $user->data()->lastname;
      $register = $fn.' '.$ln;
      $book =  new Book();
      try {
        $book->create(array(
          'isbn' => Input::get('isbn'),
          'title' => Input::get('title'),
          'edition' => Input::get('edition'),
          'category' => Input::get('category'),
          'author' => Input::get('author'),
          'price' => Input::get('price'),
          'pages' => Input::get('pages'),
          'copies' => Input::get('copies'),
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
                <label class="col-form-label col-md-3 col-sm-3  label-align">Isbn<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="isbn"
                    id="isbn"  />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Title<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="title"
                    id="title"  />
                </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Edition<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="edition" id="edition"  type="text" /></div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Category<span
                    >*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="form-control" id="category" name="category">
                      <option selected disabled> Select the Category</option>
                      <option>Science</option>
                      <option>Technology</option>
                      <option>Computer</option>
                    </select>
                  </div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Author<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" name="author" id="author" data-validate-length="6,8"
                     /></div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Price<span
                    >*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="price" id="price"  type="number" /></div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Pages<span
                    >*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="pages" id="pages" type="number" /></div>
              </div>
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Copies<span
                    >*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" name="copies" id="copies" type="number" /></div>
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
  </div>
</div>
<!-- /page content -->
