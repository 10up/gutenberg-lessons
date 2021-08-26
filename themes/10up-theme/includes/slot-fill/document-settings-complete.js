/**
 * WordPress dependencies
 */
import { useSelect, useDispatch } from '@wordpress/data';
import { __ } from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { ToggleControl } from '@wordpress/components';

// Create the component to be rendered in the document settings panel.
const CustomDocumentSettingsPanel = () => {
	// Use the datastore to retrieve the all the meta for this post.
	const meta = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'));
	// Use the datastore to tell the post to update the meta.
	const { editPost } = useDispatch('core/editor');

	// we only want to display the custom meta, so we destructure it out of the meta object.
	// It's pretty common that PHP registered meta keys will not be formatted for JavaScript, so we rename it.
	const { 'display-mode': displayMode } = meta;

	return (
		<PluginDocumentSettingPanel
			name="tenup-body-class"
			title={__('Display Mode', 'gutenberg-lessons')}
			className="tenup-body-class"
		>
			<ToggleControl
				label={__('Use Dark Mode', 'gutenberg-lessons')}
				checked={displayMode === 'dark-mode'}
				onChange={(value) => {
					const mode = value ? 'dark-mode' : 'light-mode';
					editPost({ meta: { ...meta, 'display-mode': mode } });
				}}
			/>
		</PluginDocumentSettingPanel>
	);
};

// Register the plugin.
registerPlugin('tenup-gutenberg-lessons', {
	render: CustomDocumentSettingsPanel,
	icon: 'star-half',
});
