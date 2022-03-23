/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const className = 'wp-block-gutenberg-lessons-inner-blocks-one-starter';

/**
 * Block Edit Component
 *
 * @return {JSX.Element} React Element
 */
const BockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<section {...blockProps}>
			<div className={`${className}__image`}>
				<img
					src="https://images.unsplash.com/photo-1631005258849-aee1ccce98f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&h=600&q=80"
					height="600"
					width="1000"
					alt="Sunset over a Mountainrange"
				/>
			</div>
			<div className={`${className}__content`}>
				{/* The InnerBlocks should get inserted here */}
			</div>
		</section>
	);
};

export default BockEdit;
