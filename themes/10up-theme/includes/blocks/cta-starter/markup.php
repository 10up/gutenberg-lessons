<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\CTAComplete
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
<div class="call-to-action-block">
	<h2 class="call-to-action-block__title">
		<?php echo wp_kses_post( $attributes['title'] ); ?>
	</h2>
</div>
