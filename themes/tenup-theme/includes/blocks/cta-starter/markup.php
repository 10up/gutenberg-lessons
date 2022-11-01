<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\CTAComplete
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 * @var array    $context    BLock context.
 */

?>

<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<h3 class="call-to-action-block__title">
		<?php echo wp_kses_post( $attributes['title'] ); ?>
	</h3>
</div>
