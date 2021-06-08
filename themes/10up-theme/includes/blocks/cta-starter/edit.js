/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { RichText, InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
/**
 * Block Edit Component
 *
 * @param {Object}    props                        Block properties ( props ).
 * @param {Object}    props.attributes             Block attributes as defined in block.json.
 * @param {string}    props.attributes.title       The Title attribute as defined in block.json.
 * @param {string}    props.className              Class name of the block.BlobPropertyBag
 * @param {Function}  props.setAttributes          Function to set the block attributes
 *
 * @return {*} React Element
 */
const ExampleBockEdit = ({ attributes: { title }, className, setAttributes }) => {
	return (
		<Fragment>
			<div className={className}>
				<RichText
					className="wp-block-cta-complete-__title"
					tagName="h2"
					placeholder={__('Title here …', 'gutenberg-lessons')}
					keepPlaceholderOnFocus="true"
					value={title}
					onChange={(title) => setAttributes({ title })}
				/>
			</div>
			<InspectorControls>
				<PanelBody>Toggle control</PanelBody>
			</InspectorControls>
		</Fragment>
	);
};

export default ExampleBockEdit;
