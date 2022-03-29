/* eslint-disable no-unused-vars */
/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { RichText, InspectorControls, URLInput, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
/**
 * Block Edit Component
 *
 * @param {object}    props                        Block properties ( props ).
 * @param {object}    props.attributes             Block attributes as defined in block.json.
 * @param {string}    props.attributes.title       The Title attribute as defined in block.json.
 * @param {Function}  props.setAttributes          Function to set the block attributes
 *
 * @returns {*} React Element
 */
const ExampleBockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const { title } = attributes;
	const blockProps = useBlockProps({ className: 'call-to-action-block' });

	return (
		<Fragment>
			<div {...blockProps}>
				<RichText
					className="call-to-action-block__title"
					tagName="h2"
					placeholder={__('Title here …', 'gutenberg-lessons')}
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
