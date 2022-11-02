import { registerBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

function registerImageStyles() {
	registerBlockStyle('core/image', {
		name: 'slightly-rounded',
		label: 'Slightly Rounded',
	});
}

domReady(registerImageStyles);
