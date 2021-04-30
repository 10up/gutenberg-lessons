<?php
/**
 * The template for displaying the header.
 *
 * @package TenUpTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text"
   href="#site-content"><?php esc_html_e( 'Skip to content', 'tenup-theme' ); ?></a>

<div class='site-top'>
	<div class='container site-top__container'>
		<?php if ( is_front_page() ) : ?>
		<h1>
			<?php endif; ?>
			<a class="custom-logo-link" href="<?php bloginfo( 'url' ); ?>">
				<svg width="89px" height="89px" viewBox="0 0 89 89" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<title>TenUp Logo</title>
					<g id="gnav-icon" stroke="none" stroke-width="1" fill-rule="evenodd">
						<path d="M44.5,0 C19.7777778,0 0,19.7777778 0,44.5 C0,51.4222222 1.64814815,57.6851852 4.28518519,63.2888889 L4.61481481,63.6185185 L31.9740741,36.2592593 L23.7333333,27.6888889 L61.3111111,27.6888889 L61.3111111,65.2666667 L52.7407407,56.6962963 L25.0518519,84.3851852 C30.9851852,87.3518519 37.5777778,89 44.5,89 C69.2222222,89 89,69.2222222 89,44.5 C89,19.7777778 69.2222222,0 44.5,0 Z" id="gnav-icon__path" fill="#000000" fill-rule="nonzero"></path>
					</g>
				</svg>
				<span class="logo-text"><?php bloginfo( 'name' ); ?></span>
			</a>
			<?php if ( is_front_page() ) : ?>
		</h1>
	<?php endif; ?>

		<div id="site-navigation" class="site-navigation">
			<nav id="primary-menu" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container' => '',
						'fallback_cb'     => '__return_false',
						'menu_id' => 'primary-nav',
						'menu_class' => 'primary-nav'
					)
				);
				?>
			</nav>
		</div>

		<a href="#primary-nav" class='primary-menu-button button' aria-controls="primary-nav">
			<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32"
				 height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
				 style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);">
				<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					<path d="M4 8h24M4 16h24M4 24h24" />
				</g>
				<rect x="0" y="0" width="32" height="32" fill="rgba(0, 0, 0, 0)" />
			</svg>
		</a>


	</div> <!-- container -->
</div> <!-- site-top -->

<div id="site-content" class='site-content'>


