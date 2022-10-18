<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\BlogResource;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class BlogController extends ActiveController
{

    public $modelClass = BlogResource::class;
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'blogs',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class,
        ];
        return $behaviors;
    }
}
