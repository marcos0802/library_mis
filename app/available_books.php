<div class="right_col" role="main">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
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
          <div class="x_content">
            <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">

              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Isbn </th>
                  <th>Title </th>
                  <th>Edition</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Copies</th>
                  <th>Status</th>
                  <th>Registred by</th>

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
                         echo "<td>".$book->copies."</td>";
                         echo "<td>".$book->status."</td>";
                         echo "<td>".$book->added_by."</td>";
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
