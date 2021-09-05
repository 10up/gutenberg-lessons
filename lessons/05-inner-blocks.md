## Lesson 5: Inner Blocks / Nested Blocks

In the editor you are able to nest blocks within other blocks. You may have come across this when using the Core Group or Columns Block.  This ability is super powerful because it allows you to compose different blocks together to create custom layouts. But this is not the only thing nested blocks are useful for. Nesting also allows you to reduce complexity when you have to create repeatable items your markup.

There are two types of nesting blocks and we can identify them by looking at the two core blocks I already mentioned. The Group and the Columns block.

The Group block is meant to be a wrapper. It creates a container with some options like a background color for that section and then of course the ability to place different blocks within that group. Another great example for this is the Media & Text or the Cover Block. They all consist of one level of nesting and allow you to place anything within them.

![Editor List View showing a Core Group block with a Heading and Paragraph nested within.](/lessons/images/inner-blocks-core-group-screenshot.jpg)

On the other hand there are blocks like the Column block that may seem very similar in the beginning because they also allow you to place other blocks within them. But that actually is not the case for Columns. The column block itself only allows individual column blocks as it's direct decedents. The individual column blocks then allow you to place items in them. But the column blocks cannot get used outside the Columns block. I'm going to refer to this kind of nesting as controlled inner blocks or parent / child blocks.

![Editor List View showing a Core Columns block with three nested Column Blocks that each have their own child blocks within.](/lessons/images/inner-blocks-core-columns-screenshot.jpg)

### Allowing other Blocks to be inserted into your own custom blocks
When you have an area of your site where you want to give editors the flexibility to insert Blocks themselves you can define an `InnerBlocks` area for that purpose. A block can only contain one inner blocks area. Once the `<InnerBlocks />` Component is placed somewhere in your markup, the editor will show the standard Inserter in that place and allow Editors to place any other block inside of that area.

If you want to give the Editor a bit more guidance / an example of what content they should enter in an area you can improve the experience by adding a template for the inner blocks. This template gets applied when the block is first inserted and allows the end user to get up and running more quickly. Be aware though that the template should make sense for a given block. If editors need to remove it every time because it isn't what they need it is a bad template.

```js
const INNER_BLOCK_TEMPLATE = [
	[ 'core/heading', { level: 2, placeholder: 'Enter heading here...' } ],
	[ 'core/paragraphn', { placeholder: 'Enter the content here...' } ],
];

function BlockEdit() {
	return (
		<InnerBlocks
			template={ INNER_BLOCK_TEMPLATE }
		/>
	)
}
```

You can also control which blocks an editor can insert into your inner block area by defining `allowedBlocks` for that area.

```js
const ALLOWED_INNER_BLOCKS = [
	'core/heading',
	'core/paragraph',
	'core/image',
	'core/buttons'
];

function BlockEdit() {
	return (
		<InnerBlocks
			allowedBlocks={ ALLOWED_INNER_BLOCKS }
		/>
	)
}
```

### Building Controlled Inner Blocks (Parent / Child Blocks)

#### Tabs Block Example
![Tabs Block Wireframe](/lessons/images/inner-blocks-tabs-example.png)
1. `Tabs` Block
2. Controlled `Tab` Block
3. Open / restricted `InnerBlocks`

#### Slider Block Example
![Slider Block Wireframe](/lessons/images/inner-blocks-slider-example.png)
1. `Slider` Block
2. Controlled `Slide` Block
3. Open / restricted `InnerBlocks`

