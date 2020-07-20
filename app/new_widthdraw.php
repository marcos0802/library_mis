
<div class="right_col" role="main">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Widthdraw</h2>
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
               <div class="col-sm-4">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Allowed Students</h2>
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
                            <div class="col-sm-12">
                              <div class="card-box table-responsive">
                      <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Identification(Names) </th>
                            <th>Email </th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Insitution</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                             $student = DB::getInstance()->query('SELECT * FROM library_students WHERE status=1');
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
              <div class="col-sm-4">
                <div class="col-md-12 col-sm-9 ">

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Book I</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                      <!-- user detail -->
                      <form action="" method="POST">
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="student_names"
                              id="student_names" />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="email"
                              id="email"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="telephone"
                              id="telephone"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="inst"
                              id="inst"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="book_title"
                              id="book_title"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="book_number"
                              id="book_number"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="author"
                              id="author"  />
                          </div>
                        </div>

                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" type="date" name="return"  id="return"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" type="hidden" name="id_b"  id="id_b"  />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <div class="col-md-12 col-sm-6">
                            <input class="form-control" type="hidden" name="id_s"  id="id_s"  />
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
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="col-sm-12">
                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Available Books</h2>
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
                  <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                      <th>#ID</th>
                      <th>International_Book_Number(ISBN)</th>
                      <th>Identification(Book_Title)</th>
                      <th>Edition</th>
                      <th>Category</th>
                      <th>Book_Author</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                       $books = DB::getInstance()->query('SELECT * FROM library_books WHERE status = 1');
                       if (!$books ->count()) {
                       }else {

                          foreach($books->results() as $book){
                           echo "<tr>";
                             echo "<td>".$book->id."</td>";
                             echo "<td>".$book->isbn."</td>";
                             echo "<td>".$book->title."</td>";
                             echo "<td>".$book->edition."</td>";
                             echo "<td>".$book->category."</td>";
                             echo "<td>".$book->author."</td>";
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
     </div>
    </div>
    <script>

        var f1 = document.getElementById('book_title');
        var isbn = document.getElementById('book_number');
        var author = document.getElementById('author');
        var f2 = document.getElementById('student_names');
        var email = document.getElementById('email');
        var f3 = document.getElementById('telephone');
        var f4 = document.getElementById('inst');
        var idbook = document.getElementById('id_b');
        var idstud = document.getElementById('id_s');

        (function () {
            if (window.addEventListener) {
              window.addEventListener('load', run, false);
            } else if (window.attachEvent) {
              window.attachEvent('onload', run);
            }

          function run() {

            var t = document.getElementById('datatable');
            t.onclick = function (event) {
            event = event || window.event; //IE8
            var target = event.target || event.srcElement;
            while (target && target.nodeName != 'TR') { // find TR
            target = target.parentElement;
             }
             var cells = target.cells;
             if (!cells.length || target.parentNode.nodeName == 'THEAD') {
                 return;
             }

             idbook.value = cells[0].innerHTML;
             f1.value = cells[1].innerHTML;
             isbn.value = cells[2].innerHTML;
             author.value = cells[5].innerHTML;

           };
          }
        })();

        (function () {
           if (window.addEventListener) {
               window.addEventListener('load', run, false);
           } else if (window.attachEvent) {
               window.attachEvent('onload', run);
           }

           function run() {

              var t = document.getElementById('datatable-fixed-header');
              t.onclick = function (event) {
              event = event || window.event; //IE8
              var target = event.target || event.srcElement;
              while (target && target.nodeName != 'TR') { // find TR
              target = target.parentElement;
               }

             var cells = target.cells;
             if (!cells.length || target.parentNode.nodeName == 'THEAD') {
                 return;
             }

               idstud.value = cells[0].innerHTML;
               f2.value = cells[1].innerHTML;
               email.value = cells[2].innerHTML;
               f3.value = cells[4].innerHTML;
               f4.value = cells[5].innerHTML;

             };
            }
          })();
    </script>
    <?php
    if (Input::exists()) {
          // register student.
          $user =  new User();
          $fn = $user->data()->firstname;
          $ln = $user->data()->lastname;
          $register = $fn.' '.$ln;
          $widthdraw =  new Widthdraw();
          try {
            $widthdraw->create(array(
              'book_id' => Input::get('id_b'),
              'book_isbn' => Input::get('book_number'),
              'book_title' => Input::get('book_title'),
              'author' => Input::get('author'),
              'student_id' => Input::get('id_s'),
              'student_names' => Input::get('student_names'),
              'email' => Input::get('email'),
              'institution' => Input::get('inst'),
              'issue_date'=> date('Y-m-d H:i:s'),
              'return_date'=> Input::get('return'),
              'issued_by' => $register,
              'c_date' => date('Y-m-d H:i:s'),

            ));
            echo "oak";
            echo "<script>window.open('execute.php?request=Widthdraw','_self')</script>";
          } catch (Exception $e) {
            die($e->getMessage());
          }


        }


     ?>
