<?php
/**
 * Gutenberg Blocks setup
 *
 * @package GutenbergLessons\Blocks\InnerBlocksTwoCardComplete
 */

namespace GutenbergLessons\Blocks\InnerBlocksTwoCardComplete;

/**
 * Register the block
 */
function register() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Register the block.
	register_block_type_from_metadata(
		TENUP_THEME_BLOCK_DIR . '/inner-blocks-two-card-complete', // this is the directory where the block.json is found.
		[
			'render_callback' => $n( 'render_block_callback' ),
		]
	);
}

/**
 * Render callback method for the block
 *
 * @param array  $attributes The blocks attributes
 * @param string $content    Data returned from InnerBlocks.Content
 * @param array  $block      Block information such as context.
 *
 * @return string The rendered block markup.
 */
function render_block_callback( $attributes, $content, $block ) {
	ob_start();
	get_template_part(
		'includes/blocks/inner-blocks-two-card-complete/markup',
		null,
		[
			'class_name' => 'wp-block-gutenberg-lessons-inner-blocks-two-card-complete',
			'attributes' => $attributes,
			'content'    => $content,
			'block'      => $block,
		]
	);

	return ob_get_clean();
}
