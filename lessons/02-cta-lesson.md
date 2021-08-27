## Lesson 2: Creating a simple Block

This lesson provides a partially completed block that needs to have some features added to it to match the existing `cta-complete` block. All of the setup and files have been pre-configured as the focus here is to work with a block on its own without adding confusion around build tools and file locations.

THIS IS NOT A TEST :)

If you are stuck or need help, refer to the `cta-complete` block as reference or reach out in the #10up-training room for help
### Learning Outcomes:

1. Adding new attributes to a block.
2. Using the RichText component and saving the values to the block.
3. Adding an Inspector Control to a block.
4. Displaying attributes on the Front End.

### Tasks:

#### 1: Adding a new attribute.
Add a new attribute to the `cta-starter/block.json` file that will store the`description` field. Attributes are how data is stored with a block. [Here is a link to the official docs for reference](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/) and some more reading [here](https://developer.wordpress.org/block-editor/handbook/tutorials/create-block/attributes/).

####  2: Adding a RichText component to manage the new attribute
We want the user to be able to enter the description and manage formatting of the text in the blocks `edit` property. To do that, we can add a `RichText` component to the `cta-starter/edit.js` file under the existing one for the title. This component can received many props ( [see the docs here for the full list](https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/rich-text) ) but for now, we only need to specific the `tagName`, the `value` and `onChange`. If you use the existing `RichText` being used for the the `title` attribute, be sure to update the any references to the `title` attribute to the new one we created. Once you have the attribute being saved and retrieved correctly, move on to the next task!

**Note**: See that `setAttributes` call? That's a function that is provided by the block API to set attributes for the block you can read more about it [here](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/)

#### 3: Adding an optional field to the block.
Now that we know how to add new attributes and use `setAttributes` to update them, we can a more complicated feature - an optional CTA button!
To do this, we need to manage three new pieces of data:
1. Is the CTA enabled?
2. The button text.
3. The button link.

Add three more attributes to the `cta-starter/block.json` file for each of the new pieces of data with appropriate `type` and `default`values as needed. ( Refer to `cta-complete/block,json` if you get stuck )
**Note: On of them is NOT of the the type `string`**

Next, we need to add a `ToggleControl` ( [docs](https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/) ) to the Inspector Sidebar for the block. FYI, there are lots of useful pre-built components like this one you can use. Reference the [pre-built components](https://developer.wordpress.org/block-editor/reference-guides/components/) before building any new ones. The `InspectorControls` component has already been added to the `cta-starter/edit.js` for you, this is special type of component that uses a concept call SlotFill. This is how we can add the code here, but have it appear in the Block Inspector sidebar. All of the imports have already been setup for you so you can just add the new `ToggleControl` inside the `PanelBody`. Set the props for the component to update the attribute that controls if the the CTA is enabled ( Refer to `cta-complete/block,json` if you get stuck )

Once that is in-place, we want to add a`URLInput` component to the Inspector Side bar. This will allow the user to set the URL that the CTA button links to. The issue here, is that we only want to show this new control if the attribute that stores if the CTA is enabled is set to true. Give this a try and again refer to the completed example if you get stuck.

The next step is to add a new `RichText` component below the one for the `description` field that will manage the text of the CTA button. Be sure that this is only shown if the feature is enabled and that it sets and retrieves the associated attribute correctly.

__A quick note on block UX best practices:__ Generally, speaking content such as text or setting a featured image should be input into the actual block and "settings" such as the CTA on/off toggle should be in the inspector toolbar.

### 4: Rendering the front-end.

The intention for any block we create at 10up is to have the Block Editor experience match the front-end experience match as closely as possible. Update the `cta-starter/markup.php` to show the new attributes correctly ( including the optional CTA button )


#### 5: Add your own thing!

Congratulations! If you're here, you've created a block that should look and function the same as the `cta-complete` block. For this part of the training, get creative and add your own feature to the block. There are no wrong answers here so have fun!
