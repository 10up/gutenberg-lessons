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
<section class="<?php sanitize_html_class( $args['className'] ); ?>">
	<p>Hello World!</p>
</section>
