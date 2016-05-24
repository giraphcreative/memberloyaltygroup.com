<?php


function the_large_title() {

	$slides = get_post_meta( get_the_ID(), CMB_PREFIX . "showcase", 1 );

	// get the slides
	if ( has_cmb_value( 'large-title' ) ) {
		?>
		<div class="large-title wrap <?php print ( !empty( $slides ) ? 'has-showcase' : '' ); ?>">
			<h1><?php show_cmb_value( 'large-title' ) ?></h1>
			<?php if ( has_cmb_value( 'large-title-subtitle' ) ) { ?>
			<h3><?php show_cmb_value( 'large-title-subtitle' ) ?></h3>
			<?php } ?>
		</div>
		<?php
	}
	
}


?>