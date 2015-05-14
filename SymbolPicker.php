<?php
/**
 * MIT licence
 * Version 1.0
 * 1.0.1 updated for Font Awesome 4.3 (14-05-2015)
 * Sjaak Priester, Amsterdam 05-01-2015.
 *
 * Symbolpicker Widget for Yii 2.0
 *
 * Widget to select a symbol from the Font Awesome collection in Yii 2.0 PHP Framework.
 *
 * Requirement: Font Awesome must be loaded.
 * An easy way is to add the value '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' to the AppAsset->css array.
 * See: http://fontawesome.io/get-started/ .
 */

namespace sjaakp\symbolpicker;

use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\ButtonDropdown;

class SymbolPicker extends InputWidget {

    /**
     * @var array
     * Labels for the widget's elements.
     * A value of false means that the corresponding element is not displayed.
     */
    public $labels = [
        'icon' => 'Icon',
        'color' => 'Color',
        'effect' => 'Effect',
        'extra' => 'Extra classes',
    ];

    /**
     * @var array
     * List of selectable colors. Each item is a color name, which will generate a 'col-***' color class name.
     * For instance 'darkblue' refers to the class name 'col-darkblue'. Color classes are in assets\symbol-colors.css.
     * Default: a selection of CSS3 named colors.
     * See: http://dev.w3.org/csswg/css-color-3/#svg-color
     */
    public $colors = [
        'darkblue',
        'dodgerblue',
        'aquamarine',
        'chartreuse',
        'limegreen',
        'forestgreen',
        'olive',
        'gold',
        'yellow',
        'orange',
        'tomato',
        'crimson',
        'chocolate',
        'brown',
        'fuchsia',
        'purple',
        'black',
        'dimgray',
        'lightslategray',
        'silver',
        'white'
    ];

    /**
     * @var array
     * List of selectable Font Awesome effects. Each item is the class name of an effect, without the 'fa-' part.
     * So, for instance 'flip-horizontal' refers to the 'fa-flip-horizontal' effect.
     * Default: most of the Font Awesome effects. Version 4.2.
     * See: http://fontawesome.io/examples/#rotated-flipped
     */
    public $effects = [
        'rotate-90',
        'rotate-180',
        'rotate-270',
        'flip-horizontal',
        'flip-vertical',
        'spin',
    ];

