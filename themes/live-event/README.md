# Live Event Child Theme

The Live Event child theme is for our [Profitable WordPress Developer Bootcamp](https://profitabledeveloperbootcamp.knowthecode.io/) website.  It's powered by the [Genesis framework](http://www.studiopress.com/features/) child theme is for [Know the Code](https://KnowTheCode.io) and WordPress, of course.
  
It's Sassified, using the file's timestamp for version number, modular, and very specific to our needs.   

Feel free to use it.  But please change the styling to be unique.  And don't use our logos. Thank you.

## Dependencies

This child theme is dependent upon the following:

1. The [Genesis](http://www.studiopress.com/features/) theming framework from [StudioPress](http://www.studiopress.com).

## Instructions to install:

1. Open up terminal and navigate to the `themes` folder.
2. Then type: `git clone https://github.com/KnowTheCode/live-event`
3. Navigate into the new folder `cd live-event`
4. It will now run.

## Sass Files

To make styling changes, navigate to `assets/sass`.  There you will find each of the partial files which contain the CSS styling.

The variables are setup for our color scheme.  Therefore, you want to use the variables found in the `utilities/variables/_variables.scss` file.  For example, let's say that you want the background-color to be our branding green color.  You would use `$green` as the color.  This variable holds the hex color.

## Gulp and Sass

When you are actively making styling changes, you need to convert the Sass files into a compressed CSS file.  The first step is to make sure that you have all of the node modules installed, i.e. that are defined in the `package.json` file.  To install, you will need npm and node installed in your machine.  [Automating Tasks with Gulp](https://knowthecode.io/labs/part-3a-automating-tasks-gulp) walks you through the process.

Once everything is installed, then you type `gulp watch`.  You can now make changes to the Sass files and have them compiled into native CSS.  Two files will be stored in the theme's root directory: `style.css` and `style.min.css`.  The minified version is loaded within the theme as it's more optimized and will download faster to the viewing devices.

## Contributions

All feedback, bug reports, and pull requests are welcome.