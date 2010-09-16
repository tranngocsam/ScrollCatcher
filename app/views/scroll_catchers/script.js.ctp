var previousPosition = jQuery(window).scrollTop();
var currentPosition = previousPosition;
var movedDistance = currentPosition;
var previousTime = 0;
var currentTime = 0;
var now = null;
var isDialogueOpened = false;

var specifiedSpeed = <?php echo $scroll_catcher["ScrollCatcher"]["speed"]; ?>;

var specifiedDistance = <?php echo $scroll_catcher["ScrollCatcher"]["distance"]; ?>;

var repeat = <?php if (isset($scroll_catcher["ScrollCatcher"]["always_monitor"]) && $scroll_catcher["ScrollCatcher"]["always_monitor"]) {echo "true"; } else {echo "false"; } ?>;
var catcherTypeId = <?php echo $scroll_catcher["ScrollCatcher"]["catcher_type_id"]; ?>;
var alertContent = "<?php if (isset($scroll_catcher["ScrollCatcher"]["alert_content"]) && $scroll_catcher["ScrollCatcher"]["alert_content"]) {echo $scroll_catcher["ScrollCatcher"]["alert_content"]; } else {echo ""; } ?>";
var iframeURL = "<?php if (isset($scroll_catcher["ScrollCatcher"]["iframe_url"]) && $scroll_catcher["ScrollCatcher"]["iframe_url"]) {echo $scroll_catcher["ScrollCatcher"]["iframe_url"]; } else {echo ""; } ?>";
var dialogueWidth = <?php if (isset($scroll_catcher["ScrollCatcher"]["dialogue_width"]) && $scroll_catcher["ScrollCatcher"]["dialogue_width"]) {echo $scroll_catcher["ScrollCatcher"]["dialogue_width"]; } else {echo "0"; } ?>;
var dialogueHeight = <?php if (isset($scroll_catcher["ScrollCatcher"]["dialogue_height"]) && $scroll_catcher["ScrollCatcher"]["dialogue_height"]) {echo $scroll_catcher["ScrollCatcher"]["dialogue_height"]; } else {echo "0"; } ?>;

jQuery(document).ready(function() {
	jQuery.getScript("<?php echo $html->url("/js/jquery-ui-1.8.1.custom.min.js", true); ?>");
	jQuery.getScript("<?php echo $html->url("/js/jquery.fancybox-1.3.1.js", true); ?>");
	loadCSS("<?php echo $html->url("/css/jquery.fancybox-1.3.1.css", true); ?>");
	loadCSS("<?php echo $html->url("/css/jquery-ui-1.8.1.custom.css", true); ?>");
    fixFancyboxCloseButton();
	jQuery(window).bind("scroll", monitorScroll);
    jQuery.getScript("<?php echo $html->url("/scroll_catchers/begin_monitor/".$scroll_catcher["ScrollCatcher"]["access_code"], true); ?>");
});

function monitorScroll(event) {
	now = new Date();
	currentTime = now.getTime();

	if (previousTime == 0) {
		previousTime = currentTime;
	}

	currentPosition = jQuery(window).scrollTop();
    var deltaDistance = Math.abs(currentPosition - previousPosition);
    movedDistance += deltaDistance;
    
	var deltaTime = currentTime - previousTime;
    //console.log("Line 47 ditance: " + movedDistance + ", speed: " + (deltaDistance)/(deltaTime/1000));
	if (deltaTime > 0 && movedDistance > specifiedDistance && (deltaDistance)/(deltaTime/1000) > specifiedSpeed) {
		if (catcherTypeId == 1) {
			jQuery(window).unbind("scroll");
			alert(alertContent);
			if (repeat) {jQuery(window).bind("scroll", monitorScroll);}
		} else if (catcherTypeId == 2) {
			loadDialogue(dialogueWidth, dialogueHeight, iframeURL);
		} else if (catcherTypeId == 3) {
			loadIFrame(iframeURL);
		}

        jQuery.getScript("<?php echo $html->url("/scroll_catchers/catch_scroll/".$scroll_catcher["ScrollCatcher"]["access_code"], true); ?>");
	}

	previousTime = currentTime;
	previousPosition = currentPosition;
}

function loadDialogue(width, height, iframe_url) {
  if (jQuery("#catcher_container").length == 0) {
      var appendText = "<div id='catcher_container' style='display:none'><iframe width='" + width + "' height='" + height + "' src='" + iframe_url + "'></iframe></div>";
      jQuery("body").append(appendText);
      jQuery("#catcher_container").dialog({modal: true, width: width + 40, height: height + 70, minWidth: width + 40, minHeight: height + 70, autoOpen: false, close: function () {if (repeat) {jQuery(window).bind("scroll", monitorScroll);}}});
  }

  jQuery("#catcher_container").dialog("close");
  jQuery("#catcher_container").dialog("open");
  
  x = jQuery(window).width();
  y = jQuery(window).height();
  x = (x - width - 40)/2;
  y = (y - height - 70)/2;

  if (y < 0) {
    y = 0;
  }

  jQuery("#catcher_container").dialog("option", "position", [x, y]);
  jQuery("#catcher_container").dialog({width: width + 40});
  jQuery("#catcher_container").dialog({height: height + 70});
}

function loadIFrame(iframe_url) {
	if (jQuery("#catcher_container").length == 0) {
		var appendText = "<div id='catcher_container' style='display:none'><a href='" + iframe_url + "'>Show Catcher iFrame</a></div>";
		jQuery("body").append(appendText);
		jQuery("#catcher_container a").fancybox({
				'width'				: '100%',
				'height'			: '100%',
				'autoScale'     	: true,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
                'centerOnScroll'    : true,
				'onClosed' : function () {if (repeat) {jQuery(window).bind("scroll", monitorScroll)}},
				'onStart' : function() {jQuery(window).unbind("scroll")}
		});
  }

  jQuery("#catcher_container a").click();
}

function loadCSS(css_url) {
  jQuery(document.createElement('link')).attr({type: 'text/css', href: css_url, rel: "stylesheet", media: "screen"}).appendTo(jQuery("head"));
}

function fixFancyboxCloseButton() {
  jQuery("head").append("<style type='text/css'>.fancybox-ie #fancybox-close {background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $html->url("/css/fancy_close.png", true); ?>', sizingMethod='scale');}</style>");
}