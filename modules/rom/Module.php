<?php

namespace app\modules\rom;
use yii\base\BootstrapInterface;

/**
 * rom module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    private $slug = '#\w*#';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\rom\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $app->urlManager->addRules([]);
        $app->getUrlManager()->addRules([
            'rom/<action:\w+>' => 'rom/default/index',
        ], false);
    }
}
