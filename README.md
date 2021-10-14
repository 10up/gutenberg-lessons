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
* [Lesson 6: Slot Fill](./lessons/06-slot-fill.md)

## Support
If you run into issues with this training project, feel free to reach out in Slack to `#10up-gutenberg`. We also welcome bug reports, suggestions and contributions via the [Issues tab in Gitlab](https://gitlab.10up.com/exercises/gutenberg-lessons/-/issues).
