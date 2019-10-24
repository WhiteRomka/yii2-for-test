<?php

namespace app\controllers;

use app\components\actions\RomAction;
use app\models\CommentForm;
use app\models\Mindbox;
use app\models\Post;
use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'/*, 'about'*/],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    /*[
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                        'actions' => ['contact'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],*/
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'rom'=>RomAction::class
        ];
    }

    /**
     * Displays homepage.
     * @param string $aa
     * @return string
     */
    public function actionIndex()
    {
        $pattern = '#(pa){2}#';
        $string = 'fgfdg papa fhgfdh';

        debug(preg_match($pattern, $string)); die;
        return $this->render('index');
    }

    /**
     * Login action.
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        $errors = [];
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->register()) {
                $session = Yii::$app->session;
                $session->setFlash('success','Пользователь зарегистрирован');
                return $this->refresh();
            }else {
               /* $errorsValidate = $model->errors ?? [];
                $errorsReg = is_array($model->register()) ? $model->register(): [];
                $errors = array_merge($errorsValidate,$errorsReg);*/
                $errors = $model->errors;
            }
        }
        return $this->render('register', ['model' => $model, 'errors' => $errors]);
    }

    /**
     * Logout action.
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

  /* public function actionAddUser()
    {
        $count = 0;
        for ($i = 1002; $i < 3000; $i++) {
            $val = 'aaa'.$i;
            $user = new User();
            $user->username = $val;
            $user->auth_key = $val;
            $user->password_hash = $val;
            $user->password_reset_token = $val;
            $user->email = $val.'@'.$val.'.'.$val;
            $user->created_at = time();
            $user->updated_at = time();
             if ($user->save() ){
                 $count++;
             }else {
                 debug($user->errors);die;
             }
        }
        echo $count; die;
    }*/
   //SELECT * FROM `user` WHERE auth_key = 'oXAZskjSAIzOqmwXNE-L-aA7wfMxJHyF' // 0.0023 s
   //SELECT auth_key FROM `user`  // 0.0003 s

    public function actionTtt(){

        $res =  Mindbox::t();
        if ($res) {
            echo "ok";
        }else {
            echo "bad";
        }
        die();
        //die('ttt');
    }

    public function actionAjax()
    {
        /*$request = Yii::$app->request;
        $p = $_POST;
        $a= 1;
        $c =1;

        if ($request->isPost && isset($request['CommentForm'])) {
            $comment = $request['CommentForm']['comment'] ?? null;
            $email = $request['CommentForm']['email'] ?? null;

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['comment' => $comment, 'email' => $email];
        }*/

        $model = new CommentForm();

        $request = Yii::$app->request;
        $p = $_POST;
        if ($request->isAjax) {

            $model->load(\Yii::$app->request->post());
            //или так если в JS - вариант 2 или вариант 3
            //$model->comment = $_POST['comment'];
            //$model->email = $_POST['email'];

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['model' => $model];
        }

        return $this->render('ajax', ['model' => $model]);
    }
}
