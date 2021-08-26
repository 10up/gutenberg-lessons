## Lesson 5: SlotFill

With the introduction of Gutenberg in WordPress 5.0, developers lost the ability to extend the post editor using PHP hooks. Instead, we now have the SlotFill system. At a high level, the SlotFill system allows developers to inject UI elements into Gutenberg into a predefined set of locations. For the full list of available locations please refer to the [SlotFills Reference docs on developer.wordpress.org](https://developer.wordpress.org/block-editor/reference-guides/slotfills/)

For a much deeper dive into the entire SlotFill system and how it works internally, [watch this presentation](https://www.youtube.com/watch?v=pMD0WpMaXEo) from the 2019 JavaScript for WordPress conference.

### Lesson Outcomes

1. Understanding of the SlotFill system in Gutenberg.
2. Create and register a plugin to add a new Fill to the Document Settings panel.
3. How to register post meta to be used in Gutenberg.
4. Work with `useSelect` and `useDispatch` to retrieve and set custom post meta.
5. Add the `ToggleControl` component to display and update the meta value.
6. Filter the `body_class` to display the new class on the frontend.

### Tasks
#### 1. Registering a plugin.
In order to add a Fill to any of the available Slots, we first need to register a plugin using `registerPlugin` from the `@wordpress/plugins` package. Import the function and pass the appropriate parameters as defined in the [official docs](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-plugins/#registerplugin). In the starter files, the SlotFill we're working with has already been imported do you only need to add the `CustomDocumentSettingsPanel` to the `render` property of `registerPlugin`.
#### 2. Prepare the post meta for the REST API.
In order to access or save post meta in Gutenberg, the meta needs to be exposed to the REST API. For the lesson, this has already been done in [includes/core.php](../themes/10up-theme/includes/core.php#L35) but this is a very important step as without it, meta will not be saved to the database.

#### 3. Add the ToggleControl component
Import the `ToggleControl` component and add it inside the `PluginDocumentSettingPanel` component. Anything inside that component will be displayed in the sidebar. Using the [official docs](https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/) as reference, set up the `ToggleControl` so that the value of the meta is set to `dark-mode` when checked and `light-mode` when unchecked and save the meta using the `editPost` function.
**Note: You will be updating all of the meta for the post, so be sure to combine the existing and new meta values when saving. If you get stuck, refer to the complete example.**

#### 4. Display the class on the Front End
We can filter the `body_class` function to display this new meta as class a filter. This has been done already but have a look at it in [includes/core.php](../themes/10up-theme/includes/core.php#L63)

#### 5. Add another control.
We have light and dark now. We want to add more than 2. Create a select dropdown with 4 options for theme.
