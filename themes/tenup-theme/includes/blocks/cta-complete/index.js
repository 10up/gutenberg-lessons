/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

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
domReady(function () {
	registerBlockType(block.name, {
		title: __('CTA - Complete', 'gutenberg-lessons'),
		description: __('Complete version of the CTA block', 'gutenberg-lessons'),
		edit,
		save: () => null,
	});
});
