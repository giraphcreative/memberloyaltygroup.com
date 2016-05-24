<?php


function the_large_title() {

	// get the slides
	if ( has_cmb_value( 'large-title' ) ) {
		?>
		<div class="large-title wrap">
			<h1><?php show_cmb_value( 'large-title' ) ?></h1>
			<?php if ( has_cmb_value( 'large-title-subtitle' ) ) { ?>
			<h3><?php show_cmb_value( 'large-title-subtitle' ) ?></h3>
			<?php } ?>
		</div>
		<?php
	}
	
}


?>