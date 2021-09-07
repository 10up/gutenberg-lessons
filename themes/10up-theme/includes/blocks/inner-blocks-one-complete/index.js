/**
 * WordPress dependencies
 */
 import { __ } from '@wordpress/i18n';
 import { registerBlockType } from '@wordpress/blocks';
 import { InnerBlocks } from '@wordpress/block-editor';

 /**
  * Internal dependencies
  */
 import edit from './edit';
 import block from './block.json';

 /* Uncomment for CSS overrides in the admin */
 // import './index.css';

 /**
  * Register block
  */
 registerBlockType(block.name, {
	 edit,
	 save: () => <InnerBlocks.Content />,
 });
