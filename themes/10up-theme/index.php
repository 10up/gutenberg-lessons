<?php
/**
 * The main template file
 *
 * @package GutenbergLessons
 */

get_header(); ?>

	<div class="sidebar-layout container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="entry-content container-content">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</main>
		</div>

		<div id="secondary" class="sidebar-area">
			<aside>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, nesciunt, vitae, distinctio molestias
					amet facere commodi ipsa minima deserunt ut modi repellendus corrupti similique eaque odio sint dicta ullam animi!
				</p>
			</aside>

			<aside>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, nesciunt, vitae, distinctio molestias
					amet facere commodi ipsa minima deserunt ut modi repellendus corrupti similique eaque odio sint dicta ullam animi!
				</p>
			</aside>
			<a href="#">Learn more about...</a>
		</div>

	</div>


<?php
get_footer();
