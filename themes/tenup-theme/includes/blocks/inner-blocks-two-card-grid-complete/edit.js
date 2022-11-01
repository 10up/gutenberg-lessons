import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

/**
 * Block Edit Component
 *
 * @returns {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['gutenberg-lessons/inner-blocks-two-card-complete'],
		orientation: 'horizontal',
		template: [
			['gutenberg-lessons/inner-blocks-two-card-complete'],
			['gutenberg-lessons/inner-blocks-two-card-complete'],
		],
	});

	return <section {...innerBlocksProps} />;
};

export default BockEdit;
