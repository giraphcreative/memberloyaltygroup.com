<?php

get_header();

?>

	<?php the_showcase(); ?>
	
	<?php the_large_title(); ?>

	<div id="content" class="wrap group content-two-column" role="main">
		<div class="three-quarter right">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>

		<?php the_bubbles() ?>
		</div>
		<div class="quarter sidebar">
			<?php if ( !has_cmb_value( 'left_content' ) ) { ?>
			<p><a href="/demo"><img src="<?php bloginfo( 'template_url' ) ?>/img/button-tour.png"></a></p>
			<p><a href="/blog"><img src="<?php bloginfo( 'template_url' ) ?>/img/button-blog.png"></a></p>
			<div class="sidebar-posts">
			<?php 
			$my_query = "showposts=3";
			$my_query = new WP_Query($my_query);
			if ($my_query->have_posts()) : 
				while ($my_query->have_posts()) : $my_query->the_post(); 
					?>
				<div class="post">
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?>
					<div class="post-title"><?php the_title(); ?></div>
					<div class="quiet">read more &gt;</div></a>
				</div>
					<?php 
				endwhile;
			endif; //end of loop 
			wp_reset_postdata();
			?>
			</div>
			<?php } else { ?>
			<?php show_cmb_wysiwyg_value( 'left_content' ) ?>
			<?php } ?>
		</div>
	</div><!-- #content -->

<?php

get_footer();

?>