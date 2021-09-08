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
		<article {...blockProps}>
			<h2>This is a Test</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
				dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes
			</p>
		</article>
	);
};

export default BockEdit;
