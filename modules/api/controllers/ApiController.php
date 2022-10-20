<?php

namespace app\modules\api\controllers;

use app\modules\api\components\AuthComponent;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class ApiController extends ActiveController
{

    public function behaviors()
    {


        //	$is_graph_ql = method_exists($this->action, "getGraphQLActions");

        // throw new NotFoundHttpException ("SITE DOWN FOR MAINTENANCE");

        // $excludedActions = [];

        // if (Yii::$app->request->isPut) {
        // 	$excludedActions[] = "user";
        // 	$excludedActions[] = "business";
        // }
      //  $excludedActions = [];
        $behaviors = [
            'authenticator' => [
                'class' => AuthComponent::class,
                'authMethods' =>  [
                    HttpBearerAuth::class
                ],
                 'except' => ['hello']

            ]
        ];

        return array_merge(
            parent::behaviors(),
            $behaviors
        );

        // $behaviors = parent::behaviors();
        // $behaviors['authenticator']['authMethods'] = [
        //     HttpBearerAuth::class,
        // ];

        // return $behaviors;
    }
}
