<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>	
	
	</section>
	
	<footer class="footer">
		<div class="wrap">
			<div class="column wide">
				<h3>MEMBER LOYALTY GROUP</h3>
				<p><a href="tel:17732524901">(773) 252-4901</a><br>
				<a href="mailto:info@memberloyaltygroup.com">info@memberloyaltygroup.com</a></p>
				<p>Copyright 2016. Member Loyalty Group</p>
			</div>
			<div class="column">
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'main-menu', 
						'menu_class' => 'nav-menu', 
						'depth' => '1' ) 
					); ?>
				</nav>
			</div>
			<div class="column border">
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'aux-menu', 
						'menu_class' => 'nav-menu' ) 
					); ?>
				</nav>
			</div>
			<div class="column social">
				<a href="https://twitter.com/memberloyalty" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-twitter.png"></a>
				<a href="https://www.linkedin.com/company/2536053?trk=tyah" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-linkedin.png"></a>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>