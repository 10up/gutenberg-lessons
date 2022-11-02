import { __ } from '@wordpress/i18n';
import { RichText, InspectorControls, URLInput, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

/**
 * Block Edit Component
 *
 * @param {object} props props
 * @returns {object} JSX
 */
const ExampleBockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const { title, description, ctaText, ctaLink, showCTALink } = attributes;

	const blockProps = useBlockProps({ className: 'call-to-action-block' });

	return (
		<>
			<div {...blockProps}>
				<RichText
					className="call-to-action-block__title"
					tagName="h2"
					placeholder={__('Title here …', 'gutenberg-lessons')}
					value={title}
					onChange={(title) => setAttributes({ title })}
				/>
				<RichText
					className="call-to-action-block__description"
					tagName="p"
					placeholder={__('Description here…', 'gutenberg-lessons')}
					value={description}
					onChange={(description) => setAttributes({ description })}
				/>
				{showCTALink && (
					<RichText
						className="call-to-action-block__link"
						tagName="a"
						placeholder={__('CTA here…', 'gutenberg-lessons')}
						value={ctaText}
						onChange={(ctaText) => setAttributes({ ctaText })}
					/>
				)}
			</div>
			<InspectorControls>
				<PanelBody>
					<ToggleControl
						label={__('Show CTA button', 'gutenberg-lessons')}
						checked={showCTALink}
						onChange={() => setAttributes({ showCTALink: !showCTALink })}
						help={__(
							'This toggle lets you conditionally output other markup and attributes in the block.',
							'gutenberg-lessons',
						)}
					/>
					{showCTALink && (
						<URLInput
							label={__('URL', 'gutenberg-lessons')}
							value={ctaLink}
							onChange={(ctaLink) => {
								setAttributes({ ctaLink });
							}}
						/>
					)}
				</PanelBody>
			</InspectorControls>
		</>
	);
};

export default ExampleBockEdit;
