<?php


function the_bubbles() {

	// get the slides
	$bubbles = get_post_meta( get_the_ID(), CMB_PREFIX . "bubble", 1 );

	if ( !empty( $bubbles ) ) {
		?>
		<div class="bubbles">
		<?php
		$count = 0;
		foreach ( $bubbles as $key => $bubble ) {
			if ( !empty( $bubble["title"] ) && !empty( $bubble["image"] ) ) {

				// store the title and subtitle
				$title = ( isset( $bubble["title"] ) ? $bubble["title"] : '' );
				$content = ( isset( $bubble["content"] ) ? $bubble["content"] : '' );
				$link = ( isset( $bubble["link"] ) ? $bubble["link"] : '' );

				// check if it's an image or video
				if ( p_is_image( $bubble["image"] ) ) {
					// it's an image, so resize it and generate an img tag.
					$image = '<img src="' . $bubble["image"] . '">';
				}

				?>
			<div class="bubble">
				<?php print $image; ?>
				<?php if ( !empty( $title ) ) { ?><p class="bubble-title"><?php print $title; ?></p><?php } ?>
				<?php if ( !empty( $content ) || !empty( $link ) ) { ?><p><?php print $content; ?> <?php if ( !empty( $link ) ) { ?><a href="<?php print $link ?>">read more ></a><?php } ?></p><?php } ?>
			</div>
				<?php
				$count++;
			}
		}
		?>
		</div>
		<?php
	}
}


?>