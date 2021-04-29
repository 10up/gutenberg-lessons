<?php
/**
 * The template for displaying the footer.
 *
 * @package TenUpTheme
 */

?>

</div>
<div class='site-footer'>
	<div class="container">
		<div class="site-footer__wrapper">
			<p class="h3">Gutenberg Training</p>

			<nav class="footer-nav">
				<?php
				wp_nav_menu(
					array(
						'container'       => '',
						'theme_location'  => 'primary',
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
						'theme_location'  => 'primary',
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
