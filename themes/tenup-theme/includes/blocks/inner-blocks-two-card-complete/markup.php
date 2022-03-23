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

<article <?php echo wp_kses_post( $wrapper_attributes ); ?>>
	<h2>Lorem ipsum dolor sit amet</h2>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes</p>
</article>
