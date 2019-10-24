<?php

namespace app\controllers;

use app\components\actions\RomAction;
use app\components\actions\TestAction;
use app\components\filters\ActionTimeFilter;
use app\components\MyLog;
use Yii;
use app\components\MyC;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => ActionTimeFilter::class,
            ],
        ];
    }

    public function actions()
    {
        return [
            'rom2'=>RomAction::class,
            'test' => TestAction::class
        ];
    }

    public function actionIndex()
    {
        //$q = Country::find()->andWhere(['id'=>1])->a
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

    public function actionTest()
    {
        /** @var MyLog $mc */
       /*$mc = Yii::$app->mylog;
       $mc->write();*/


        $q = Country::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $q
        ]);

        $res = [];
        foreach ($dataProvider->models as $model) {
            /** @var Country $model */
            $res[] =  $model->toArray();
        }

        debug($res);
        die('!!!');
        $dataProvider;




        return $this->render('test',[
            'dataProvider' => $dataProvider
        ]);
    }
}