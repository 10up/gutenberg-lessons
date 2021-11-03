/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { toggleFormat, registerFormatType } from '@wordpress/rich-text';
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { GradientIcon } from './icons';

const FORMAT_NAME = 'tenup/gradient-complete';

registerFormatType(FORMAT_NAME, {
	title: __('Gradient Complete'),
	tagName: 'span',
	className: 'has-text-gradient',
	edit({ isActive, value, onChange }) {
		const onToggle = () => {
			onChange(
				toggleFormat(value, {
					type: FORMAT_NAME,
				}),
			);
		};
		return (
			<RichTextToolbarButton
				icon={GradientIcon}
				title={__('Gradient')}
				onClick={onToggle}
				isActive={isActive}
			/>
		);
	},
});
