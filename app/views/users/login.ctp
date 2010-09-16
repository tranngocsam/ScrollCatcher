<div id="login_page">
    <div class="from-warning">
      <?php if ($session->check("Message.flash")) {echo $session->flash();} else {echo "&nbsp;";} ?>
    </div>
  <form name="loginForm" action="<?php echo $html->url('/users/login', true); ?>" method="post">
    <div class="form-element" style="height: 22px;">
      <div class="form-element-label">E-mail address</div>
      <div class="form-element-control"><input type="text" id="UserUsername" value="" maxlength="50" size="20" name="data[User][email]" class="input-text"/></div>
      <div class="clear"></div>
    </div>
    <div class="form-element">
      <div class="form-element-label">Password</div>
      <div class="form-element-control"><input type="password" id="UserPassword" value="" size="20" name="data[User][password]" class="input-text"/></div>
      <div class="clear"></div>
    </div>
    <div class="form-element">
      <div class="form-element-label">&nbsp;</div>
      <div class="form-element-control">
        <input type="submit" value="Login" id="login"/><br />
        <a href="<?php echo $html->url("/users/edit"); ?>">Sign up</a>
      </div>
    </div>
  </form>
</div>