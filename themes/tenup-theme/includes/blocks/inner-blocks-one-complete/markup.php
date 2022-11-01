<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksOneComplete
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 * @var array    $context    BLock context.
 */

?>

<section <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<div class="wp-block-gutenberg-lessons-inner-blocks-one-complete__image">
		<img src="https://images.unsplash.com/photo-1631005258849-aee1ccce98f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&h=600&q=80" alt="Sunset over a Mountainrange" height="600" width="1000" />
	</div>
	<div class="wp-block-gutenberg-lessons-inner-blocks-one-complete__content">
		<?php
		/*
		 * the $content is the html generated from innerBlocks
		 * it is being created from the save method in JS or the render_callback
		 * in php and is sanitized.
		 *
		 * Re sanitizing it through `wp_kses_post` causes
		 * embed blocks to break and other core filters don't apply.
		 * therefore no additional sanitization is done and it is being output as is
		 */
		echo $content; // phpcs:disable
		?>
	</div>
</section>
