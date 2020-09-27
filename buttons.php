<?php

// [floatingButtons target="targetDivId"]btn-class-1 btn-class-2[/floatingButtons]
function evtcal_floatingButtons_func($atts, $content=null) {
	$a = shortcode_atts( array(
	), $atts );

	$out = "<div class='evtcal-floating-button-container'>";
	$buttonClasses = ['addEvent', 'scrollToToday'];
	if (evtcal_currentUserCanSetPublic()) {
		$buttonClasses[] = 'editCategories';
	}
	$index = 0;
	foreach ($buttonClasses as $class) {
		if ($index != 0) {
			$orderClass = 'other';
			$bottomPos = 16 + 64 + 8 + ($index-1) * 56;
		} else {
			$orderClass = 'first';
			$bottomPos = 16;
		}
		$addStyle = "bottom: {$bottomPos}px;";
		$out .= "<button class='evtcal-floating-button btn $class $orderClass' style='$addStyle'>"
			  . "<span class='$class'></span></button>";
		$index++;
	}
	return $out . '</div>';

}
add_shortcode( 'events-calendar-buttons', 'evtcal_floatingButtons_func' );