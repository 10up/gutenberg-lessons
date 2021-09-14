/**
 * WordPress dependencies
 */
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

/**
 * Block Edit Component
 *
 * @return {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<section {...blockProps}>
			<InnerBlocks
				allowedBlocks={['gutenberg-lessons/inner-blocks-two-card-complete']}
				orientation="horizontal"
				template={[
					['gutenberg-lessons/inner-blocks-two-card-complete'],
					['gutenberg-lessons/inner-blocks-two-card-complete'],
				]}
			/>
		</section>
	);
};

export default BockEdit;
