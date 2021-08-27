import { registerBlockVariation } from '@wordpress/blocks';

// Adds Call To Action Row variation on Group block
registerBlockVariation('core/group', {
	name: 'application-ctas',
	title: 'Application CTAs',
	icon: 'block-default',
	scope: ['inserter'],
	attributes: {
		className: 'is-style-application-ctas',
	},
	innerBlocks: [
		[
			'core/heading',
			{
				level: 2,
				placeholder: 'Getting started with your application',
			},
		],
		[
			'core/paragraph',
			{
				placeholder: 'Add the description text here...',
				className: 'application-ctas__description',
			},
		],
		[
			'core/columns',
			{},
			[
				['gutenberg-lessons/cta-complete', {}],
				['gutenberg-lessons/cta-complete', {}],
			],
		],
	],
});
