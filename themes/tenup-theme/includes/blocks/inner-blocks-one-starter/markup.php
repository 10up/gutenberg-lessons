<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksOneStarter
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            BLock context.
 * @var string   $wrapper_attributes Block Wrapper Attributes. To be applied to the outermost element.
 */

?>

<section <?php echo wp_kses_post( $wrapper_attributes ); ?>>
	<div class="wp-block-gutenberg-lessons-inner-blocks-one-starter__image">
		<img src="https://images.unsplash.com/photo-1631005258849-aee1ccce98f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&h=600&q=80" alt="Sunset over a Mountainrange" height="600" width="1000" />
	</div>
	<div class="wp-block-gutenberg-lessons-inner-blocks-one-starter__content">
		<?php
		// The inner blocks content should get rendered here.
		?>
	</div>
</section>
