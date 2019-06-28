<div class="row">
  <?php __form(MODULE_ALIAS.'/auth', ['class' => 'col l4 offset-l4 m6 offset-m3 s12', 'target' => '_self']);?>
    <br/>
    <h4 class="header blue-text center-align"><?php __(_config('APP_TITLE'));?></h4>

    <div class="card-panel vertically_centered">
      <div class="row">
        <p class="header center-align">Sign in to start your session</p>
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

