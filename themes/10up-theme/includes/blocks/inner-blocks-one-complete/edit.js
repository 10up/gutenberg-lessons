/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';


/**
 * Block Edit Component
 *
 * @param {Object} props Block
 *
 * @return {JSX.Element} React Element
 */
function BockEdit() {
	const blockProps = useBlockProps();

	return (
		<section {...blockProps}>
			<p>Hello World!</p>
		</section>
	);
};

 export default BockEdit;
