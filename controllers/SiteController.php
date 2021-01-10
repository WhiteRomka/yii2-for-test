<?php

namespace app\controllers;

use app\components\actions\RomAction;
use app\models\CommentForm;
use app\models\Film;
use app\models\Mindbox;
use app\models\Post;
use app\models\RegisterForm;
use app\models\User;
use app\models\UserEmail;
use Codeception\Module\MongoDb;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use function foo\func;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
  /*  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'about'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                        'actions' => ['contact'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

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
            'rom' => RomAction::class
        ];
    }

    public function actionFilms()
    {
       /* $cache = Yii::$app->cache;
        $films = $cache->getOrSet('films', function(){
            return $films = Film::find()->with('tags')->all();
        }, 10);*/
        $films = Film::find()->with('tags')->all();
        return $this->render('films', ['films'=>$films]);
    }

    public function actionAjaxTest()
    {
        return $this->render('AjaxTest');
    }

    public function actionAjaxTestReceiver($id, $obj, $arr)
    {
        $this->layout= false;
       // echo "dsfsf";
       // var_dump($id);
       // var_dump($obj);
       // var_dump($arr);

        $obj = json_decode($obj);
        //debug($obj);

        $arr = json_decode($arr);
        //debug($arr);

        return $this->render('_ajaxTestReceiver', compact('arr', 'obj'));
    }

    public function actionArrayWalk()
    {
        $a = [1,2,3,4,5];

        array_walk($a, function(&$v){
            //return $v *2;
            //echo $v . "<br>";

            $v = $v *2;

        });

        debug($a); die;
    }

    public function actionCheckbox()
    {
        //return $this->render('about');
        return $this->render('checkbox');
    }


    /**
     * Displays homepage.
     * @param string $aa
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionT()
    {

        $query = Post::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'text' => SORT_ASC,
                    //'title' => SORT_ASC,
                ]
            ],
        ]);
        $posts = $provider->getModels();
        $pages =  $provider->getPagination();
        return $this->render('t', [
            'posts'=>$posts,
            'pages' => $pages
        ]);
    }

    public function actionRitmonexx()
    {
        return $this->render('ritmonexx');
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

    public function actionTtt(){

        $res =  Mindbox::t();
        if ($res) {
            echo "ok";
        }else {
            echo "bad";
        }
        die();
    }

    public function actionAjax()
    {
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


    public function actionEmail()
    {
        $userEmail =new UserEmail();
        $userEmail->autoValidation();
    }

    public  function actionClassesJs() {
        return $this->render('classes-js');
    }
}
