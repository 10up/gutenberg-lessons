## Lesson 5: Inner Blocks / Nested Blocks

In the editor you are able to nest blocks within other blocks. You may have come across this when using the Core Group or Columns Block.  This ability is super powerful because it allows you to compose different blocks together to create custom layouts. But this is not the only thing nested blocks are useful for. Nesting also allows you to reduce complexiy when you have to create repeatable items your markup.

There are two types of nesting blocks and we can identify them by looking at the two core blocks I already mentioned. The Group and the Columns block.

The Group block is meant to be a wrapper. It creates a container with some options like a background color for that section and then of course the ability to place different blocks within that group. Another great example for this is the Media & Text or the Cover Block. They all consist of one level of nesting and allow you to place anything within them.

On the other hand there are blocks like the Column block that may seem very similar in the beginning because they also allow you to place other blocks within them. But that actually is not the case for Colums. The column block itself only allows individual column blocks as it's direct decendents. The individusl column blocks then allow you to place items in them. But the column blocks cannot get used outside the Columns block. I'm going to reffer to this kind of nesting as controlled inner blocks or parent / child blocks.

### Tabs Block Example
![Tabs Block Wireframe](/lessons/images/inner-blocks-tabs-example.png)
1. `Tabs` Block
2. Controled `Tab` Block
3. Open / restricted `InnerBlocks`

### Slider Block Example
![Slider Block Wireframe](/lessons/images/inner-blocks-slider-example.png)
1. `Slider` Block
2. Controled `Slide` Block
3. Open / restricted `InnerBlocks`
