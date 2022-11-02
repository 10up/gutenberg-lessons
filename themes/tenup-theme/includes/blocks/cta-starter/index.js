import { registerBlockType } from '@wordpress/blocks';

import edit from './edit';
import block from './block.json';

registerBlockType(block, {
	edit,
	save: () => null,
});
