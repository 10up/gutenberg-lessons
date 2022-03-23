<?php
/**
 * Example block markup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksTwoCardGridComplete
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            BLock context.
 * @var string   $wrapper_attributes Block Wrapper Attributes. To be applied to the outermost element.
 */

?>

<section <?php echo wp_kses_post( $wrapper_attributes ); ?>>
	<?php
	// The InnerBlocks should get rendered here
	?>
</section>
