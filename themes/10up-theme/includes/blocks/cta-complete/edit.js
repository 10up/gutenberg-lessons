/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { RichText, InspectorControls, URLInput } from '@wordpress/block-editor';
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
 * @param {Object}    props                        Block properties ( props ).
 * @param {Object}    props.attributes             Block attributes as defined in block.json.
 * @param {string}    props.attributes.title       The Title attribute as defined in block.json.
 * @param {string}    props.attributes.description The description attribute as defined in block.json.
 * @param {string}    props.attributes.ctaText     Text for the CTA Text as defined in block.json.
 * @param {string}    props.attributes.ctaLink     Text for the CTA link as defined in block.json.
 * @param {boolean}   props.attributes.showCTALink Are we showing the CTA link?
 * @param {string}    props.className              Class name of the block.BlobPropertyBag
 * @param {Function}  props.setAttributes          Function to set the block attributes
 *
 * @return {*} React Element
 */
const ExampleBockEdit = ({
	attributes: { title, description, ctaText, ctaLink, showCTALink },
	className,
	setAttributes,
}) => {
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
				<RichText
					className="wp-block-cta-complete__description"
					tagName="p"
					placeholder={__('Description here…', 'gutenberg-lessons')}
					keepPlaceholderOnFocus="true"
					value={description}
					onChange={(description) => setAttributes({ description })}
				/>
				{showCTALink && (
					<RichText
						className="wp-block-cta-complete__cta_link"
						tagName="a"
						placeholder={__('CTA here…', 'gutenberg-lessons')}
						keepPlaceholderOnFocus="true"
						value={ctaText}
						onChange={(ctaText) => setAttributes({ ctaText })}
					/>
				)}
			</div>
			<InspectorControls>
				<PanelBody>
					<p className="cta-link-helper-text">
						This toggle lets you conditionally output other markup and attributes in the
						block. (NOTE: We should style this paragraph, just to show (1) that
						it&lsquo;s possible, and (2) where to put those styles.
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
