const { unregisterBlockStyle } = wp.blocks;

function unregisterPullquoteStyles() {
	unregisterBlockStyle('core/pullquote', ['solid-color']);
}

wp.domReady(() => {
	unregisterPullquoteStyles();
});
