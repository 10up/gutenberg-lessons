/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { RichText, InspectorControls, URLInput, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

/**
 * Block Props
 * You'll notice two parts here: (1) an attributes object {}, and some (2) other things
 * (1) attributes are what WordPress saves (in the database?), to be passed to template partials.
 * Anything you've setup in block.json as an attribute should be listed here for use in the *		block's editing interface.
 * (2) The "other things" are things that come from WordPress itself. setAttributes, for example, 		is a function common to all block components that we can pass into our block as a prop.
 */

/**
 * Block Edit Component
 *
 * @param {object} props props
 * @returns {object} JSX
 */
const ExampleBockEdit = (props) => {
	const {
		attributes: { title, description, ctaText, ctaLink, showCTALink },
		setAttributes,
	} = props;
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
					<p className="cta-link-helper-text">
						This toggle lets you conditionally output other markup and attributes in the
						block.
					</p>
					<ToggleControl
						label={__('Show CTA button', 'gutenberg-lessons')}
						checked={showCTALink}
						onChange={() => setAttributes({ showCTALink: !showCTALink })}
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
		</Fragment>
	);
};

export default ExampleBockEdit;
