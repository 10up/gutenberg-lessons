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

<header class="site-header">
	<div class="site-header__container">
	<h1 class="site-title">
		<a class="site-link" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
			Gutenberg Training
		</a>
	</h1>

	<div class="site-header__byline-container">

		<svg viewBox="0 0 89 89" xmlns="http://www.w3.org/2000/svg">
			<path d="M44.5 0C19.778 0 0 19.778 0 44.5c0 6.922 1.648 13.185 4.285 18.789l.33.33 27.36-27.36-8.242-8.57h37.578v37.578l-8.57-8.57-27.69 27.688C30.986 87.352 37.579 89 44.5 89 69.222 89 89 69.222 89 44.5S69.222 0 44.5 0z" fill="#df2b26" fill-rule="nonzero"/>
		</svg>

		<span class="site-header__byline">The fine art of building blocks</span>

		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 39"><g stroke="#000" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
			<path d="M1.5 26.25L8.75 23 16 26.25 8.75 29.5zM1.5 34.25l7.25 3.25L16 34.25M16 26.25v8M1.5 26.25v8M8.75 29.75v7.5"/><g>
			<path d="M11.5 16.25L18.75 13 26 16.25l-7.25 3.25zM11.5 24.25l7.25 3.25L26 24.25M26 16.25v8M11.5 16.25v8M18.75 19.75v7.5"/></g><g>
			<path d="M3.5 4.25L10.75 1 18 4.25 10.75 7.5zM3.5 12.25l7.25 3.25L18 12.25M18 4.25v8M3.5 4.25v8M10.75 7.75v7.5"/></g></g>
		</svg>
	</div>


	<nav class="site-navigation" role="navigation">
		<a href="#">Read the Documentation</a>
		<a class="site-navigation__repo" href="#">Repo</a>
		<a href="#">WP Docs</a>
	</nav>


	</div> <!-- container -->
</header> <!-- site-header -->

<div id="site-content" class='site-content'>


