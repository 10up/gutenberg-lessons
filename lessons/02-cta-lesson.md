# Lesson 2: Creating a simple Block

This lesson provides a partially completed block in `/10up-theme/includes/blocks/cta-starter` that needs to have some features added to it to match the completed block in `10up-theme/includes/blocks/cta-complete`. All of the setup and files have been pre-configured as the focus here is to work with a block on its own without adding confusion around build tools and file locations.

If you are stuck or need help, refer to the `cta-complete` block as reference or reach out to `#10up-gutenberg` in Slack for help.

## Objectives:

1. Add new attributes to a block.
2. Use the RichText component and save the values to a block.
3. Add an Inspector Control to a block.
4. Display the attributes on the frontend.

Here is the completed CTA block that we are going to build:
![alt text](images/cta-complete.png "The completed CTA block")

## Get Started:
Go ahead and open your code editor if you have not already done so. Run the following command inside the `wp-content/themes/10up-theme` directory to start watching for file changes.
```
npm run watch
```

Also, open your browser and navigate to the existing `Hello World` post.
```
https://gutenberg-training.test/wp-admin/post.php?post=1&action=edit
```

## Tasks:

### 1: Add the new attribute.
Attributes are how data is stored with a block. [Here is a link to the WordPress Handbook docs for reference](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/) and [another link to the Handbook tutorial](https://developer.wordpress.org/block-editor/handbook/tutorials/create-block/attributes/). Step one will be to add the new attribute to the `cta-starter/block.json` file that will store the `description` field.
```
"attributes": {
	"title": {
		"type": "string"
	},
	"description": {
		"type": "string"
	}
},
```

###  2: Add the RichText component to manage the new attribute.
We want the user to be able to enter the description and manage formatting of the text in the blocks `edit` property. To do that, we will add a `RichText` component to the `cta-starter/edit.js` file under the existing `RichText` component for the Title. This component can receive many props ([see the docs here for the full list](https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/rich-text)), but for now, we only need to specify `tagName`, `value`, and `onChange`. If you use the existing `RichText` being used for the `title` attribute, be sure to update any references to the `title` attribute to be `description`. 
```
<RichText
	className="wp-block-cta-complete-__description"
	tagName="p"
	placeholder={__('Description here …', 'gutenberg-lessons')}
	keepPlaceholderOnFocus="true"
	value={description}
	onChange={(description) => setAttributes({ description })}
/>
```
To test your work, enter data into the `description` field in the Block Editor, save the post, and refresh your screen. Once you have the attribute being saved and retrieved correctly, move on to the next task!

**Note**: See that `setAttributes` call? It is a function that is provided by the block API to set attributes for the block. You can read more about it in the [Block Reference Guides](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/).

### 3: Add an optional field to the block.
Now that we know how to add attributes and use `setAttributes` to update them, we can create more complicated features - let's add an optional CTA button!

When we are done, it will look like this:
![alt text](images/cta-complete-with-control.png "CTA block with Inspector control")


To do this, we need to manage three new pieces of data:
1. Is the CTA enabled?
2. The button text.
3. The button link.

Create three more attributes in the `cta-starter/block.json` file for each new piece of data with the appropriate `type` and `default` values. (Refer to `cta-complete/block.json` if you get stuck)

**Note:** One of them is NOT of the the type `string`
```
"attributes": {
	"title": {
		"type": "string"
	},
	"description": {
		"type": "string"
	},
	"showCTALink": {
		"type": "boolean"
	},
	"ctaLink": {
		"type": "string",
		"default": "https://10up.com"
	},
	"ctaText": {
		"type": "string",
		"default": "Learn more →"
	}
},
```

Next, we will add a `ToggleControl` ([docs](https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/)) to the block's Inspector Sidebar. Be aware that there are many useful pre-built components like this one that you can use when building a block. Reference the [pre-built components guide](https://developer.wordpress.org/block-editor/reference-guides/components/) before building a new component. The `InspectorControls` component has already been added to the `cta-starter/edit.js` file for you. It is a special type of component that uses a concept call SlotFill. This is how we can add the code next to the components, but have it appear in the block's Inspector Sidebar. All of the imports have already been setup for you so you can simply add the new `ToggleControl` component inside the `PanelBody` component. Set the props for the component to update the attribute that controls it if the the CTA is enabled (Refer to `cta-complete/block,json` if you get stuck).
```
<ToggleControl
	label={__('Show CTA button', 'gutenberg-lessons')}
	checked={showCTALink}
	onChange={() => setAttributes({ showCTALink: !showCTALink })}
/>
```

Next, we will add the `URLInput` component to the Inspector Sidebar. This will allow the user to set the URL that the CTA button links to. The issue here, is that we only want to show this new control if the attribute that stores if the CTA is enabled is set to `true`. 
```
{showCTALink && (
	<URLInput
		label={__('URL', 'gutenberg-lessons')}
		value={ctaLink}
		onChange={(ctaLink) => {
			setAttributes({ ctaLink });
		}}
	/>
)}
```

Next, we will add a third `RichText` component below the one used for the `description` field. This component will manage the CTA button text. Be sure that this is only shown if the CTA button is enabled. The component should set and retrieve the associated attribute correctly.
```
{showCTALink && (
	<RichText
		className="call-to-action-block__link"
		tagName="a"
		placeholder={__('CTA here…', 'gutenberg-lessons')}
		keepPlaceholderOnFocus="true"
		value={ctaText}
		onChange={(ctaText) => setAttributes({ ctaText })}
	/>
)}
```

__A quick note on block editor best practices:__ In general, content such as text or setting a featured image should be input into the actual block and "settings" such as the CTA on/off toggle should be in the Inspector Toolbar.

### 4: Display the attributes on the frontend.

Update the `cta-starter/markup.php` to show the new attributes correctly including the optional CTA button.
```
<p class="call-to-action-block__description">
	<?php echo wp_kses_post( $attributes['description'] ); ?>
</p>
<?php if ( isset( $attributes['showCTALink'] ) && true === $attributes['showCTALink'] ) : ?>
	<a href="<?php echo esc_url( $attributes['ctaLink'] ); ?>" class="call-to-action-block__link"><?php echo esc_html( $attributes['ctaText'] ); ?> </a>
<?php endif; ?>
```
The intention for every block we create at 10up is to match the Block Editor experience with the frontend experience as closely as possible. Care must be taken in terms of your HTML markup and your CSS styles to ensure a consistent feel between the Block Editor and the frontend.


## Optional Changes

Congratulations! You created a block that should look and function the same as the `cta-complete` block. For this part of the training, get creative and add your own features to the block. A few fun ideas are below:

1. Change the style of the block if the "Show CTA" toggle is enabled.
2. Convert the "Show CTA" toggle to a [radio control](https://developer.wordpress.org/block-editor/reference-guides/components/radio-control/).
3. Add [checkbox control](https://developer.wordpress.org/block-editor/reference-guides/components/checkbox-control/) that allows the user to open the `LEARN MORE` button link in a new tab.

## Next Lesson

[Lesson 3: Block Styles](./03-styles.md)
