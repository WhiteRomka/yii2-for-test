<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 18:49
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionRole()
    {
        /*
        $authManager = Yii::$app->authManager;
        $roleAdmin = $authManager->createRole('admin');
        $roleAdmin->description = 'Администратор';
        $authManager->add($roleAdmin);

        $roleAuthor = $authManager->createRole('author');
        $roleAuthor->description = 'Автор';
        $authManager->add($roleAuthor);
        */
        return "ok";
    }

    public function actionPermission()
    {
        /*
        $authManager = Yii::$app->authManager;
        $permission = $authManager->createPermission('createPost');
        $permission->description = 'Право создание поста';
        $authManager->add($permission);
        */

        /*
        $authManager = Yii::$app->authManager;
        $permission = $authManager->createPermission('canAdmin');
        $permission->description = 'Право входа в админку';
        $authManager->add($permission);
        */
        return "ok";
    }


    public function actionInherit()
    {
        /*
        $roleAdmin = Yii::$app->authManager->getRole('admin');
        $permitCanAdmin = Yii::$app->authManager->getPermission('canAdmin');
        Yii::$app->authManager->addChild($roleAdmin, $permitCanAdmin);
        */
        return "ok";
    }

    public function actionAssign()
    {
        /*
        $roleAdmin = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($roleAdmin, 15); //15 - id  пользака
        */
        return "ok";
    }

}