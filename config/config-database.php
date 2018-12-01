      <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body">
              <div class="row">
              <div class="col-md-4">
                  <div class="form-group">

                    <div class="login-box">
                      <div class="login-box-body">
                      <img src="dist/img/logo.jpg" style="max-width: 100%;width: 70%; margin: 40px;">
                      
                      </div><!-- /.login-box-body -->
                    </div><!-- /.login-box -->
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">

                    <div class="login-box">
                      <div class="login-box-body">
                        <h3 class="login-box-msg">Configuration Database </h3>
                        <form action="config/koneksi.php" method="post" id="form0">
                        <div class="form-group has-feedback">
                            <input type="text" name="database_name" id="database_name" class="form-control" placeholder="Database Name" required>
                            <span class="fa fa-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="text" name="hostname"  id="hostname" class="form-control" placeholder="Host" required>
                            <span class="fa fa-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="text" name="port" id="port" class="form-control" placeholder="port" required>
                            <span class="fa fa-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                            <span class="fa fa-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <div class="row">
                            <div class="col-xs-6">
                              <button type="button" class="tes_koneksi btn btn-primary btn-block btn-flat">Tes Koneksi</button>
                            </div><!-- /.col -->
                            
                            <div class="col-xs-6">
                              <button type="submit" name="koneksikan" class="btn btn-success btn-block btn-flat">Koneksikan</button>
                            </div><!-- /.col -->
                          </div>
                        </form>

                      </div><!-- /.login-box-body -->
                    </div><!-- /.login-box -->
                  </div>
                </div>
              </div><!-- .boxrow -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>