<?php //print_r($form); ?>
<?php if ($session->check("Message.flash")) { echo $session->flash();} ?>
<div id="login-form">
  <form name="loginForm" action="<?php echo $html->url('/users/forgot_password', true); ?>" method="post">
    <fieldset style="display: none;">
    <input type="hidden" value="POST" name="_method"/></fieldset>
    <div class="input text required form-element">
      <div class="form-element-label"><label for="UserUsername">Email adress</label></div>
      <div class="form-element-control"><input type="text" value="" maxlength="50" name="data[email]" class="input-text"/></div>
      <div class="clear"></div>
    </div>
    <!--div class="input password form-element">
      <div class="form-element-label"><label for="UserPassword">Enter the result of the following simple math: < ?php echo $mathCaptcha; ?></label></div>
      <div class="form-element-control"><input type="text" size="20" name="data[security_code]" class="input-text"/></div>
      <div class="clear"></div>
    </div-->
    <div class="submit form-element">
      <div class="form-element-label">&nbsp;</div>
      <div class="form-element-control"><input type="submit" value="Login" id="login"/></div>
      <!--input type="submit" value="Login" style="display: none;"/>
      <div class="form-element-label">&nbsp;</div><a href="javascript:void(0)" onclick="if (document.loginForm['data[User][username]'].value != '' && document.loginForm['data[User][password]'].value != '') {document.loginForm.submit();} return false;"><img src="<?= $html->url('/images/login_btn.jpg', true); ?>" alt ="Login"/></a-->
    </div>
  </form>
</div>