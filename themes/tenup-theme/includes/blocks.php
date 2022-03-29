<?php
/**
 * Gutenberg Blocks setup
 *
 * @package GutenbergLessons
 */

namespace GutenbergLessons\Blocks;

use GutenbergLessons\Utility;

/**
 * Set up blocks
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_styles' ) );
	add_filter( 'block_categories_all', $n( 'blocks_categories' ), 10, 2 );
	add_action( 'init', $n( 'register_theme_blocks' ) );
	add_action( 'init', $n( 'register_theme_block_patterns' ) );
	add_action( 'init', $n( 'block_patterns_and_categories' ) );

	/*
	If you are using the block library, remove the blocks you don't need.

	add_filter( 'tenup_available_blocks', function ( $blocks ) {
		if ( ! empty( $blocks['integrated-hero'] ) ) {
			unset( $blocks['integrated-hero'] );
		}

		return $blocks;
	} );
	*/
}

/**
 * Automatically registers all blocks that are located within the includes/blocks directory
 *
 * @return void
 */
function register_theme_blocks() {
	// Filter the plugins URL to allow us to have blocks in themes with linked assets. i.e editorScripts
	add_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );

	// Register all the blocks in the theme
	if ( file_exists( TENUP_THEME_BLOCK_DIR ) ) {
		$block_json_files = glob( TENUP_THEME_BLOCK_DIR . '*/block.json' );

		// auto register all blocks that were found.
		foreach ( $block_json_files as $filename ) {

			$block_folder = dirname( $filename );

			$block_options = [];

			$markup_file_path = $block_folder . '/markup.php';
			if ( file_exists( $markup_file_path ) ) {

				// only add the render callback if the block has a file called markdown.php in it's directory
				$block_options['render_callback'] = function( $attributes, $content, $block ) use ( $block_folder ) {

					// create helpful variables that will be accessible in markup.php file
					$context            = $block->context;
					$wrapper_attributes = wp_kses_post( get_block_wrapper_attributes() );

					// get the actual markup from the markup.php file
					ob_start();
					include $block_folder . '/markup.php';
					return ob_get_clean();
				};
			};

			register_block_type_from_metadata( $block_folder, $block_options );
		};
	};

	// Remove the filter after we register the blocks
	remove_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );
}

/**
 * Filter the plugins_url to allow us to use assets from theme.
 *
 * @param string $url  The plugins url
 * @param string $path The path to the asset.
 *
 * @return string The overridden url to the block asset.
 */
function filter_plugins_url( $url, $path ) {
	$file = preg_replace( '/\.\.\//', '', $path );
	return trailingslashit( get_stylesheet_directory_uri() ) . $file;
}


/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_styles() {
	wp_enqueue_style(
		'editor-style-overrides',
		TENUP_THEME_TEMPLATE_URL . '/dist/css/editor-style-overrides.css',
		[],
		Utility\get_asset_info( 'editor-style-overrides', 'version' )
	);

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		wp_enqueue_script(
			'editor-style-overrides',
			TENUP_THEME_TEMPLATE_URL . '/dist/js/editor-style-overrides.js',
			Utility\get_asset_info( 'editor-style-overrides', 'dependencies' ),
			Utility\get_asset_info( 'editor-style-overrides', 'version' ),
			true
		);
	}

}

/**
 * Filters the registered block categories.
 *
 * @param array $categories Registered categories.
 *
 * @return array Filtered categories.
 */
function blocks_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'gutenberg-lessons',
				'title' => __( 'Completed Blocks', 'gutenberg-lessons' ),
			),
		)
	);
}

/**
 * Manage block patterns and block pattern categories
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
 *
 * @return void
 */
function block_patterns_and_categories() {
	/*
	## Examples

	// Register block pattern
	register_block_pattern(
		'tenup/block-pattern',
		array(
			'title'       => __( 'Two buttons', 'tenup' ),
			'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'wpdocs-my-plugin' ),
			'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'wpdocs-my-plugin' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'wpdocs-my-plugin' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
		)
	);

	// Unregister a block pattern
	unregister_block_pattern( 'tenup/block-pattern' );

	// Register a block pattern category
	register_block_pattern_category(
		'client-name',
			array( 'label' => __( 'Client Name', 'tenup' ) )
	);

	// Unregister a block pattern category
	unregister_block_pattern('client-name')

	*/
}


