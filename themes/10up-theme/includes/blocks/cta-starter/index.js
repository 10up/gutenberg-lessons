/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

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
	title: __('CTA - Starter', 'gutenberg-lessons'),
	description: __('Starter version of the CTA block.', 'gutenberg-lessons'),
	edit,
	save: () => null,
});
