<?php
/**
 * Created by PhpStorm.
 * User: Sjaak
 * Date: 3-1-2015
 * Time: 21:17
 */

namespace sjaakp\symbolpicker;

use yii\web\AssetBundle;

class SymbolColorsAsset extends AssetBundle {
    public $css = [
        'symbol-colors.css'
    ];

    public $publishOptions = [
        'only' => [ '*.css' ]
    ];

    public function init()    {
        parent::init();

        $this->sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
    }
}