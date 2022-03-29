<?php
/**
 * The main template file
 *
 * @package GutenbergLessons
 */

get_header(); ?>

	<div class="container-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/content' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php
get_footer();
