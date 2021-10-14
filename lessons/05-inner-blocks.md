# Lesson 5: Inner Blocks / Nested Blocks

## Learning Outcomes:
1. Learn what inner blocks are and how to use them
2. Learn how to decide when to use inner blocks
3. Learn about controlled parent/child relationships in inner blocks

## What are "inner blocks"?

Inner Blocks in WordPress let you nest blocks within other blocks. You may have come across this when using the Core Group or Columns Block. This ability is very powerful because it allows you to compose different blocks to build your content. Composition is not the only thing nested blocks are useful for. Nesting also allows you to reduce complexity when you have to create repeatable items your blocks.

Looking at the two core blocks I just mentioned — Group and Columns — we can see this concept of nested blocks come to life.

The Group block is meant to be a wrapper for other blocks. It creates a container with some options like a background color for that section and allows you to insert other blocks into that wrapper. Other examples of this kind of nesting can be found in the the Media & Text and the Cover Block. They all allow you to place other blocks within an inner blocks area.

![Editor List View showing a Core Group block with a Heading and Paragraph nested within.](/lessons/images/inner-blocks-core-group-screenshot.jpg)

There is another great use-case for inner blocks. We can see that when looking at the core columns block. It may seem very similar at first because it also allows you to place blocks within the columns.

But this is not actually the case for the columns block. It only allows individual column blocks as it's direct decedents. The individual column blocks then allow you to place other blocks in them. The column blocks cannot get used outside the columns block.

Instead of storing a very complicated array of the columns with all their options and building custom logic to add, move or remove columns, all of that get's managed my using inner blocks with a wrapping `columns` block that only allows `column` blocks as it's direct children.

Another example of this is the core buttons block. It only allows button blocks as it's children and uses inner blocks to allow editors to add, move and remove the individual button blocks.

![Editor List View showing a Core Columns block with three nested Column Blocks that each have their own child blocks within.](/lessons/images/inner-blocks-core-columns-screenshot.jpg)

## Exercise Overview
In this lesson we are going to build two different blocks to take a look at these different use-cases inner blocks can solve. Both of these blocks have a `starter` folder that already contains a lot of the skeleton for these blocks. But the actual `InnerBlocks` need to get added to the components to make them work. If you get stuck you can always take a peek at the `completed` folder for a complete version of the block.

### 1. "Hero" Block
First we will take a look at how we can use inner blocks to allow an editor to place anything they want into a predefined area of your component. In this example we have a "simple" design of a "Hero" component that has an image at the top with a content area that overlaps the image.

![Hero Block Mockup](/lessons/images/inner-blocks-one-mockup.png)

The client wants to be able to place other blocks into the content area of the "Hero" component to make it as flexible as possible for them.

### 2. "Card Grid" Block
The second block we will be building is a "Card Grid" component. This Card grid should allow editors to place as many card components into a grid that automatically reflows based on the screen size of the device they are using.

![Card Grid Block Mockup](/lessons/images/inner-blocks-two-mockup.png)

## Breaking it down

### 1. "Hero" Block
For the "Hero" Block we need to define an area of our markup where other blocks can get inserted.

![Hero Block Scribble](/lessons/images/inner-blocks-one-scribble.png)

To get started there is a starter block scaffolded out located in the blocks folder of the theme with the name `inner-blocks-one-stater`. If you are stuck you can take a look at the `inner-blocks-one-completed` folder for a completed version of the block.

Most of the markup and block scaffolding already is in place. What is left to do is wiring up the `InnerBlock` area both in the editor and on the frontend. You will find comments outlining where the inner blocks area should go in both the `edit.js` and the `markup.php` files.

### 2. "Card Grid" Block
The "Card Grid" consists of two elements. The actual grid that can contain the cards and then the individual cards. This is similar to how core has the Buttons block that contains individual Button blocks.

So we can archive this by creating two different blocks. The "Card Grid" block that needs to define an inner block area where only the card block can get inserted. And then we need the card block that cannot get used anywhere outside of the "Card Grid".

![Card Grid Block Scribble](/lessons/images/inner-blocks-two-scribble.png)

To get started there are two starter blocks scaffolded out located in the blocks folder of the theme with the name `inner-blocks-two-card-grid-stater` and `inner-blocks-two-card-starter`. If you are stuck you can take a look at the `inner-blocks-two-card-grid-completed` and `inner-blocks-two-card-completed` folder for a completed version of the block.

Like in the first example most of the markup and block is already scaffolded out. The inner blocks area needs to get added and configured again and the "Card" block needs to get hidden from the inserter unless it is being used within the "Card Grid" block.

## Using Inner Blocks
Inner Blocks actually is the name of a react component that is part of the "Block Editor" package. We can import it into our block edit component and use it within the markup of our block.

```js
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

const BlockEdit = () => {
	const blockProps = useBlockProps();
	return (
		<div {...blockProps}>
			<InnerBlocks />
		</div>
	)
}

export default BlockEdit;
```

With this done you can already go to the editor and see that there is now a Block Appender rendering inside your block that allows you to insert any blocks you want.

### Saving the Content of our Inner Blocks Area
If you now try to save the post and view it on the frontend you will find though that your changes are not actually saved. The way the editor stores inner blocks is in the actual post content. But right now our blocks just return `null` in their `save` method.

We can fix this by replacing the `null` with the `<InnerBlocks.Content />` component.

