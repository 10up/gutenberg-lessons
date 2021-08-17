const { registerBlockStyle } = wp.blocks;

function registerCTAStyles() {
	registerBlockStyle('gutenberg-lessons/cta-complete', {
		name: 'thick-border',
		label: 'Thick border',
	});
}

wp.domReady(() => {
	registerCTAStyles();
});
