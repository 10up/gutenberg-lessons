# 10up Gutenberg Training Theme

## Overview

The purpose of this project is to help you build and customize (Gutenberg) blocks. This training applies to all engineering disciplines at 10up.

You can find the training itself at [gutenberg.10up.com/training](https://gutenberg.10up.com/training).

## Project Setup

1. Create a local WordPress installation with the domain `gutenberg-training.test`

```bash
10updocker create gutenberg-training
```

2. Clone this repository into the `wordpress` directory replacing the `wp-content` folder

```bash
cd gutenberg-training-test/wordpress && rm -rf wp-content && git clone git@gitlab.10up.com:exercises/gutenberg-lessons.git wp-content
```

3. Navigate to the wp-content directory and install dependencies

```bash
cd wp-content && npm install && npm run start
```

4. Activate the tenup-theme in WordPress

```bash
10updocker wp theme activate tenup-theme
```

5. Start watching for file changes that you will make

```bash
npm run watch
```
