<div class="navbar-fixed">
    <nav class="blue darken-2" role="navigation">
      <div class="nav-wrapper container">
        <ul class="right hide-on-med-and-down">
          <li><a href="<?php __url('');?>" target="_blank"><?php __(APP_TITLE);?> <i class="material-icons right">open_in_new</i></a></li>
          <li><a href="javascript:;" id="more_vertical"><i class="material-icons">more_vert</i></a></li>
        </ul>

        <ul class="side-nav js_nav_links fixed" id="sidebar-nav">
         <!--  <li>
            <a href="<?php __url('');?>" class="green">
                <img src="<?php __url('logo.png');?>" alt="<?php __(APP_TITLE);?>" class="responsive-img"/>
              </a>
          </li> -->
          <li>
            <div class="user-view">
              <div class="background blue"> </div>
              <div class="row">
                <div class="col s4">
                  <img class="circle responsive-img" src="<?php __url('themes/admin/img/user.png');?>">
                </div>
                <div class="col s8">
                  <span class="white-text name"><?php __getAuthSession('first_name');?></span>
                  <span class="white-text name mb0"><?php __getAuthSession('role');?></span>
                </div>
              </div>
            </div>
          </li>
          <li> <a href="<?php __url(MODULE_ALIAS);?>" target="_self"><i class="material-icons">home</i> Dashboard</a> </li>
          <li> <a href="<?php __url(MODULE_ALIAS.'/pages');?>" target="_self"><i class="material-icons">pages</i> Pages</a> </li>
          <li> <a href="<?php __url(MODULE_ALIAS.'/posts');?>" target="_self"><i class="material-icons">rate_review</i> Posts</a> </li>
          <li class="divider"></li>
          <li class="white">
            <ul class="collapsible collapsible-accordion">
              <li>
                <a class="collapsible-header waves-effect waves-blue">
                  <i class="material-icons">settings</i> Settings <i class="material-icons right">arrow_drop_down</i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/settings');?>" target="_self"><i class="material-icons">website</i> Site Settings</a></li>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/menus');?>" target="_self"><i class="material-icons">navigation</i> Menu Settings</a></li>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/account-settings');?>" target="_self"><i class="material-icons">account_box</i> Account Settings</a></li>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/themes');?>" target="_self"><i class="material-icons">widgets</i> Theme Customization</a></li>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/route');?>" target="_self"><i class="material-icons">directions</i> Route Settings</a></li>
                    <li><a class="waves-effect waves-blue" href="<?php __url(MODULE_ALIAS.'/logging');?>" target="_self"><i class="material-icons">error_outline</i> Error Logging</a></li>
                    <li><div class="divider"></div></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
      </div>
    </nav>
  </div>

<ul class="menu" data-menu data-menu-toggle="#more_vertical">
  <li> <a href="<?php __url(MODULE_ALIAS.'/update-password');?>" target="_self">Update Password</a> </li>
  <li class="menu-separator"></li>
  <li> <a href="<?php __url(MODULE_ALIAS.'/logout');?>" target="_self">Logout</a> </li>
</ul>

