
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        All
                        <small>Users</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
                        <li class="active">All Users</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">


                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">All Users on your system </h3>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary pull-right m-t" data-toggle="modal" data-target="#exampleModal">
                            Add New Users
                          </button>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <?php

                                        foreach ($headers as $header => $value) {
                                            echo '<th>'.$value.'</th>';
                                        }

                                       ?>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                  foreach ($Data as $row) {
                                      echo '<tr>';
                                        foreach ($row as $key => $value) {
                                          echo '<td>'.$value.'</td>';
                                        }
                                      echo '</tr>';
                                  }

                                 ?>

                              </tbody>
                              <tfoot>
                                  <tr>
                                    <?php

                                      foreach ($headers as $header => $value) {
                                          echo '<th>'.$value.'</th>';
                                      }

                                     ?>
                                  </tr>
                              </tfoot>
                          </table>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">

                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form id="addUser" role="form" method="POST" action="<?php echo base_url();?>User/add">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="JDoe">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label >User Type</label>
                                    <select class="form-control" id="type" name="type">
                                      <option value="reporter">Reporter</option>
                                      <option value="admin">Admin</option>
                                    </select>
                                </div>

                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addUser" class="btn btn-primary">Add User</button>
              </div>
            </div>
          </div>
        </div>
