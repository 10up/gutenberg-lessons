/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { RichText, InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

const ExampleBockEdit = ({
	attributes: { title, description, ctaText, ctaLink, showButton },
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
					value={title}
					onChange={(title) => setAttributes({ title })}
				/>
				<RichText
					className="wp-block-cta-complete__description"
					tagName="p"
					placeholder={__('Description here…', 'gutenberg-lessons')}
					value={description}
					onChange={(description) => setAttributes({ description })}
				/>
				{showButton && (
					<RichText
						className="wp-block-cta-complete__cta_link"
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
						checked={showButton}
						onChange={() => setAttributes({ showButton: !showButton })}
					/>
					{showButton && (
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