    /**
     * @var array
     * List of selectable Font Awesome icons. Each item is the class name of an icon, without the 'fa-' part.
     * So, for instance 'calculator' refers to the 'fa-calculator' icon.
     * Default: all of the Font Awesome icons, excluding the aliases. Version 4.2.
     * See: http://fontawesome.io/icons/
     */
    public $icons = [
        'adjust',
        'adn',
        'align-center',
        'align-justify',
        'align-left',
        'align-right',
        'ambulance',
        'anchor',
        'android',
        'angellist',
        'angle-double-down',
        'angle-double-left',
        'angle-double-right',
        'angle-double-up',
        'angle-down',
        'angle-left',
        'angle-right',
        'angle-up',
        'apple',
        'archive',
        'area-chart',
        'arrow-circle-down',
        'arrow-circle-left',
        'arrow-circle-o-down',
        'arrow-circle-o-left',
        'arrow-circle-o-right',
        'arrow-circle-o-up',
        'arrow-circle-right',
        'arrow-circle-up',
        'arrow-down',
        'arrow-left',
        'arrow-right',
        'arrows',
        'arrows-alt',
        'arrows-h',
        'arrows-v',
        'arrow-up',
        'asterisk',
        'at',
        'backward',
        'ban',
        'bank',
        'bar-chart',
        'barcode',
        'bars',
        'bed',
        'beer',
        'behance',
        'behance-square',
        'bell',
        'bell-o',
        'bell-slash',
        'bell-slash-o',
        'bicycle',
        'binoculars',
        'birthday-cake',
        'bitbucket',
        'bitbucket-square',
        'bitcoin',
        'bold',
        'bomb',
        'book',
        'bookmark',
        'bookmark-o',
        'briefcase',
        'bug',
        'building',
        'building-o',
        'bullhorn',
        'bullseye',
        'bus',
        'buysellads',
        'calculator',
        'calendar',
        'calendar-o',
        'camera',
        'camera-retro',
        'car',
        'caret-down',
        'caret-left',
        'caret-right',
        'caret-up',
        'cart-arrow-down',
        'cart-plus',
        'cc',
        'cc-amex',
        'cc-discover',
        'cc-mastercard',
        'cc-paypal',
        'cc-stripe',
        'cc-visa',
        'certificate',
        'check',
        'check-circle',
        'check-circle-o',
        'check-square',
        'check-square-o',
        'chevron-circle-down',
        'chevron-circle-left',
        'chevron-circle-right',
        'chevron-circle-up',
        'chevron-down',
        'chevron-left',
        'chevron-right',
        'chevron-up',
        'child',
        'circle',
        'circle-o',
        'circle-o-notch',
        'circle-thin',
        'clock-o',
        'close',
        'cloud',
        'cloud-download',
        'cloud-upload',
        'code',
        'code-fork',
        'codepen',
        'coffee',
        'columns',
        'comment',
        'comment-o',
        'comments',
        'comments-o',
        'compass',
        'compress',
        'connectdevelop',
        'copy',
        'copyright',
        'credit-card',
        'crop',
        'crosshairs',
        'css3',
        'cube',
        'cubes',
        'cut',
        'cutlery',
        'dashcube',
        'database',
        'delicious',
        'desktop',
        'deviantart',
        'diamond',
        'digg',
        'dollar',
        'dot-circle-o',
        'download',
        'dribbble',
        'dropbox',
        'drupal',
        'edit',
        'eject',
        'ellipsis-h',
        'ellipsis-v',
        'empire',
        'envelope',
        'envelope-o',
        'envelope-square',
        'eraser',
        'euro',
        'exchange',
        'exclamation',
        'exclamation-circle',
        'expand',
        'external-link',
        'external-link-square',
        'eye',
        'eyedropper',
        'eye-slash',
        'facebook',
        'facebook-official',
        'facebook-square',
        'fast-backward',
        'fast-forward',
        'fax',
        'female',
        'fighter-jet',
        'file',
        'file-audio-o',
        'file-code-o',
        'file-excel-o',
        'file-image-o',
        'file-o',
        'file-pdf-o',
        'file-powerpoint-o',
        'file-text',
        'file-text-o',
        'file-video-o',
        'file-word-o',
        'file-zip-o',
        'film',
        'filter',
        'fire',
        'fire-extinguisher',
        'flag',
        'flag-checkered',
        'flag-o',
        'flash',
        'flask',
        'flickr',
        'folder',
        'folder-o',
        'folder-open',
        'folder-open-o',
        'font',
        'forward',
        'forumbee',
        'foursquare',
        'frown-o',
        'gamepad',
        'gbp',
        'gear',
        'gears',
        'gift',
        'git',
        'github',
        'github-alt',
        'github-square',
        'git-square',
        'gittip',
        'glass',
        'globe',
        'google',
        'google-plus',
        'google-plus-square',
        'google-wallet',
        'graduation-cap',
        'group',
        'hacker-news',
        'hand-o-down',
        'hand-o-left',
        'hand-o-right',
        'hand-o-up',
        'hdd-o',
        'header',
        'headphones',
        'heart',
        'heartbeat',
        'heart-o',
        'history',
        'home',
        'hospital-o',
        'h-square',
        'html5',
        'inbox',
        'indent',
        'info',
        'info-circle',
        'instagram',
        'ioxhost',
        'italic',
        'joomla',
        'jsfiddle',
        'key',
        'keyboard-o',
        'language',
        'laptop',
        'lastfm',
        'lastfm-square',
        'leaf',
        'leanpub',
        'legal',
        'lemon-o',
        'level-down',
        'level-up',
        'lightbulb-o',
        'line-chart',
        'link',
        'linkedin',
        'linkedin-square',
        'linux',
        'list',
        'list-alt',
        'list-ol',
        'list-ul',
        'location-arrow',
        'lock',
        'long-arrow-down',
        'long-arrow-left',
        'long-arrow-right',
        'long-arrow-up',
        'magic',
        'magnet',
        'male',
        'map-marker',
        'mars',
        'mars-double',
        'mars-stroke',
        'mars-stroke-h',
        'mars-stroke-v',
        'maxcdn',
        'meanpath',
        'medium',
        'medkit',
        'meh-o',
        'mercury',
        'microphone',
        'microphone-slash',
        'minus',
        'minus-circle',
        'minus-square',
        'minus-square-o',
        'mobile',
        'money',
        'moon-o',
        'motorcycle',
        'music',
        'newspaper-o',
        'neuter',
        'openid',
        'outdent',
        'pagelines',
        'paint-brush',
        'paperclip',
        'paragraph',
        'paste',
        'pause',
        'paw',
        'paypal',
        'pencil',
        'pencil-square',
        'pencil-square-o',
        'phone',
        'phone-square',
        'photo',
        'pie-chart',
        'pied-piper',
        'pied-piper-alt',
        'pinterest',
        'pinterest-p',
        'pinterest-square',
        'plane',
        'play',
        'play-circle',
        'play-circle-o',
        'plug',
        'plus',
        'plus-circle',
        'plus-square',
        'plus-square-o',
        'power-off',
        'print',
        'puzzle-piece',
        'qq',
        'qrcode',
        'question',
        'question-circle',
        'quote-left',
        'quote-right',
        'random',
        'rebel',
        'recycle',
        'reddit',
        'reddit-square',
        'refresh',
        'renren',
        'reply',
        'reply-all',
        'retweet',
        'road',
        'rocket',
        'rotate-right',
        'rss',
        'rss-square',
        'ruble',
        'rupee',
        'save',
        'search',
        'search-minus',
        'search-plus',
        'sellsy',
        'send',
        'send-o',
        'server',
        'share',
        'share-alt',
        'share-alt-square',
        'share-square',
        'share-square-o',
        'shekel',
        'shield',
        'ship',
        'shirtsinbulk',
        'shopping-cart',
        'signal',
        'sign-in',
        'sign-out',
        'simplybuilt',
        'sitemap',
        'skyatlas',
        'skype',
        'slack',
        'sliders',
        'slideshare',
        'smile-o',
        'soccer-ball-o',
        'sort',
        'sort-alpha-asc',
        'sort-alpha-desc',
        'sort-amount-asc',
        'sort-amount-desc',
        'sort-asc',
        'sort-desc',
        'sort-numeric-asc',
        'sort-numeric-desc',
        'soundcloud',
        'space-shuttle',
        'spinner',
        'spoon',
        'spotify',
        'square',
        'square-o',
        'stack-exchange',
        'stack-overflow',
        'star',
        'star-half',
        'star-half-o',
        'star-o',
        'steam',
        'steam-square',
        'step-backward',
        'step-forward',
        'stethoscope',
        'stop',
        'street-view',
        'strikethrough',
        'stumbleupon',
        'stumbleupon-circle',
        'subscript',
        'subway',
        'suitcase',
        'sun-o',
        'superscript',
        'support',
        'table',
        'tablet',
        'tachometer',
        'tag',
        'tags',
        'tasks',
        'taxi',
        'tencent-weibo',
        'terminal',
        'text-height',
        'text-width',
        'th',
        'th-large',
        'th-list',
        'thumbs-down',
        'thumbs-o-down',
        'thumbs-o-up',
        'thumbs-up',
        'thumb-tack',
        'ticket',
        'times-circle',
        'times-circle-o',
        'tint',
        'toggle-down',
        'toggle-left',
        'toggle-off',
        'toggle-on',
        'toggle-right',
        'toggle-up',
        'train',
        'transgender',
        'transgender-alt',
        'trash',
        'trash-o',
        'tree',
        'trello',
        'trophy',
        'truck',
        'try',
        'tty',
        'tumblr',
        'tumblr-square',
        'twitch',
        'twitter',
        'twitter-square',
        'umbrella',
        'underline',
        'undo',
        'unlink',
        'unlock',
        'unlock-alt',
        'upload',
        'user',
        'user-md',
        'user-plus',
        'user-secret',
        'user-times',
        'venus',
        'venus-double',
        'venus-mars',
        'viacoin',
        'video-camera',
        'vimeo-square',
        'vine',
        'vk',
        'volume-down',
        'volume-off',
        'volume-up',
        'warning',
        'wechat',
        'weibo',
        'whatsapp',
        'wheelchair',
        'wifi',
        'windows',
        'won',
        'wordpress',
        'wrench',
        'xing',
        'xing-square',
        'yahoo',
        'yelp',
        'yen',
        'youtube',
        'youtube-play',
        'youtube-square',
    ];

