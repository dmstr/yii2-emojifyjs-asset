<?php

namespace dmstr\web;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * This is just an example.
 */
class EmojifyJsAsset extends AssetBundle
{
    # TODO: using files from https://github.com/BoboTiG/emojify.js, due to https://github.com/Ranks/emojify.js/pull/165
    public $sourcePath = __DIR__.'/assets';

    public $css = [
        'css/basic/emojify.css'
    ];

    public $js = [
        'js/emojify.js'
    ];


    public function publish($am)
    {
        parent::publish($am);
        
        \Yii::$app->controller->view->registerJs('emojify.setConfig({
  img_dir: "'.$this->baseUrl.'/images/basic",
  emoji_image_extension: \'png\',
  emoticons_enabled: true,
  people_enabled: true,
  nature_enabled: true,
  objects_enabled: true,
  places_enabled: true,
  symbols_enabled: true
});emojify.run()');

        \Yii::$app->controller->view->registerCss('.emoji {
    width: 1.25em;
    height: 1.25em;
    display: inline-block;
    margin-bottom: 0.25em;
}');
    }

}
