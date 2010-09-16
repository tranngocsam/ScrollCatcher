<div class="content_side">
<h2>
<?php if ($this->data["User"]["id"] != NULL) {echo "Edit User";} else { echo "Sign up";} ?>
</h2>
<?php if ($session->check("Message.flash")) { ?>
  <div class="form-warning">
    <?php echo $session->flash();?>
  </div>
<?php } ?>

  <div class="simple-table">
  <?php
    echo $form->create(array("controller" => "User", "action" => "edit", "id" => "edit_user_form"));
  ?>
    <div id="user_form">
        <fieldset>
       <?php
        echo $form->hidden('id');

        if ($form->error("firstname") != "") {
          ?>
          <div class="form-element input-error">
            <div class="form-element-label">
              &nbsp;
            </div>
            <div class="form-element-control">
              <?php echo $form->error("firstname"); ?>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form-element element-error">
            <div class="form-element-label">
              First Name<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="text" class="input-text" name="data[User][firstname]" value="<?php if (isset($this->data["User"]["firstname"])) {echo $this->data["User"]["firstname"];} ?>" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        } else {
          ?>
          <div class="form-element">
            <div class="form-element-label">
              First Name<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="text" class="input-text" name="data[User][firstname]" value="<?php echo $this->data["User"]["firstname"]; ?>" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        }

        if ($form->error("lastname") != "") {
          ?>
          <div class="form-element input-error">
            <div class="form-element-label">
            &nbsp;
            </div>
            <div class="form-element-control">
              <?php echo $form->error("lastname"); ?>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form-element element-error">
            <div class="form-element-label">
              Last Name<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="text" class="input-text" name="data[User][lastname]" value="<?php if (isset($this->data["User"]["lastname"])) {echo $this->data["User"]["lastname"];} ?>" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        } else {
        ?>
          <div class="form-element">
            <div class="form-element-label">
              Last Name<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="text" class="input-text" name="data[User][lastname]" value="<?php echo $this->data["User"]["lastname"]; ?>" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        }

        if ($form->error("email") != "") {
        ?>
        <div class="form-element input-error">
          <div class="form-element-label">
            &nbsp;
          </div>
          <div class="form-element-control">
            <?php echo $form->error("email"); ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="form-element element-error">
          <div class="form-element-label">
            Email<span class="asterisk">*</span>:
          </div>
          <div class="form-element-control">
            <input type="text" class="input-text" name="data[User][email]" value="<?php echo $this->data["User"]["email"]; ?>" />
          </div>
          <div class="clear"></div>
        </div>
        <?php
        } else {
          ?>
          <div class="form-element">
            <div class="form-element-label">
              Email<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="text" class="input-text" name="data[User][email]" value="<?php echo $this->data["User"]["email"]; ?>" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        }

        if ($form->error("clear_password") != "") {
        ?>
        <div class="form-element input-error">
          <div class="form-element-label">
            &nbsp;
          </div>
          <div class="form-element-control">
            <?php echo $form->error("clear_password"); ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="form-element element-error">
          <div class="form-element-label">
            Password<span class="asterisk">*</span>:
          </div>
          <div class="form-element-control">
            <input type="password" id="password" class="input-text" name="data[User][clear_password]" />
          </div>
          <div class="clear"></div>
        </div>
        <?php
        } else {
          ?>
          <div class="form-element">
            <div class="form-element-label">
              Password<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="password" id="password" class="input-text" name="data[User][clear_password]" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        }

        if ($form->error("confirm_password") != "") {
        ?>
        <div class="form-element input-error">
          <div class="form-element-label">
            &nbsp;
          </div>
          <div class="form-element-control">
            <?php echo $form->error("confirm_password"); ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="form-element element-error">
          <div class="form-element-label">
            Confirm password: <span class="asterisk">*</span>:
          </div>
          <div class="form-element-control">
            <input type="password" id="confirm_password" class="input-text" name="data[User][confirm_password]" />
          </div>
          <div class="clear"></div>
        </div>
        <?php
        } else {
          ?>
          <div class="form-element">
            <div class="form-element-label">
              Confirm password<span class="asterisk">*</span>:
            </div>
            <div class="form-element-control">
              <input type="password" id="confirm_password" class="input-text" name="data[User][confirm_password]" />
            </div>
            <div class="clear"></div>
          </div>
          <?php
        }
      ?>
      <!--div class="form-element" id="math_captcha">
        <div class="form-element-label">
          Please enter the sum of < ?php echo $mathCaptcha; ?><span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" class="input-text" name="data[User][security_code]" />
        </div>
        <div class="clear"></div>
      </div-->
      <?php if ($this->data["User"]["id"] == NULL) { ?>
      <div class="form-element">
        <div class="form-element-label">
          &nbsp;
        </div>
        <div class="form-element-control">
          <input type="checkbox" value="agreed" name="data[User][agree]" />&nbsp;I have read and agreed to the Terms Of Services <span class="asterisk">*</span>
        </div>
        <div class="clear"></div>
      </div>
      <?php } ?>

      <div class="form-element" id="form_element_submit_user">
        <div class="form-element-label">
          &nbsp;
        </div>
        <div class="form-element-control">
          <input type="submit" value="Sign up" /><br />
          <a href="<?php echo $html->url("/users/login"); ?>">Login</a>
        </div>
        <div class="clear"></div>
      </div>
      <?php echo $form->end();
    ?>
      </fieldset>
    </div>
  </div>
  
</div>
  <!-- content_side-->