<?php
/*
Home/catch-all template
*/

get_header(); ?>

	<div class="large-title wrap">
		<h1>Our Blog</h1>
	</div>

	<div id="primary" class="content-area">

		<div class="content-narrow blog-list">
		<?php
		if ( is_search() ) {
			?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><?php
		}

		while ( have_posts() ) : the_post();
			?>
			<div class="post">
				<?php the_post_thumbnail() ?>
				<div class="post-content">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>">read more ></a></p>
				</div>
			</div>
			<?php
		endwhile;

		?>
		</div>
		<div class="pagination">
			<?php pagination(); ?>
		</div>

	</div><!-- #primary -->


<?php get_footer(); ?>