/**
 * This function will likely ship with WordPress 6.0 at which point we can remove it from the theme
 */
if ( ! function_exists( 'register_theme_block_patterns' ) ) :

	/**
	 * Register any patterns that the active theme may provide under its
	 * `./patterns/` directory. Each pattern is defined as a PHP file and defines
	 * its metadata using plugin-style headers. The minimum required definition is:
	 *
	 *     /**
	 *      * Title: My Pattern
	 *      * Slug: my-theme/my-pattern
	 *      *
	 *
	 * The output of the PHP source corresponds to the content of the pattern, e.g.:
	 *
	 *     <main><p><?php echo "Hello"; ?></p></main>
	 *
	 * Other settable fields include:
	 *
	 *   - Description
	 *   - Viewport Width
	 *   - Categories       (comma-separated values)
	 *   - Keywords         (comma-separated values)
	 *   - Block Types      (comma-separated values)
	 *   - Inserter         (yes/no)
	 */
	function register_theme_block_patterns() {
		$default_headers = array(
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'inserter'      => 'Inserter',
		);

		$dirpath = TENUP_THEME_PATH . '/patterns/';
		if ( file_exists( $dirpath ) ) {
			$files = glob( $dirpath . '*.php' );
			if ( $files ) {
				foreach ( $files as $file ) {
					$pattern_data = get_file_data( $file, $default_headers );

					if ( empty( $pattern_data['slug'] ) ) {
						trigger_error(
							sprintf(
								/* translators: %s: file name. */
								esc_html__( 'Could not register file "%s" as a block pattern ("Slug" field missing)', 'tenup-theme' ),
								esc_attr( $file )
							)
						);
						continue;
					}

					if ( ! preg_match( '/^[A-z0-9\/_-]+$/', $pattern_data['slug'] ) ) {
						trigger_error(
							sprintf(
								/* translators: %1s: file name; %2s: slug value found. */
								esc_html__( 'Could not register file "%1$s" as a block pattern (invalid slug "%2$s")', 'tenup-theme' ),
								esc_attr( $file ),
								esc_attr( $pattern_data['slug'] )
							)
						);
					}

					if ( \WP_Block_Patterns_Registry::get_instance()->is_registered( $pattern_data['slug'] ) ) {
						continue;
					}

					// Title is a required property.
					if ( ! $pattern_data['title'] ) {
						trigger_error(
							sprintf(
								/* translators: %1s: file name; %2s: slug value found. */
								esc_html__( 'Could not register file "%s" as a block pattern ("Title" field missing)', 'tenup-theme' ),
								esc_attr( $file )
							)
						);
						continue;
					}

					// For properties of type array, parse data as comma-separated.
					foreach ( array( 'categories', 'keywords', 'blockTypes' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = array_filter(
								preg_split(
									'/[\s,]+/',
									(string) $pattern_data[ $property ]
								)
							);
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// Parse properties of type int.
					foreach ( array( 'viewportWidth' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = (int) $pattern_data[ $property ];
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// Parse properties of type bool.
					foreach ( array( 'inserter' ) as $property ) {
						if ( ! empty( $pattern_data[ $property ] ) ) {
							$pattern_data[ $property ] = in_array(
								strtolower( $pattern_data[ $property ] ),
								array( 'yes', 'true' ),
								true
							);
						} else {
							unset( $pattern_data[ $property ] );
						}
					}

					// The actual pattern content is the output of the file.
					ob_start();
					include $file;
					$pattern_data['content'] = ob_get_clean();
					if ( ! $pattern_data['content'] ) {
						continue;
					}

					register_block_pattern( $pattern_data['slug'], $pattern_data );
				}
			}
		}
	}

endif;
