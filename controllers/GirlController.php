<?php

namespace app\controllers;

use app\models\GirlGenerator;
use app\models\GirlSearch;
use yii\web\Controller;

class GirlController extends Controller
{
    public function actionIndex()
    {
        $girlSearch = new GirlSearch();
        $dataProvider = $girlSearch->search(\Yii::$app->request->queryParams, 6);

        /*if (\Yii::$app->request->isAjax) {
            return $this->renderPartial('_girls', ['dataProvider' => $dataProvider]);
        }*/

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }
}





/*public function actionCreate()
{
    $countGirls = 25;
    $girlGenerator = new GirlGenerator();
    $girlGenerator->create($countGirls);
    die('ok');
}*/