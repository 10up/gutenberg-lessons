import { __ } from '@wordpress/i18n';
import { registerBlockVariation } from '@wordpress/blocks';
import { SVG, Path } from '@wordpress/components';

// Add a four columns variation to the columns block.
registerBlockVariation('core/columns', {
	name: 'four-columns-equal',
	title: __('25/25/25/25'),
	description: __('Four columns; equal split'),
	isDefault: true,
	icon: (
		<SVG width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
			<Path
				fillRule="evenodd"
				d="M39,12H9c-1.1,0-2,0.9-2,2v20c0,1.1,0.9,2,2,2h30c1.1,0,2-0.9,2-2V14C41,12.9,40.1,12,39,12z M15,34H9V14h6V34z M23,34h-6
				V14h6V34z M25,14h6v20h-6V14z M39,34h-6V14h6V34z"
			/>
		</SVG>
	),
	innerBlocks: [['core/column'], ['core/column'], ['core/column'], ['core/column']],
	scope: ['block'],
});