    /**
     * @var array
     * HTML options of the buttons
     */
    public $buttonOptions = [];

    protected $parts = [];

    public function init()  {
        $extra = [];

        $val = $this->value;
        if ($this->hasModel())  {
            $val = $this->model->{$this->attribute};
        }
        $classes = explode(' ', $val);
        foreach($classes as $class) {
            if (strncmp($class, 'fa-', 3) == 0) {
                $fa = substr($class, 3);
                if ($this->labels['icon'] && in_array($fa, $this->icons)) $this->parts['icon'] = $class;
                else if ($this->labels['effect'] && in_array($fa, $this->effects)) $this->parts['effect'] = $class;
                else $extra[] = $class;
            }
            else if (strncmp($class, 'col-', 4) == 0) {
                $col = substr($class, 4);
                if ($this->labels['color'] && in_array($col, $this->colors)) $this->parts['color'] = $class;
                else $extra[] = $class;
            }
            else $extra[] = $class;
        }
        if (count($extra)) $this->parts['extra'] = implode(' ', $extra);

        Html::addCssClass($this->options, 'well');
        $this->buttonOptions['type'] = 'button';    // see http://wtfhtmlcss.com/#buttons-type

        $this->register();
    }

    public function run()   {
        $inner = $this->renderDropdowns() . ' ' . $this->renderExtra();

        $formgroup = Html::tag('div', Html::tag('div', $inner, [ 'class' => 'form-inline' ]), [ 'class' => 'form-group' ]);

        $outer = Html::tag('p', null, [ 'id' => 'sp-report']) . $formgroup;

        echo Html::tag('div', $outer, $this->options);

        if ($this->hasModel())  {
            echo Html::activeHiddenInput($this->model, $this->attribute, [
                'id' => 'sp-ht'
            ]);
        }
        else {
            echo Html::HiddenInput($this->name, $this->value, [
                'id' => 'sp-ht'
            ]);
        }
    }

