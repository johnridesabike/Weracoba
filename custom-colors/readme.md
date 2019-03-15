This code is based on Twenty Nineteen's custom color feature. Most of the code has been extracted from its original files and consolidated into this directory for easier hacking. 

The files `style-editor-customizer.css`, `/js/color-customize-controls.js`, and `/js/color-customize-preview.js` are also necessary to complete this feature.

To add this to your own theme, add this line to your `functions.php`:

```php
require get_template_directory() . '/custom-colors/custom-colors.php';
```

Then you will have to hack the custom colors files to fit your theme's CSS.

If you're building a child theme, there are also several filters built in to modify a lot of the default behavior.