<?php
/**
 * Example block markup
 *
 * @package TenUpScaffold\Blocks\CTAComplete
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
<div class="<?php echo esc_attr( $args['classname'] ); ?>">
	<h2 class="wp-block-example-block__title">
		<?php echo wp_kses_post( $attributes['title'] ); ?>
	</h2>
	<p class="wp-block-cta-complete__description">
		<?php echo wp_kses_post( $attributes['description'] ); ?>
	</p>
	<?php if ( true === $attributes['showCTALink'] ) : ?>
		<a href="<?php echo esc_url( $attributes['ctaLink'] ); ?>" class="wp-block-cta-complete__cta_link"><?php echo esc_html( $attributes['ctaText'] ); ?> </a>
	<?php endif; ?>
</div>
