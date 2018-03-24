<div class="login-box">
  <div class="login-logo">
    <?php __a('<b>'.SITE_TITLE.'</b>', SITE_URL);?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to your account</p>

    <?php __form();?>
    <?php __flashSession();?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
      </div>
    </form>
    <?php __a('I forgot my password','auth/forgot_password');?><br/>

  </div>
</div>