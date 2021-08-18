<?php
/**
 * The main template file
 *
 * @package GutenbergLessons
 */

get_header(); ?>

	<main id="main" class="site-main container" role="main">
		<div class="container-content">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</main>

<?php
get_footer();
