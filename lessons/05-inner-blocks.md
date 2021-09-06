## Lesson 5: Inner Blocks / Nested Blocks

### Learning Outcomes:
1. Learn what inner blocks are and how to use them
2. Learn how to decide when to use inner blocks
3. Learn about controlled parent child relationships in inner blocks

### What are "inner blocks"?

Inner Blocks in WordPress refers to the concept of nesting blocks in other blocks. You may have come across this when using the Core Group or Columns Block. This ability is very powerful because it allows you to compose different blocks to build your content. But this is not the only thing nested blocks are useful for. Nesting also allows you to reduce complexity when you have to create repeatable items your blocks.

Looking at the two core blocks I already mentioned we can see this concept of nested blocks come to life.

The Group block is meant to be a wrapper. It creates a container with some options like a background color for that section and then of course the ability to place different blocks within that group. Another great example for this is the Media & Text or the Cover Block. They all allow you to place any other blocks inside of an inner blocks area.

![Editor List View showing a Core Group block with a Heading and Paragraph nested within.](/lessons/images/inner-blocks-core-group-screenshot.jpg)

But there is another great use-case for using inner blocks. We can see that when looking at the core columns block. It may seem very similar in the beginning because they also allow you to place other blocks within them. But that actually is not the case for columns. The columns block itself only allows individual column blocks as it's direct decedents. The individual column blocks then allow you to place other blocks in them. But the column blocks cannot get used outside the Columns block. Instead of storing a very complicated array of the columns with all their options and building custom logic to add, move or remove columns, all of that get's managed my using inner blocks with a wrapping `columns` block that only allows `column` blocks as it's direct children.

![Editor List View showing a Core Columns block with three nested Column Blocks that each have their own child blocks within.](/lessons/images/inner-blocks-core-columns-screenshot.jpg)

### Exercise Overview

### Takeaways

### Next steps

### Further reading
