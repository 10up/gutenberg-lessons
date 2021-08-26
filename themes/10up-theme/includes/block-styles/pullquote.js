import { unregisterBlockStyle } from '@wordpress/blocks';

function unregisterPullquoteStyles() {
	unregisterBlockStyle('core/pullquote', ['solid-color']);
}

wp.domReady(() => {
	unregisterPullquoteStyles();
});
