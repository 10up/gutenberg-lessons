import { registerBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

function registerCTAStyles() {
	registerBlockStyle('gutenberg-lessons/cta-complete', {
		name: 'thick-border',
		label: 'Thick border',
	});
}

domReady( registerCTAStyles );
