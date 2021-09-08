<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksTwoCardGridComplete
 *
 * @var array $args {
 *     $args is provided by get_template_call.
 *
 *     @type array $attributes Block attributes.
 *     @type array $content    Block content.
 *     @type array $block      Block instance.
 * }
 */

?>

<section class="<?php echo sanitize_html_class( $args['class_name'] ); ?>">
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
</section>
