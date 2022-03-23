/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import edit from './edit';
import block from './block.json';

/**
 * CSS to override editor styling
 */
import './index.css';

/**
 * Register block
 */
registerBlockType(block.name, {
	edit,
	save: () => null,
});
