import { useBlockProps } from '@wordpress/block-editor';

/**
 * Block Edit Component
 *
 * @returns {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<article {...blockProps}>
			<h2>Lorem ipsum dolor sit amet</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
				dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes
			</p>
		</article>
	);
};

export default BockEdit;
