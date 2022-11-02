import { unregisterBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

function unregisterPullquoteStyles() {
	unregisterBlockStyle('core/pullquote', ['solid-color']);
}

domReady(unregisterPullquoteStyles);
