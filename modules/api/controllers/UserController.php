<?php

namespace app\modules\api\controllers;


use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use app\modules\api\resources\UserResource;
use Yii;
use yii\helpers\ArrayHelper;

class UserController extends ApiController
{

    public $modelClass = UserResource::class;

    public function behaviors()
    {
        return parent::behaviors();
    }


    public function actions()
    {
        
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                    ],
                ],
            ],
        ]);
    }


    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionSignup()
    {

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->register()) {
            return $model->_user;
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }
}
