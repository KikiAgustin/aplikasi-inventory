<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Login </b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan masukan username dan password</p>
      <br>

      <?php if ($this->session->flashdata('alert_user') == 'wrong') : ?>
        <div class="alert alert-danger" style="margin: 10px">
          <center>Login gagal.</center>
        </div>
      <?php endif; ?>

      <?php echo form_open('auth/login'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      </form>

      <a href="<?= base_url() ?>auth_hrd/login">
        <h5><b>- Login Sebagai Manajer -</b></h5>
      </a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->