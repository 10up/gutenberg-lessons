# Lesson 5: Inner Blocks / Nested Blocks

## Learning Outcomes:
1. Learn what inner blocks are and how to use them
2. Learn how to decide when to use inner blocks
3. Learn about controlled parent child relationships in inner blocks

## What are "inner blocks"?

Inner Blocks in WordPress means being able to nest blocks in other blocks. You may have come across this when using the Core Group or Columns Block. This ability is very powerful because it allows you to compose different blocks to build your content. But this is not the only thing nested blocks are useful for. Nesting also allows you to reduce complexity when you have to create repeatable items your blocks.

Looking at the two core blocks I already mentioned we can see this concept of nested blocks come to life.

The Group block is meant to be a wrapper. It creates a container with some options like a background color for that section and then of course the ability to place different blocks within that group. Another great example for this is the Media & Text or the Cover Block. They all allow you to place any other blocks inside of an inner blocks area.

![Editor List View showing a Core Group block with a Heading and Paragraph nested within.](/lessons/images/inner-blocks-core-group-screenshot.jpg)

But there is another great use-case for using inner blocks. We can see that when looking at the core columns block. It may seem very similar in the beginning because they also allow you to place other blocks within them. But that actually is not the case for columns. The columns block itself only allows individual column blocks as it's direct decedents. The individual column blocks then allow you to place other blocks in them. But the column blocks cannot get used outside the Columns block. Instead of storing a very complicated array of the columns with all their options and building custom logic to add, move or remove columns, all of that get's managed my using inner blocks with a wrapping `columns` block that only allows `column` blocks as it's direct children.

Another good example of this is the core buttons block. It only allows button blocks as it's children.

![Editor List View showing a Core Columns block with three nested Column Blocks that each have their own child blocks within.](/lessons/images/inner-blocks-core-columns-screenshot.jpg)

## Exercise Overview
In this lesson we will be building two different blocks to take a look at different use-cases inner blocks can solve.

### 1. "Hero" Block
In the first one we will take a look at how we can use inner blocks to allow an editor to place anything they want into a predefined area of your component. In this example we have a "simple" design of a "Hero" component that has an image at the top with a content area that overlaps the image.

![Hero Block Mockup](/lessons/images/inner-blocks-one-mockup.png)

The client wants to be able to place any other blocks into the content area of the "Hero" component to make it as flexible as possible for them.

### 2. "Card Grid" Block
And for the second block we will be building a "Card Grid" component. This Card grid should allow editors to place as many card components into a grid that automatically reflows based on the screen size of the device they are using.

![Card Grid Block Mockup](/lessons/images/inner-blocks-two-mockup.png)

## Breaking it down

### 1. "Hero" Block
![Hero Block Scribble](/lessons/images/inner-blocks-one-scribble.png)

### 2. "Card Grid" Block
![Card Grid Block Scribble](/lessons/images/inner-blocks-two-scribble.png)

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

From here we are most of the way there. You are not able to insert any blocks you want and the content actually gets saved into the database and shows on the frontend.

There are a few things to keep in mind though to improve the User Experience of our block.

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

## Takeaways

## Next steps

## Further reading
- [Nested Blocks: Using InnerBlocks](https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/nested-blocks-inner-blocks/)
- [Inner Blocks Component Reference](https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/inner-blocks#innerblocks)
- [API Version 2 - useBlockProps & useInnerBlocksProps](https://internal.10up.com/blog/2021/06/23/a-quick-guide-for-gutenberg-api-version-2/)
