<div id="left_content" class="left-element">
  <div class="clb">
    <div>
      <a href="<?php echo $html->url("/users/help"); ?>">Help</a><br />
      <?php if ($logged_in) { ?>
        <a href="<?php echo $html->url("/users/logout"); ?>">Logout</a>
      <?php } ?>
    </div>
  </div>
</div>
