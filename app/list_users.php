<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <ul class="pagination pagination-split">
                  <li><a href="#">A</a></li>
                  <li><a href="#">B</a></li>
                  <li><a href="#">C</a></li>
                  <li><a href="#">D</a></li>
                  <li><a href="#">E</a></li>
                  <li>...</li>
                  <li><a href="#">W</a></li>
                  <li><a href="#">X</a></li>
                  <li><a href="#">Y</a></li>
                  <li><a href="#">Z</a></li>
                </ul>
              </div>

              <div class="clearfix"></div>
              <?php  $user = DB::getInstance()->query('SELECT * FROM library_users');
              if (!$user->count()) {
          }else {

             foreach($user->results() as $user){
              ?>
              <div class="col-md-4 col-sm-4  profile_details" style="margin-left: -10px;">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i><?php if ($user->group == 1) {
                      echo "Librarian";
                    }else{ echo "Administrator";}?></i></h4>
                    <div class="left col-md-7 col-sm-7">
                      <h2><?= $user->firstname.' '.$user->lastname?></h2>
                      <hr/>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> Address: <?= $user->address?> </li>
                        <li><i class="fa fa-envelope"></i> Email: <?= $user->email?> </li>
                        <li><i class="fa fa-phone"></i> Phone #: <?= $user->telephone?> </li>
                      </ul>
                    </div>
                    <div class="right col-md-5 col-sm-5 text-center">
                      <img src="<?= $user->profile?>" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                  <div class=" profile-bottom text-center">
                    <div class=" col-sm-6 emphasis">
                      <p class="ratings">
                        <a>4.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star-o"></span></a>
                      </p>
                    </div>
                    <div class=" col-sm-6 emphasis">
                      <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                        </i> <i class="fa fa-comments-o"></i> </button>
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-user"> </i> View Profile
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <?
           }
         }
         ?>






                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
