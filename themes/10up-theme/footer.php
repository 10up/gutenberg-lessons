<?php
/**
 * The template for displaying the footer.
 *
 * @package GutenbergLessons
 */

?>

</div>
<div class='site-footer'>
	<div class="container">
		<div class="site-footer__wrapper">
			<p class="site-footer__site-name">Gutenberg Training</p>

			<nav class="footer-nav">
				<?php
				wp_nav_menu(
					array(
						'container'       => '',
						'theme_location'  => 'footer-1',
						'container_class' => '',
						'fallback_cb'     => '__return_false',
					)
				);
				?>
			</nav>

			<nav class="footer-nav">
				<?php
				wp_nav_menu(
					array(
						'container'       => '',
						'theme_location'  => 'footer-2',
						'container_class' => '',
						'fallback_cb'     => '__return_false',
					)
				);
				?>
			</nav>

		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
