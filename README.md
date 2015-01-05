YII2 Symbol Picker
==================

#### Widget to select a symbol from the Font Awesome collection for Yii 2.0 PHP Framework. ####

**SymbolPicker** lets you select the class name for a symbol in [Font Awesome](http://fontawesome.io/). It also lets you select class names for a color and for an additional effect.

A demonstration of SymbolPicker widget is [here](http://www.sjaakpriester.nl/software/symbolpicker).

## Prerequisite ##

**SymbolPicker** only makes sense if Font Awesome is loaded in your site. The easiest way to achieve this, is to add a line to the `css` property of the site's `AppAsset.php` file (look into the `assets` directory), like so:

    <?php
	class AppAsset extends AssetBundle
	{
	    public $css = [
        	'//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',
        	'css/site.css'
			...	// other css files
    	];
		...	
	}
	?>

There are [other methods](http://fontawesome.io/get-started/) to make Font Awesome available to your site. 

## Installation ##

The preferred way to install **SymbolPicker** is through [Composer](https://getcomposer.org/). Either add the following to the require section of your `composer.json` file:

`"sjaakp/yii2-symbol-picker": "*"` 

Or run:

`$ php composer.phar require sjaakp/yii2-symbol-picker "*"` 

You can manually install **SymbolPicker** by [downloading the source in ZIP-format](https://github.com/sjaakp/yii2-symbol-picker/archive/master.zip).

## Using SymbolPicker ##

**SymbolPicker** is a Yii 2.0 [InputWidget](http://www.yiiframework.com/doc-2.0/yii-widgets-inputwidget.html). Like any other InputWidget it can be associated with a `model` and an `attribute` (or with a `name` and a `value`).

**Symbolpicker** is in namespace `sjaakp\symbolpicker`.

For instance, to associate **SymbolPicker** with the attribute `'icon'` in a form view, use code like this:

    use sjaakp\symbolpicker\SymbolPicker;
        
	...
	<?= $form->field($model, 'icon')->widget(SymbolPicker::className()) ?>
	...

#### options ####

**SymbolPicker** runs 'out of the box'. It has the following options to modify it's behaviour:

- **labels**: list of labels used by the widget. If a label is set to `false`, the corresponding element is not rendered.
- **icons**: list of selectable Font Awesome icons. Each item is the class name of an icon, without the `'fa-'` part. So, for instance `'calculator'` refers to the `'fa-calculator'` icon. Default: all of the Font Awesome icons, excluding the aliases. Version 4.2. See: [http://fontawesome.io/icons/](http://fontawesome.io/icons/).
- **colors**: list of selectable colors. Each item is a color name, which will generate a `'col-***'` color class name. For instance `'darkblue'` refers to the class name `'col-darkblue'`. Default: a selection of CSS3 named colors.
- **effects**: list of selectable Font Awesome effects. Each item is the class name of an effect, without the `'fa-'` part. So, for instance `'flip-horizontal'` refers to the `'fa-flip-horizontal'` effect. Default: most of the Font Awesome effects. Version 4.2.See: [http://fontawesome.io/examples/#rotated-flipped](http://fontawesome.io/examples/#rotated-flipped).

Of coarse, **SymbolPicker** also has the normal [InputWidget properties](http://www.yiiframework.com/doc-2.0/yii-widgets-inputwidget.html).

## Color classes ##

CSS color classes for all the CSS3 named colors are in the file `assets\symbol-colors.css`. You may use this in other parts of your project.
