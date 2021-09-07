/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Block Edit Component
 *
 * @return {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<section {...blockProps}>
			<p>Hello World!</p>
		</section>
	);
};

export default BockEdit;
