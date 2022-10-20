<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use app\modules\api\components\AuthComponent;

class ApiController extends Controller
{
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => AuthComponent::class,
                'authMethods' => [
                    HttpBearerAuth::class
                ],
                'except' => ['hello']
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'index' => ['POST', 'PUT', 'DELETE'],
        ];
    }

    public function actionError()
    {
        return 'error';
    }
}
