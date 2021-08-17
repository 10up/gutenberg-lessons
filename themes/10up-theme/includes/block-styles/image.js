import { registerBlockStyle } from '@wordpress/blocks';

function registerImageStyles() {
	registerBlockStyle('core/image', {
		name: 'slightly-rounded',
		label: 'Slightly Rounded',
	});
}

wp.domReady(() => {
	registerImageStyles();
});