    protected function renderDropdowns()    {
        return ButtonGroup::widget([
            'buttons' => [
                $this->renderIcon(),
                $this->renderColor(),
                $this->renderEffect(),
            ]
        ]);
    }

    protected function renderExtra()    {
        return $this->labels['extra'] ? Html::textInput('tt', isset($parts['extra']) ? $parts['extra'] : null, [
            'id' => 'sp-tt',
            'class' => 'form-control',
            'placeholder' => $this->labels['extra']
        ]) : '';
    }

    protected function renderIcon()    {
        return $this->labels['icon'] ? ButtonDropdown::widget([
            'label' => $this->labels['icon'],
            'options' => $this->buttonOptions,
            'dropdown' => [
                'id' => 'sp-dd-icon',
                'encodeLabels' => false,
                'items' => array_merge(["<li>&nbsp;</li>"], array_map(function($v) {
                    return "<li><i class='fa fa-fw fa-{$v}'></i> fa-{$v}</li>";
                }, $this->icons))
            ]
        ]) : '';
    }

    protected function renderColor()    {
        return $this->labels['color'] ? ButtonDropdown::widget([
            'label' => $this->labels['color'],
            'options' => $this->buttonOptions,
            'dropdown' => [
                'id' => 'sp-dd-col',
                'encodeLabels' => false,
                'items' => array_merge(["<li>&nbsp;</li>"], array_map(function($v) {
                    return "<li class='sp-colc col-{$v}'>col-{$v}</li>";
                }, $this->colors))
            ]
        ]) : '';
    }

    protected function renderEffect()    {
        return $this->labels['effect'] ? ButtonDropdown::widget([
            'label' => $this->labels['effect'],
            'options' => $this->buttonOptions,
            'dropdown' => [
                'id' => 'sp-dd-eff',
                'encodeLabels' => false,
                'items' => array_merge(["<li>&nbsp;</li>"], array_map(function($v) {
                    return "<li><i class='fa fa-fw fa-shield fa-{$v}'></i> fa-{$v}</li>";
                }, $this->effects))
            ]
        ]) : '';
    }

    protected function register()   {
        $view = $this->getView();

        SymbolColorsAsset::register($view);

        $jParts = Json::encode($this->parts);

        $view->registerJs("
var parts = $jParts;
function report() {
    var c = Object.keys(parts).map(function(v, i, a) { return parts[v]; }).join(' '),
        c2 = 'fa ' + c;
    if (! parts.icon) c2 += ' fa-circle';
    $('#sp-report').html('<i class=\"' + c2 + '\"></i>' + c);
    $('#sp-ht').val(c);
}
$('#sp-dd-icon li').click(function(e) { parts.icon = $(this).text().trim(); report(); });
$('#sp-dd-col li').click(function(e) { parts.color = $(this).text().trim(); report(); });
$('#sp-dd-eff li').click(function(e) { parts.effect = $(this).text().trim(); report(); });
$('#sp-tt').on('input', function(e) { parts.extra = this.value.trim(); report(); });
report();");

        $view->registerCss('
.dropdown-menu {
    background-color: #e9e5de;
    height: auto;
    max-height: 600px;
    width: 240px;
    overflow-x: hidden;
    cursor: default;
}
.dropdown-menu li {
    margin-left: 1em;
}
.dropdown-menu li:hover {
    background-color: #fafad2;
}
.sp-colc:before {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    content: "";
    background-color: currentcolor;
    margin-right: 4px;
}
#sp-report i {
    color: #483d8b;
    margin-right: 1em;
}
');

    }
}