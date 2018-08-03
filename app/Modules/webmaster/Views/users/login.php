<div class="row">
        <?php __form(MODULE_ALIAS.'/auth', ['class' => 'col s6 offset-s3', 'target' => '_self']);?>
        <h4 class="header blue-text">Enter your credentials to login to the system</h4>
        
        <div class="card-panel vertically_centered">
      <div class="row">
        <h3 class="header red-text center-align">Login</h3>
        <?php __flashSession();?>
        
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="text" name="email" class="validate" required="required">
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="icon_telephone" type="password" name="password" class="validate" required="required">
          <label for="icon_telephone">Password</label>
        </div>
        <div class="input-field col s12">
            <button class="btn waves-effect waves-light right" type="submit" name="actiontask" value="login">Login
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="input-field col s12">
          <a href="">Forgot Password</a>
        </div>
      </div>
      </div>
    </form>
  </div>