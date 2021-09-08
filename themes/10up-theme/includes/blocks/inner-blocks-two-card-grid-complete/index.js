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

import './index.css';

/**
 * Register block
 */
registerBlockType(block.name, {
	edit,
	save: () => <InnerBlocks.Content />,
});
