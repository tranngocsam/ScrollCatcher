<script type="text/javascript" src="<?php echo $html->url("/js/zeroclipboard/ZeroClipboard.js"); ?>"></script>

<div class="content_side">
<h2>
<?php if ($this->data["ScrollCatcher"]["id"] != NULL) {echo "Edit ScrollCatcher";} else { echo "Create ScrollCatcher";} ?>
</h2>
<?php if ($session->check("Message.flash")) { ?>
  <div class="form-warning">
    <?php echo $session->flash();?>
  </div>
<?php } ?>

<div class="simple-table">
<?php 
  echo $form->create(array("controller" => "ScrollCatcher", "action" => "edit", "id" => "edit_scroll_catcher_form"));
?>
<div id="user_form">
	<fieldset>
   <?php
    echo $form->hidden('id');

    if ($form->error("name") != "") {
      ?>
      <div class="form-element input-error">
        <div class="form-element-label">
          &nbsp;
        </div>
        <div class="form-element-control">
          <?php echo $form->error("name"); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="form-element">
        <div class="form-element-label">
          Name<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" class="input-text" name="data[ScrollCatcher][name]" value="<?php if (isset($this->data["ScrollCatcher"]["name"])) {echo $this->data["ScrollCatcher"]["name"];} ?>" />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    } else {
      ?>
      <div class="form-element">
        <div class="form-element-label">
          Name<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" class="input-text" name="data[ScrollCatcher][name]" value="<?php echo $this->data["ScrollCatcher"]["name"]; ?>" />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }

    if ($form->error("speed") != "") {
      ?>
      <div class="form-element input-error">
        <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("speed"); ?>
      </div>
      <div class="clear"></div>
      </div>
      <div class="form-element">
        <div class="form-element-label">
          Scroll speed (pixels/seconds)<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" size="3" readonly id="speed_input" name="data[ScrollCatcher][speed]" value="<?php if (isset($this->data["ScrollCatcher"]["speed"]) && $this->data["ScrollCatcher"]["speed"]) {echo $this->data["ScrollCatcher"]["speed"];} else {echo "0";} ?>" />
          <div id="speed_control"></div>
        </div>
        <div class="clear"></div>
      </div>
      <?php
    } else {
    ?>
      <div class="form-element">
        <div class="form-element-label">
          Scroll speed (pixels/seconds)<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" size="3" readonly id="speed_input" name="data[ScrollCatcher][speed]" value="<?php if (isset($this->data["ScrollCatcher"]["speed"]) && $this->data["ScrollCatcher"]["speed"]) {echo $this->data["ScrollCatcher"]["speed"];} else {echo "0";} ?>" />
          <div id="speed_control"></div>
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }

    if ($form->error("distance") != "") {
    ?>
    <div class="form-element input-error">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("distance"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element">
      <div class="form-element-label">
        Distance (pixels)<span class="asterisk" title="NUmber of pixels user scrolls before the alert displays">*</span>:
      </div>
      <div class="form-element-control">
        <input type="text" size="3" readonly id="distance_input" name="data[ScrollCatcher][distance]" value="<?php if (isset($this->data["ScrollCatcher"]["distance"]) && $this->data["ScrollCatcher"]["distance"]) {echo $this->data["ScrollCatcher"]["distance"];} else {echo "0";} ?>" />
        <div id="distance_control"></div>
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element">
        <div class="form-element-label">
          Distance (pixels)<span class="asterisk" title="NUmber of pixels user scrolls before the alert displays">*</span>:
        </div>
        <div class="form-element-control">
          <input type="text" size="3" readonly id="distance_input" name="data[ScrollCatcher][distance]" value="<?php if (isset($this->data["ScrollCatcher"]["distance"]) && $this->data["ScrollCatcher"]["distance"]) {echo $this->data["ScrollCatcher"]["distance"];} else {echo "0";} ?>" />
          <div id="distance_control"></div>
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
    ?>

    <?php
    if ($form->error("always_monitor") != "") {
    ?>
    <div class="form-element input-error">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("always_monitor"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element">
      <div class="form-element-label">
        Always monitor:
      </div>
      <div class="form-element-control">
        <input type="checkbox" value="1" name="data[ScrollCatcher][always_monitor]" <?php if (isset($this->data["ScrollCatcher"]["always_monitor"]) && $this->data["ScrollCatcher"]["always_monitor"] != NULL) {echo "checked='checked'"; } ?> />
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element">
        <div class="form-element-label">
          Always monitor:
        </div>
        <div class="form-element-control">
          <input type="checkbox" value="1" name="data[ScrollCatcher][always_monitor]" <?php if (isset($this->data["ScrollCatcher"]["always_monitor"]) && $this->data["ScrollCatcher"]["always_monitor"] != NULL) {echo "checked='checked'"; } ?> />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
    ?>

      <div class="form-element">
        <div class="form-element-label">
          Type<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <select name="data[ScrollCatcher][catcher_type_id]" id="catcher_type_id">
            <?php foreach ($catcher_types as $catcher_type_id => $catcher_type_name) { ?>
              <?php if (isset($this->data["ScrollCatcher"]["catcher_type_id"]) &&
                      $catcher_type_id == $this->data["ScrollCatcher"]["catcher_type_id"]) { ?>
                <option value="<?php echo $catcher_type_id; ?>" selected="selected"><?php echo $catcher_type_name; ?></option>
              <?php } else { ?>
                <option value="<?php echo $catcher_type_id; ?>"><?php echo $catcher_type_name; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
        </div>
        <div class="clear"></div>
      </div>
    <?php
    if ($form->error("alert_content") != "") {
    ?>
    <div class="form-element input-error" id="alert_content_error_container">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("alert_content"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element" id="alert_content_container">
      <div class="form-element-label">
        Alert content: <span class="asterisk">*</span>:
      </div>
      <div class="form-element-control">
        <textarea name="data[ScrollCatcher][alert_content]" class="input-long-text" cols="20" rows="5"><?php echo $this->data["ScrollCatcher"]["alert_content"]; ?></textarea>
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element" id="alert_content_container">
        <div class="form-element-label">
          Alert content<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <textarea name="data[ScrollCatcher][alert_content]" class="input-long-text" cols="20" rows="5"><?php echo $this->data["ScrollCatcher"]["alert_content"]; ?></textarea>
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
  ?>

  <?php
    if ($form->error("iframe_url") != "") {
    ?>
    <div class="form-element input-error" id="iframe_url_error_container">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("iframe_url"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element" id="iframe_url_container">
      <div class="form-element-label">
        Iframe url: <span class="asterisk">*</span>:
      </div>
      <div class="form-element-control">
        <input name="data[ScrollCatcher][iframe_url]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["iframe_url"]; ?>" />
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element" id="iframe_url_container">
        <div class="form-element-label">
          Iframe url<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input name="data[ScrollCatcher][iframe_url]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["iframe_url"]; ?>" />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
  ?>
  <?php
    if ($form->error("dialogue_width") != "") {
    ?>
    <div class="form-element input-error" id="dialogue_width_error_container">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("dialogue_width"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element" id="dialogue_width_container">
      <div class="form-element-label">
        Dialogue width: <span class="asterisk">*</span>:
      </div>
      <div class="form-element-control">
        <input name="data[ScrollCatcher][dialogue_width]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["dialogue_width"]; ?>" />
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element" id="dialogue_width_container">
        <div class="form-element-label">
          Dialogue width<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input name="data[ScrollCatcher][dialogue_width]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["dialogue_width"]; ?>" />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
  ?>
  <?php
    if ($form->error("dialogue_height") != "") {
    ?>
    <div class="form-element input-error" id="dialogue_height_error_container">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("dialogue_height"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element" id="dialogue_height_container">
      <div class="form-element-label">
        Dialogue height: <span class="asterisk">*</span>:
      </div>
      <div class="form-element-control">
        <input name="data[ScrollCatcher][dialogue_height]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["dialogue_height"]; ?>" />
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element" id="dialogue_height_container">
        <div class="form-element-label">
          Dialogue height<span class="asterisk">*</span>:
        </div>
        <div class="form-element-control">
          <input name="data[ScrollCatcher][dialogue_height]" class="input-text" value="<?php echo $this->data["ScrollCatcher"]["dialogue_height"]; ?>" />
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
  ?>

      <?php
    if ($form->error("Description") != "") {
    ?>
    <div class="form-element input-error" id="alert_content_error_container">
      <div class="form-element-label">
        &nbsp;
      </div>
      <div class="form-element-control">
        <?php echo $form->error("description"); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="form-element" id="alert_content_container">
      <div class="form-element-label">
        Description:
      </div>
      <div class="form-element-control">
        <textarea name="data[ScrollCatcher][description]" class="input-long-text" cols="20" rows="5"><?php echo $this->data["ScrollCatcher"]["description"]; ?></textarea>
      </div>
      <div class="clear"></div>
    </div>
    <?php
    } else {
      ?>
      <div class="form-element" id="alert_content_container">
        <div class="form-element-label">
          Description:
        </div>
        <div class="form-element-control">
          <textarea name="data[ScrollCatcher][description]" class="input-long-text" cols="20" rows="5"><?php echo $this->data["ScrollCatcher"]["description"]; ?></textarea>
        </div>
        <div class="clear"></div>
      </div>
      <?php
    }
  ?>

  <div class="form-element" id="form_element_submit_user">
    <div class="form-element-label">
      &nbsp;
    </div>
    <div class="form-element-control">
      <input type="hidden" name="data[ScrollCatcher][user_id]" value="<?php echo $current_user; ?>" />
      <input type="submit" value="Save" />
    </div>
    <div class="clear"></div>
  </div>
  <?php echo $form->end();
?>
  </fieldset>
</div>
</div>
</div>
<?php if (count($scroll_catchers) > 0) { ?>
  <table class="simple-table">
    <tr class="simple-table-header">
      <th class="wide-column">
        Catcher name
      </th>
      <th class="medium-column">
        Description
      </th>
      <th class="narrow-column">
        Actions
      </th>
      <th class="medium-column">
        Statistics
      </th>
    </tr>
    <?php foreach ($scroll_catchers as $scroll_catcher_id => $scroll_catcher) { ?>
      <tr>
        <td>
          <?php echo $scroll_catcher["name"]; ?><br />
          <input class="copy-text" size="45" type="text" readonly value="<script src='<?php echo $html->url("/scroll_catchers/script/".$scroll_catcher["access_code"], true);?>'></script>" /><div class="copy-catcher-container" style="position: relative"><input type="button" value="Copy to clipboard" class="copy-catcher"/></div>
          <a href="<?php echo $html->url("/scroll_catchers/test/".$scroll_catcher["access_code"]); ?>" target="_blank">Test</a>
        </td>
        <td>
          <?php echo $scroll_catcher["description"]; ?>
        </td>
        <td>
          <a href="<?php echo $html->url("/");?>scroll_catchers/edit/<?php echo $scroll_catcher_id; ?>">Edit</a><br />
          <a class="delete-action" href="<?php echo $html->url("/");?>scroll_catchers/delete/<?php echo $scroll_catcher_id; ?>">Delete</a>
        </td>
        <td>
          Number of monitored users: <?php echo $scroll_catcher["number_of_monitored_users"]; ?><br />
          Number of caught users: <?php echo $scroll_catcher["number_of_caught_users"]; ?>
        </td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var selectedText = jQuery("#catcher_type_id option:selected").html();

    // Show/hide appropriate control on load.
    showHideAlertOption(selectedText);

    jQuery("#catcher_type_id").change(function() {
      var selectedText = jQuery("#catcher_type_id option:selected").html();

      showHideAlertOption(selectedText);
    });

    ZeroClipboard.setMoviePath("<?php echo $html->url("/js/zeroclipboard/ZeroClipboard.swf"); ?>");

    jQuery(".copy-catcher").each(function() {
      var clip = new ZeroClipboard.Client();
      clip.setText(jQuery(this).parent().prev().val());
      clip.glue(jQuery(this)[0], jQuery(this).parent()[0]);
    });
    
    jQuery(".delete-action").click(function() {
      return confirm("Are you sure to delete this catcher?");
    });

    //Show slider.
    jQuery("#speed_control").slider({value: <?php echo isset($this->data["ScrollCatcher"]["speed"])? $this->data["ScrollCatcher"]["speed"] : 0; ?>, max: 10000,
                                     change: function() {jQuery("#speed_input").val(jQuery("#speed_control").slider("option", "value"))}});
    jQuery("#distance_control").slider({value: <?php echo isset($this->data["ScrollCatcher"]["distance"])? $this->data["ScrollCatcher"]["distance"] : 0; ?>, max: 10000, change: function() {jQuery("#distance_input").val(jQuery("#distance_control").slider("option", "value"))}});
  });

  function showHideAlertOption(selectedText) {
    if (selectedText == "Alert box") {
      jQuery("#alert_content_error_container").show();
      jQuery("#alert_content_container").show();
      jQuery("#iframe_url_error_container").hide();
      jQuery("#iframe_url_container").hide();
      jQuery("#dialogue_width_error_container").hide();
      jQuery("#dialogue_width_container").hide();
      jQuery("#dialogue_height_error_container").hide();
      jQuery("#dialogue_height_container").hide();
    } else if (selectedText == "Dialogue") {
      jQuery("#alert_content_error_container").hide();
      jQuery("#alert_content_container").hide();
      jQuery("#iframe_url_error_container").show();
      jQuery("#iframe_url_container").show();
      jQuery("#dialogue_width_error_container").show();
      jQuery("#dialogue_width_container").show();
      jQuery("#dialogue_height_error_container").show();
      jQuery("#dialogue_height_container").show();
    } else {
      jQuery("#alert_content_error_container").hide();
      jQuery("#alert_content_container").hide();
      jQuery("#iframe_url_error_container").show();
      jQuery("#iframe_url_container").show();
      jQuery("#dialogue_width_error_container").hide();
      jQuery("#dialogue_width_container").hide();
      jQuery("#dialogue_height_error_container").hide();
      jQuery("#dialogue_height_container").hide();
    }
  }
</script>
  <!-- content_side-->