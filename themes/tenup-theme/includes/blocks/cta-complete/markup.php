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
	<p class="call-to-action-block__description">
		<?php echo wp_kses_post( $attributes['description'] ); ?>
	</p>
	<?php if ( isset( $attributes['showCTALink'] ) && true === $attributes['showCTALink'] ) : ?>
		<a href="<?php echo esc_url( $attributes['ctaLink'] ); ?>" class="call-to-action-block__link">
			<?php echo esc_html( $attributes['ctaText'] ); ?>
		</a>
	<?php endif; ?>
</div>