```js
/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import edit from './edit';
import block from './block.json';

/**
 * Register block
 */
registerBlockType(block.name, {
	edit,
	save: () => <InnerBlocks.Content />,
});
```

Now that the content is saved in the database we also need to somehow use this content in our markup in php. When we build blocks dynamically we provide the `register_block_type_from_metadata` function with a `render_callback`. This function gets called with three arguments from WordPress. The block attributes, the blocks content (inner blocks) as a markup string and the block as a `WP_Block` class. We are interested in the second parameter for this.

```php
/*
	* the $args['content'] is the html generated from innerBlocks
	* it is being created from the save method in JS or the render_callback
	* in php and is sanitized.
	*
	* Re sanitizzing it through `wp_kses_post` causes
	* embed blocks to break and other core filters don't apply.
	* therefore no additional sanitisation is done and it is being output as is
	*/
echo $args['content']; // phpcs:disable
```

From here we are most of the way there. You are not able to insert any blocks you want and the content actually gets saved into the database and shows on the frontend.

There are a few things to keep in mind though to improve the User Experience of our block.

### Use `allowedBlocks` to better control what editors can do

Right now editors are able to insert any block they want into the inner blocks area. This might not always be what we want. In the case of our "Hero" it for example doesn't really make sense to allow any layout related blocks like the "Banner", "Columns" or "Group" block.

We can improve the UX by adding a list of allowed blocks to the inner blocks component.

```js
return (
	<InnerBlocks
		allowedBlocks={[
			'core/heading',
			'core/paragraph',
			'core/buttons',
			'core/button',
		]}
	/>
)
```

### Defining a `template` to get editors up and running quicker

Another thing that isn't great about the UX right now is that the initial state when we insert our "Hero" block is only an empty grey box.

We know that in an ideal case we want our editors to have a title and a paragraph inside the "Hero" so we can make that the default when the block is inserted.

To achieve this we can define a `template` on the inner block area. The template gets defined the same way you already saw in [Lesson 4: Patterns & Variations](/lessons/04-patterns-variations.md#using-variations). It is an array with individual items also being represented as an array with the block name as the first element, the blocks attributes as the second and child blocks as the third element.

```js
return (
	<InnerBlocks
		template={[
			['core/heading', { level: 2, placeholder: 'Insert your heading here...' }],
			['core/paragraph', { placeholder: 'Write some description text here...' }],

		]}
	/>
)
```

### Parent / Child relationships of blocks

If you want to create parent / child relationships between blocks like we need to do for our "Card Grid" and "Card" blocks that consists of two things. For one you need to define the `allowedBlocks` on the `InnerBlocks` in the parent block to only contain the child block you want to have show up. If the `allowedBlocks` array only contains one item the inserter will no longer show the block picker popover but instead directly insert that one block. Which is a nice little UX improvement we get for free.

The second thing we need to do is make sure our "child" block, in this case the "Card", doesn't appear in the regular inserter or that it cannot get moved anywhere outside of a "Card Grid". And for that we can use the [`parent`](https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-registration.md#parent-optional) option in the `block.json` file. When you define a `parent` the block will no longer show up in the inserter and it also cannot get used anywhere outside of the defined parent.

```json
{
	"name": "...",
	"...",
	"parent": [ "namespace/block-name" ]
}
```

### Styling considerations in the editor

One thing to be aware of when using `InnerBlocks` is that at the moment it makes it a bit more difficult to match styling between the editor and the frontend of the site because the `InnerBlocks` component in the editor wraps the markup of the child blocks in this markup:
```html
<div class="block-editor-inner-blocks">
	<div class="block-editor-block-list__layout">
		<!-- Markup of the Child Blocks will get serted here -->
		<div class="block-list-appender">...</div>
	</div>
</div>
```
This means that we will have to adjust our stying between the frontend and the editor.

In our "Card Grid" we use CSS Grid to make the main wrapper a grid container with the child blocks being direct children of the wrapper. In the editor however this won't work because the `.block-editor-inner-blocks` and `.block-editor-block-list__layout` elements are inserted in between the wrapper and the children. So we need to get creating in our styles and override some of the frontend styles and add new ones to visually match the component in the editor.

> There currently is a new experimental API in core called `__experimentalUseInnerBlocksProps` that will allow us to remove these additional elements and get markup parity between the editor and the frontend. But that API is not fully production ready and may change in the future.

## Takeaways
The takeaways you should take from this lesson is that inner blocks are a very powerful concept in the editor that allow us to use different blocks to compose more complex content. They can also allow us to simplify the logic we have to code when it comes to managing repeating elements and have many options to control the user experience.

## Next steps
Now that you have build two blocks that use `InnerBlocks` take a look at the [Component Reference for the `InnerBlocks`](https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/inner-blocks#innerblocks) component and see wether there are any other things you can to to improve the editorial user experience.

## Further reading
- [Nested Blocks: Using InnerBlocks](https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/nested-blocks-inner-blocks/)
- [Inner Blocks Component Reference](https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/inner-blocks#innerblocks)
- [API Version 2 - useBlockProps & useInnerBlocksProps](https://internal.10up.com/blog/2021/06/23/a-quick-guide-for-gutenberg-api-version-2/)

## Next Lesson
[Lesson 6: Slot Fill](./06-slot-fill.md)
