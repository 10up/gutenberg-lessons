<?php
/**
 * The template for displaying the header.
 *
 * @package GutenbergLessons
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

<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'tenup-theme' ); ?></a>

<div class='site-header'>
	<div class='container site-header__container'>
		<?php if ( is_front_page() ) : ?>
		<h1>
			<?php endif; ?>
			<a class="custom-logo-link" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
			<svg viewBox="0 0 89 89" xmlns="http://www.w3.org/2000/svg">
				<path d="M44.5 0C19.778 0 0 19.778 0 44.5c0 6.922 1.648 13.185 4.285 18.789l.33.33 27.36-27.36-8.242-8.57h37.578v37.578l-8.57-8.57-27.69 27.688C30.986 87.352 37.579 89 44.5 89 69.222 89 89 69.222 89 44.5S69.222 0 44.5 0z" fill="#df2b26" fill-rule="nonzero"/>
			</svg>
				<span class="logo-text"><?php esc_html( get_bloginfo( 'name' ) ); ?></span>
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
</div> <!-- site-header -->

<div id="site-content" class='site-content'>


