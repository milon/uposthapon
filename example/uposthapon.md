# Uposthapon
## A Simple Markdown to HTML Presentation Converter

--

### Installation

Install via composer-

```
composer global require milon/uposthapon
```

For viewing all the options-

```
uposthapon --help
```

--

### Uses

For general purpose use with default stylesheet-

```
uposthapon convert 'filename.md'
```

You could also pass a stylesheet to override default style-

```
uposthapon convert 'filename.md' --style='style.css'
```

--

### Slide Types

Slides are written in Markdown, and are separated by two dashes (--) surrounded by line break.

#### Title slide

```
# Uposthapon
## A Simple Markdown to HTML Presentation Converter
```

--

### Other Slides

```
### A list of things

* Item 1
* Item B
* Item gamma

No need for multiple templates!
```

Since slides are written in Markdown, you can include things like lists, images, and arbitrary HTML.

h3 tags (prefaced ###) are automatically given a bottom border to represent a slide title.

--

### Navigation

Cleaver supports keyboard navigation for switching between slides. Alternatively, click the control buttons located below the presentation.

To navigate the slideshow:

- forward: K, L, UP, RIGHT, PgDn, and Space
- reverse: H, J, LEFT, DOWN, PgUp, and Backspace
- The toggle fullscreen mode, press the ENTER key.

--

Brought to you by-

**Nuruzzaman Milon**  
[@milon521](https://twitter.com/milon521)  
[https://milon.im](https://milon.im)

```
Published Under- GNU LGPLv3
```
