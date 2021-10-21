# 10up Gutenberg Training

## Overview
The purpose of this project is to help you build and customize (Gutenberg) blocks. This training applies to all engineering disciplines at 10up.


## Training Prerequisites
* Basic understanding of WordPress including how themes are structured.
* Understanding of JavaScript fundamentals and ES6+ concepts.
* Basic understanding of React components.

For resources on learning JavaScript and React.js, look through this [internal document](https://internal.10up.com/docs/javascript-tutorials/).


## Project Setup
1. Create a local WordPress installation with the domain `gutenberg-training.test`
```
10updocker create gutenberg-training
```
2. Clone this repository into the `wordpress` directory replacing the `wp-content` folder
```
cd gutenberg-training-test/wordpress && rm -rf wp-content && git clone git@gitlab.10up.com:exercises/gutenberg-lessons.git wp-content
```
3. Navigate to the theme directory and install dependencies
```
cd wp-content/themes/10up-theme && npm install && npm run start
```
4. Activate the 10up-theme in WordPress
```
10updocker wp theme activate 10up-theme
```
5. Start watching for file changes that you will make
```
npm run watch
```


## Lessons
* [Lesson 1: Anatomy of a block](./lessons/01-overview.md)
* [Lesson 2: A Simple CTA block](./lessons/02-cta-lesson.md)
* [Lesson 3: Block Styles](./lessons/03-styles.md)
* [Lesson 4: Block Variations](./lessons/04-variations.md)
* [Lesson 5: Inner Blocks / Block Nesting](./lessons/05-inner-blocks.md)
* [Lesson 6: Rich Text Formats](./lessons/06-rich-text-formats.md)
* [Lesson 7: Slot Fill](./lessons/07-slot-fill.md)

## Build Your Own

After going through the lessons, it's time to put all your newly learned skills together and build a block by yourself. Spend no more than ~4 hours on this block. Submit what you build to your Director of Engineering for review.

__What to Build__

Your task is to build a block called "Author Byline". The block should show the author of the current post next to their avatar image. There should be a block setting for hiding the avatar image.

To start you should make a clone of the [10up WP Scaffold](https://github.com/10up/wp-scaffold). The block should be created as a part of the theme.

__Technical Specifications__

* Built as a dynamic block
* Following 10up Best Practices
* Follows block building patterns shown in the [10up WP Scaffold example block](https://github.com/10up/wp-scaffold/tree/trunk/themes/10up-theme/includes/blocks/example-block).

If you get stuck or have questions, please post in the `#10up-gutenberg` Slack channel.


## Support
If you run into issues with this training project, feel free to reach out in Slack to `#10up-gutenberg`. We also welcome bug reports, suggestions and contributions via the [Issues tab in Gitlab](https://gitlab.10up.com/exercises/gutenberg-lessons/-/issues).
