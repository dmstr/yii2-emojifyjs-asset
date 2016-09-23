<?php

namespace dmstr\web;

use yii\web\View;

/**
 * This is just an example.
 */
class EmojifyJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/emojify.js/dist';

    public $css = [
        'css/basic/emojify.css'
    ];


    public function publish($am)
    {
        parent::publish($am);

        \Yii::$app->controller->view->registerJsFile('https://raw.githubusercontent.com/Ranks/emojify.js/master/dist/js/emojify.js',
            ['position' => View::POS_HEAD]);

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
