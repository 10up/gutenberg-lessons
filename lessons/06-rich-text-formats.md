# Lesson 6: Rich Text Formats

## Learning Outcomes:
1. Learn what RichText Formats are
2. Understand how you can control them in RichText components
3. Build your own custom Rich Text Format

## What are "Rich Text Formats"?
Rich Text within WordPress is the underlying engine that powers the text editing capabilities in the new Editor. The way rich text works is by representing the text, wether it is an Element Tree (DOM), a HTML String or a Plain Text string, as a Rich Text Object. Under the hood that representation looks something like this:

```js
{
  text: string,
  formats: Array,
  replacements: Array,
  ?start: number,
  ?end: number,
}
```

As you can see in this, the actual text is stored separately from the formatting. The formats are ranges within that text, which will get output with custom formatting. So this means that whenever you use a `RichText` component in the editor and select a piece of text to make it Bold or Italic for example you apply a Rich Text Format on that text selection. And the format determines what should happen with that rage of text.

Any format can either have a [HTML tag with text-level semantics](https://www.w3.org/TR/html5/textlevel-semantics.html#text-level-semantics-usage-summary) or a tag and class name to identify the format.

Core comes with a whole bunch of core Rich Text Formats. They are all created within their own package called [`format-library`](https://github.com/WordPress/gutenberg/tree/trunk/packages/format-library/src).

![Core Rich Text Formats Dropdown showing "Inline Code" as selected](/lessons/images/core-rich-text-formats-screenshot.jpg)

The same way core adds all these core formats you are able to add your own custom formats and also remove the formats that core or another plugin created.

## When should you use "Rich Text Formats"
Rich Text Formats make sense to use whenever you want editors to be able to manipulate something inline. Not on a block level. So the same way you can use the Core "Inline Image" to place a special inline element into your text, you can create your own format that adds a special inline element at the current cursor position. Or more commonly you can add a custom format to apply to a range of text to wrap it in a special class name or inline html tag.

## Exercise Overview


## Takeaways

## Next steps
1. ...
2. ...
3. ...

## Further reading
- [Block Editor Handbook: Introduction to the Format API](https://developer.wordpress.org/block-editor/how-to-guides/format-api/)
- [How to Create Custom Text Formats for Gutenberg Block Editor - by Jeffrey Carandang](https://jeffreycarandang.com/how-to-create-custom-text-formats-for-gutenberg-block-editor/)

## Next Lesson
[Lesson 7: Slot Fill](./07-slot-fill.md)
