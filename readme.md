# Uposthapon (উপস্থাপন)

Uposthapon is a simple markdown to html presentation converter hugely influenced by [Cleaver](https://github.com/jdan/cleaver). The syntax is almost same, even some resources also used from that package specially stylesheets and javascript.

## Online Example

An online example of a presentation slide created with Uposthapon can be found [here](https://milon.github.io/uposthapon).

## Requirement

PHP and composer is needed to run Uposthapon.

## Installation

Install via composer

```
composer global require 'milon/uposthapon'
```

## Uses

For general purpose use with default stylesheet-

```
uposthapon convert 'filename.md'
```

You could also pass a stylesheet to override default style-

```
uposthapon convert 'filename.md' --style='style.css'
```

## Slide Types

Slides are written in Markdown, and are separated by two dashes (--) surrounded by line breaks.

### Title slide

```
# Uposthapon
## A Simple Markdown to HTML Presentation Converter
```
**h1** and **h2** elements (prefaced with *#* and *##* respectively), will
automatically include padding to render a title slide.

### Other slides

```
### A list of things

* Item 1
* Item B
* Item gamma

No need for multiple templates!
```

Since slides are written in [Markdown](http://daringfireball.net/projects/markdown/),
you can include things like lists, images, and arbitrary HTML.

**h3** tags (prefaced `###`) are automatically given a bottom border to
represent a slide title.

## Navigation

Cleaver supports keyboard navigation for switching between slides.
Alternatively, click the control buttons located below the presentation.

To navigate the slideshow:

* **forward**: K, L, UP, RIGHT, PgDn, and Space
* **reverse**: H, J, LEFT, DOWN, PgUp, and Backspace

The toggle fullscreen mode, press the **ENTER** key.

---
License: GNU LGPLv3

Any suggestion or pull request is highly welcomed.

[Nuruzzaman Milon](https://milon.im)
