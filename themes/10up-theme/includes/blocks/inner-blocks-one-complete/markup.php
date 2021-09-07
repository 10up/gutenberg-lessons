<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksOneComplete
 *
 * @var array $args {
 *     $args is provided by get_template_call.
 *
 *     @type array $attributes Block attributes.
 *     @type array $content    Block content.
 *     @type array $block      Block instance.
 * }
 */

// Set defaults.
$attributes = $args['attributes'];
?>
<section class="<?php echo sanitize_html_class( $args['class_name'] ); ?>">
	<div class="<?php echo sanitize_html_class( $args['class_name'] . '__image' ); ?>">
		<img src="https://images.unsplash.com/photo-1631005258849-aee1ccce98f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&h=600&q=80" alt="Sunset over a Mountainrange" height="600" width="1000" />
	</div>
	<div class="<?php echo sanitize_html_class( $args['class_name'] . '__content' ); ?>">
		<?php
		/*
		 * the $args['content'] is the html generated from innerBlocks
		 * it is being created from the save method in JS or the render_callback
		 * in php and is sanitized.
		 *
		 * Re sanitizzing it through `wp_kses_post` causes
		 * embed blocks to break and other core filters don't apply.
		 * therefore no additional sanitisation is done and it is being output as is
		 */
		echo $args['content']; // phpcs:disable
		?>
	</div>
</section>
