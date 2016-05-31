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
			<p><a href="http://memberloyaltygroup.hs-sites.com/see-our-program-firsthand?__hssc=34972414.3.1464702047606&__hstc=34972414.d75c55d67035020538110b8a51628157.1432070127206.1463595566613.1464702047606.52&__hsfp=2207488183&hsCtaTracking=417f601b-172e-460b-9d80-7c4b77b2382b%7C3a02499d-7ff4-4fa6-bcb6-6f761903da1c"><img src="<?php bloginfo( 'template_url' ) ?>/img/button-tour.png"></a></p>
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