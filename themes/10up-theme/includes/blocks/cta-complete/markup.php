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

<div class="call-to-action-block <?php echo isset( $attributes['className'] ) ? esc_attr( $attributes['className'] ) : ''; ?>">

	<h3 class="call-to-action-block__title">
		<?php echo wp_kses_post( $attributes['title'] ); ?>—
	</h3>
	<p class="call-to-action-block__description">
		<?php echo wp_kses_post( $attributes['description'] ); ?>
	</p>
	<?php if ( isset( $attributes['showCTALink'] ) && true === $attributes['showCTALink'] ) : ?>
		<a href="<?php echo esc_url( $attributes['ctaLink'] ); ?>" class="call-to-action-block__link"><?php echo esc_html( $attributes['ctaText'] ); ?> </a>
	<?php endif; ?>
</div>
