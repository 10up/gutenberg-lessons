import { useBlockProps } from '@wordpress/block-editor';

/**
 * Block Edit Component
 *
 * @returns {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();

	return <section {...blockProps}>{/* The InnerBlocks should get rendered here */}</section>;
};

export default BockEdit;
