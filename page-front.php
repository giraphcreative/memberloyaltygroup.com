<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="wrap home-posts">
		<?php 
		$my_query = "showposts=4";
		$my_query = new WP_Query($my_query);
		if ($my_query->have_posts()) : 
			while ($my_query->have_posts()) : $my_query->the_post(); 
				?>
		<div class="post quarter">
			<p class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
			<?php the_post_thumbnail() ?>
			<p><?php the_excerpt(); ?> <a href="<?php the_permalink() ?>">read more ></a></p>
		</div>
				<?php 
			endwhile;
		endif; //end of loop 
		wp_reset_postdata();
		?>
		<div class="clear text-center">
			<a href="/blog"><img src="<?php bloginfo( 'template_url' ) ?>/img/button-more-posts.png"></a>
		</div>
	</div>

	<div class="wrap content-wide home">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
	</div>

<?php 

get_footer();

?>