<?php
/**
 * The main content partial
 *
 * @package GutenbergLessons
 */

?>

<article id="post-<?php the_ID(); ?>" class="content-card">
	<header class="content-card__header">
		<h2 class="content-card__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?> <span class="content-card__title-decorator">↴</span>
			</a>
		</h2>
	</header>

	<div class="content-card__content entry-content">
		<?php the_content(); ?>
	</div>

</article>
