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

<header class="site-header container">

		<svg class="site-header__logo" viewBox="0 0 89 89" xmlns="http://www.w3.org/2000/svg">
			<path d="M44.5 0C19.778 0 0 19.778 0 44.5c0 6.922 1.648 13.185 4.285 18.789l.33.33 27.36-27.36-8.242-8.57h37.578v37.578l-8.57-8.57-27.69 27.688C30.986 87.352 37.579 89 44.5 89 69.222 89 89 69.222 89 44.5S69.222 0 44.5 0z" fill="#df2b26" fill-rule="nonzero"/>
		</svg>

	<h1 class="site-title">
		<a class="site-link" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
			Gutenberg Training
		</a>
	</h1>

	<nav class="site-navigation" role="navigation">
		<a href="#">Read the Documentation</a>
		<span class="site-navigation__separator">/</span>
		<a class="site-navigation__repo" href="#">Repo</a>
		<span class="site-navigation__separator">/</span>
		<a href="#">WP Docs</a>
	</nav>

</header> <!-- site-header -->

<div class="container"><hr class="hr--short"></div>

<div id="site-content" class='site-content'>


